<?php

session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");


if (empty($_POST['user_profession']))
{
  header('location: ../accueil.php?page=selection-profession');
  return;
}

if (isset($_POST['user_id']))
{
  setProfession($_POST['user_profession'], $_POST['user_id']);
  header('location: ../accueil.php?page=demander-recommandation');
}
else {
header('location: ../accueil.php');
}

 ?>
