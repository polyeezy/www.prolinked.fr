<?php

session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

echo getIdFromFb($_GET['id']);



 ?>
