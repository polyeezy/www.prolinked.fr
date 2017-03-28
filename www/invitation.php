<?php

session_start();
include(dirname(__DIR__) . "/include/Membership.php");

if (isset($_SESSION['id']) && $_SESSION['id'] !== $_GET['from'])
{
  if (!check_recommandation($_GET['from'], $_SESSION['id']))
  {
    $user = getUserById($_SESSION['id']);

    createInvitation($user['user_email'], $_GET['from']);
  }
  header('location: accueil.php?page=profil');
}
else
{
  $_SESSION['invit'] = $_GET['from'];
  header('location: index.php?page=inscription');
 }

 ?>
