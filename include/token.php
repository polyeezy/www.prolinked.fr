<?php

session_start();

include(dirname(__DIR__) . "/include/Membership.php");

if (isset($_GET['id']))
  $token = getTokenInfos($_GET['id']);
else {
  header('location: index.php');
}

if ($token[0]['valid'] == false)
{
  validToken($token[0]['id']);
  create_recommandation($token[0]['id_user'], get_id_from_email($token[0]['mail']));
  check_pro($token[0]['id_user']);
  header('location: recommandation.php?rec=ok');
}
else {
  header('location: recommandation.php?rec=alreadyValid');
}





 ?>
