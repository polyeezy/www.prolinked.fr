<?php

session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

updatePhoneState($_POST['id']);

 ?>
