<?php

require_once('lconfig.php');
//require_once('db.php');

if(isset($_GET['code'])) // get code after authorization
{
    $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
    $param = 'grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.$config['callback_url'].'&client_id='.$config['Client_ID'].'&client_secret='.$config['Client_Secret'];
    $return = (json_decode(post_curl($url,$param),true)); // Request for access token
    if($return['error']) // if invalid output error
    {
       $content = 'Some error occured<br><br>'.$return['error_description'].'<br><br>Please Try again.';
    }
    else // token received successfully
    {
       $url = 'https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrls::(original),headline,publicProfileUrl,location,industry,positions,email-address)?format=json&oauth2_access_token='.$return['access_token'];
       $User = json_decode(post_curl($url)); // Request user information on received token

      // Insert Data in Database
      //  $query = "INSERT INTO `test`.`users`
      //  (`userid`,
      //  `firstName`,
      //  `lastName`,
      //  `emailAddress`,
      //  `position`,
      //  `location`,
      //  `profileURL`,
      //  `pictureUrls`,
      //  `headline`)
       //
      //  VALUES
       //
      //  ('$id',
      //  '$firstName',
      //  '$lastName',
      //  '$emailAddress',
      //  '$position',
      //  '$location',
      //  '$profileURL',
      //  '$pictureUrls',
      //  '$headline')";
      //  mysqli_query($connection,$query);
    }
}

?>
