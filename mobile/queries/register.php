<?php
session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

if (empty($_POST['user_firstname']) || empty($_POST['user_lastname']) || empty($_POST['user_mail']) || empty($_POST['user_password']) || empty($_POST['user_password2']))
    {
      echo "Tous les champs sont obligatoires.";
      return;
    }

  if ($_POST['user_password'] !== $_POST['user_password2'])
    {
      echo "Les mots de passes sont differents.";
      return;
    }

  if (user_adress_exists($_POST['user_mail']))
  {
      echo "L'adresse mail est deja utilisée.";
      return;
    }

    $_SESSION['id'] = Register($_POST['user_mail'], $_POST['user_password'], $_POST['user_firstname'], $_POST['user_lastname']);
  //  send_mail_confirmation($_POST['user_mail']);
    echo "ok";
//    header('location: ../accueil.php?page=modifier-profil');


 ?>
