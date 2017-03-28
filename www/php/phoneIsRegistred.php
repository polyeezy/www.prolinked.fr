<?php

session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

$phone = getUserPhone($_SESSION['id']);
if (empty($phone))
{
  echo "0";
  return;
}
echo "1";

 ?>
