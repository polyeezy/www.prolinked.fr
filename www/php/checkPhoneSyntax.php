<?php

session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

$phone = $_POST['phone'];

if (!is_numeric($phone))
{
  echo "IS_NOT_NUM";
  return;
}

if (strlen($phone) !== 10)
{
  echo "WRONG_LEN";
  return;
}

echo "OK";
return;


 ?>
