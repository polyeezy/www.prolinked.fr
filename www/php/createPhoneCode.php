<?php

session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

$phone = $_POST['phone'];
$code = $_POST['code'];
$id = $_POST['id'];

createPhoneCode($id, $phone, $code);
Update("user_phone", $phone, $id);
echo $code;

 ?>
