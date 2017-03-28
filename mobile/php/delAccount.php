<?php

session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

$photos = deleteAccount($_GET['id']);
echo "ok";


 ?>
