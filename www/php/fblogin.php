<?php
session_start();
require_once( 'src/Facebook/autoload.php' );

$fb = new Facebook\Facebook([
  'app_id' => '120539481683874',
  'app_secret' => '4435a689cf6b52bfaf2f447f7cc61aba',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','user_friends','user_photos']; // Optional permissions for more permission you need to send your application for review
$loginUrl = $helper->getLoginUrl('http://www.prolinked.fr/php/callback.php', $permissions);
header("location: ".$loginUrl);

?>
