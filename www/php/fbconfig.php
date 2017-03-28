<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

FacebookSession::setDefaultApplication( '1585803111737465','da196e7dab9a93090768534ef0d69e64' );

    $helper = new FacebookRedirectLoginHelper('http://prolinked.fr/php/fbconfig.php');
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
} catch( Exception $ex ) {
}
// session
if ( isset( $session ) ) {
  // graph
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // le get
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // facebook ID
      $first_name = $graphObject->getProperty('first_name');
      $last_name = $graphObject->getProperty('last_name');
      $cover = $graphObject->getProperty('cover');
      $fbfullname = $graphObject->getProperty('name'); // nom
	    $femail = $graphObject->getProperty('email');    //  mail
      $pic = $graphObject->getProperty('picture.data.url'); // photo
      $gender =$graphObject->getProperty('gender');// sexe
      //$bday = $
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;
      $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
      $_SESSION['PROFIL'] = $pic;

      include(dirname(dirname(__DIR__)) . "/include/Membership.php");


      if (!getUserById($fbid))
      {
        $_SESSION['id'] = RegisterViaFB($fbid, $femail, $first_name, $last_name, $pic, $cover);
        header("location: http://prolinked.fr/accueil.php?page=profil");
        return;
      }
      else
      {
        $_SESSION['id'] = $fbid;
        header("location: http://prolinked.fr/accueil.php");

      }

    //  {
      //  RegisterViaFB($fbid, $femail, $first_name, $last_name, $pic, $cover);
    //  }

    /* ---- header location after session ----*/
}
else {
  $loginUrl = $helper->getLoginUrl();
 header("location: " . $loginUrl);
}
?>
