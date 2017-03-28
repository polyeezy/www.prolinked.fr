<?php

session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

if (is_numeric($login = Login($_POST['user'], $_POST['pass'])))
{
  $_SESSION['id'] = $login;
  $_SESSION['type'] = "CLIENT";
  echo "ok";
}
else {
  echo $login;
}

 ?>
