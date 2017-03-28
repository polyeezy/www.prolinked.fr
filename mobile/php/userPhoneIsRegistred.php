<?php

session_start();

$phone = getUserPhone($_SESSION['id']);
if (empty($phone))
{
  echo "FALSE";
}
echo "TRUE";

 ?>
