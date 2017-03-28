<?php
session_start();
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

if (isset($_POST['update']))
{

  $bio =  preg_replace("/\r\n|\r|\n/",'<br/>', $_POST['user_bio']);

  UpdatePro("user_pro_name", $_POST['user_pro_name'], $_SESSION['id_pro']);
  UpdatePro("user_pro_exp", $_POST['user_pro_exp'], $_SESSION['id_pro']);
  UpdatePro("user_pro_adress", $_POST['user_pro_adress'], $_SESSION['id_pro']);
  UpdatePro("user_pro_siret", $_POST['user_pro_siret'], $_SESSION['id_pro']);
  UpdatePro("user_pro_bio", $bio, $_SESSION['id_pro']);
  UpdatePro("user_pro_statut", $_POST['user_pro_statut'], $_SESSION['id_pro']);

  $pro = getProUser($_SESSION['id']);

  if (!empty($pro['user_pro_name']) && $pro['user_pro_exp'] !== "Experience" && !empty($pro['user_pro_adress']) && !empty($pro['user_pro_siret']) && $pro['user_pro_statut'] !== "Selectionnez votre statut")
  {
    UpdatePro("user_pro_init", 1, $_SESSION['id_pro']);

  }


}
 header('location: ../accueil.php?page=profil');



 ?>
