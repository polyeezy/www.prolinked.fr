<?php

session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

$id = $_POST['id'];
$code = $_POST['code'];

echo compareCode($id, $code);

 ?>
