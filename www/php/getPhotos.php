<?php

session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

$photos = getPhotosClient($_SESSION['id']);
echo json_encode($photos[0]);


 ?>
