<?php
session_start();
//include(dirname(dirname(__DIR__)) . "/include/Membership.php");
require_once( 'src/Facebook/autoload.php' );


$fb = new Facebook\Facebook([
  'app_id' => '120539481683874',
  'app_secret' => '4435a689cf6b52bfaf2f447f7cc61aba',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
  $_SESSION['facebook_access_token'] = (string) $accessToken;
  $oAuth2Client = $fb->getOAuth2Client();
  $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error

  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues

  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}


try {

  $response = $fb->get('/me?fields=id,name,email,first_name,last_name, birthday,cover,gender',$accessToken->getValue());
  $requestpicture = $fb->get('/me/picture?redirect=false&height=200', $accessToken->getValue());
  $requestfriend = $fb->get('me/friends?fields=email,id,picture{url},first_name,last_name', $accessToken->getValue());
//  print_r($response);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
//graph bug
  echo 'ERROR: Graph ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // fail valid
  echo 'ERROR: validation fails ' . $e->getMessage();
  exit;
}
$me = $response->getGraphUser();
$picture = $requestpicture->getGraphUser();
$friend = $requestfriend->getGraphEdge()->asArray();
//print_r($me);
//print_r($friend);
//foreach ($friend as $key => $value) {
  //echo =
//}
$profil_pic = $picture['url'];
//echo $friend;
//echo "Full Name: ".$me->getProperty('name')."<br>";
$id = $me->getProperty('id');
$firstname = $me->getProperty('first_name');
$lastname = $me->getProperty('last_name');
$email  = $me->getProperty('email');
$birthday= $me->getProperty('birthday');
$cover = $me->getProperty('cover');
$user_cover = $cover['source'];
$gender = $me->getProperty('gender');
//print_r($me->getProperty('friendlists'));
//echo "Facebook ID: <a href='https://www.facebook.com/".$me->getProperty('id')."' target='_blank'>".$me->getProperty('id')."</a>";*/
//$count_id = RegisterViaFB($id, $mail, $firstname, $lastname, $profil_pic, $user_cover);
$page = "profil_fb.php";
$_SESSION['fb_id'] = $id;
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;
$_SESSION['birthday'] = $birthday;
$_SESSION['cover'] = $user_cover;
$_SESSION['gender'] = $gender;
$_SESSION['profil_pic'] = $profil_pic;
$_SESSION['friend'] = $friend;

header("location: ".$page);

?>
