<?php session_start();

include('Sendinblue/Mailin.php');
include(dirname(dirname(__DIR__)) . "/include/Membership.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
$user = getUserById($_SESSION['id']);
$name = $user['user_firstname'] . ' ' . $user['user_lastname'];

$prof = "";


if (!empty($_POST['user_profession']))
{
  $prof = " en tant que " . $_POST['user_profession'];
}

$_POST['user_profession'];

include "../mails/mail-invit.php";


$mailin = new Mailin("https://api.sendinblue.com/v2.0", '7ZH21OPs5vn4Szj8');

    $data = array(
          "to" => array($_POST['user_mail'] => $_POST['user_mail']),
          "from" => array("hello@prolinked.fr","ProLinked"),
          "subject" => $name . " vous a recommandé sur ProLinked" . $prof,
          "html" => $body
    );


    createInvitation(trim($_POST['user_mail']), $_SESSION['id']);


    $res = json_encode($mailin->send_email($data));
   $tab = json_decode($res);


    if ($tab->code == "success")
    {
      header('location: ../accueil.php?page=recommandez&send=ok');
    }
    else {
      header('location: ../accueil.php?page=recommandez&send=ko');
    }
  //var_dump($tab);

//if ($mail->Send())
//{
  //header('location: ../accueil.php?page=recommandez&send=ok');
//}
//else {
  //header('location: ../accueil.php?page=recommandez&send=ko');
//}


 ?>
