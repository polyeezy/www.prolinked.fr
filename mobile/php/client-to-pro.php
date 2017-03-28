<?php
session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");


  if (isset($_SESSION['type']))
    {
      switch ($_SESSION['type']) {
        case 'PRO':
          $_SESSION['type'] = 'CLIENT';
          break;
          case 'CLIENT':
            $_SESSION['type'] = 'PRO';
            $_SESSION['id_pro'] = getProId($_SESSION['id']);
            break;
        default:
          # code...
          break;
      }
    }
    else {
      $_SESSION['type'] = 'CLIENT';
    }

header('location: ../accueil.php?page=profil');

 ?>
