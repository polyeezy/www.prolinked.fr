<?php
session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");



if (isset($_POST['update']))
{

  $bio =  preg_replace("/\r\n|\r|\n/",'<br/>', $_POST['user_bio']);

  Update("user_bio", $bio, $_SESSION['id']);
  Update("user_phone", $_POST["user_phone"], $_SESSION['id']);
  Update("user_adress", $_POST["user_adress"], $_SESSION['id']);
//  Update("user_profession", $_POST["user_profession"], $_SESSION['id']);
  Update("user_birthday", $_POST["birthday"], $_SESSION['id']);
  Update("user_birthmonth", $_POST["birthmonth"], $_SESSION['id']);
  Update("user_birthyear", $_POST["birthyear"], $_SESSION['id']);



}
 header('location: ../accueil.php?page=profil');



 ?>
