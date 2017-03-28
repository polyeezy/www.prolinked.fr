<?php
session_start();
// echo $_SESSION['id'];
// echo $_SESSION['firstname'];
// echo $_SESSION['lastname'];
// echo $_SESSION['email'];
// echo $_SESSION['birthday'];
// echo '<img src="' . $_SESSION['cover'] . '"/>' ;
// $_SESSION['gender'] = $gender;
// echo '<img src="' . $_SESSION['profil_pic'] . '"/>' ;



//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

?>

<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">

<?php



if ($fid = getUserByFID($_SESSION['fb_id']))
{
  $_SESSION['id'] = $fid;
  header('location: ../accueil.php');
}
else {
  $_SESSION['id'] = Fb_Register($_SESSION['fb_id'], $_SESSION['email'], $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['profil_pic'], $_SESSION['cover']);
  header('location: ../accueil.php?page=modifier-profil');
}

header('location: ../accueil.php?page=modifier-profil');


 ?>
