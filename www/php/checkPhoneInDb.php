<?php

session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

echo checkPhoneInDb($_POST['phone']);

 ?>
