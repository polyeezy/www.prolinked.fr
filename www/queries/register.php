<?php
session_start();

require_once('../php/PHPMailer/PHPMailerAutoload.php');
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


    $user = getUserById(get_id_from_email($_POST['user_mail']));
    $nom = $user['user_lastname'];
    $prenom = $user['user_firstname'];

    include "../mails/mail-inscription.php";
    include('../php/Sendinblue/Mailin.php');



      $mailin = new Mailin("https://api.sendinblue.com/v2.0", '7ZH21OPs5vn4Szj8');

      $data = array( "to" => array($_POST['user_mail']=>$_POST['user_mail']),
            "from" => array("hello@prolinked.fr","ProLinked"),
            "subject" => "Confirmation de création de compte",
            "html" => $body
      );




    if (isset($_SESSION['invit']) && $_SESSION['invit'] !== 0)
    {
      create_recommandation($_SESSION['id'], $_SESSION['invit'], 0);
      unset($_SESSION['invit']);
    }
    $res = json_encode($mailin->send_email($data));
    $tab = json_decode($res);

    if ($tab->code == "success")
    {
      echo "ok";
    }
    else {
      echo "ko";
    }


 ?>
