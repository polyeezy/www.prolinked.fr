<?php

session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");


if (!check_recommandation($_POST['sender'], $_POST['receiver']))
{
  create_recommandation($_POST['sender'],$_POST['receiver']);
}



 ?>
