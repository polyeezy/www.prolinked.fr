<?php

session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

if (!getPhoneState($_POST['id']))
{
  echo "-2";
}


 ?>
