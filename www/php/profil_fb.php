<?php
session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

if ($fid = getUserByFID($_SESSION['fb_id']))
{
  $_SESSION['id'] = $fid;
  if (isset($_SESSION['invit']) && $_SESSION['invit'] !== 0)
  {
    $user = getUserById($fid);
    $mail = $user['user_email'];

    createInvitation($mail, $_SESSION['invit'], 0);
    unset($_SESSION['invit']);
  }
  header('location: ../accueil.php');
  return;
}
else
{
  $_SESSION['id'] = Fb_Register($_SESSION['fb_id'], $_SESSION['email'], $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['profil_pic'], $_SESSION['cover']);
  if (isset($_SESSION['invit']) && $_SESSION['invit'] !== 0)
  {
    createInvitation($_SESSION['email'], $_SESSION['invit'], 0);
    unset($_SESSION['invit']);
  }
  header('location: ../accueil.php?page=modifier-profil');
}

header('location: ../accueil.php');


 ?>
