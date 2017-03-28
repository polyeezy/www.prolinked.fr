<?php

session_start();
include(dirname(__DIR__) . "/include/Membership.php");

if (isset($_SESSION['id']) && $_SESSION['id'] !== $_GET['id'])
{
  if (!check_recommandation($_GET['id'], $_SESSION['id']))
  {

    $user = getUserById($_SESSION['id']);
    createInvitation($mail, $_GET['id'])
  }
  header('location: accueil.php?page=profil');
}
else
{
  $_SESSION['invit'] = $_GET['id'];
  header('location: index.php');
 }

 ?>
