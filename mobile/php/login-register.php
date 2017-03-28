<?php session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

require_once('PHPMailer/PHPMailerAutoload.php');


function send_mail_confirmation($email, $token = NULL)
{

  $user = getUserById(get_id_from_email($email));
  $nom = $user['user_lastname'];
  $prenom = $user['user_firstname'];

  include "../mails/mail-inscription.php";


  $mail = new PHPMailer(true);

  $mail->Host = 587;
  $mail->Port = 465;
  $mail->addAddress($email, $email);
  $mail->setFrom("hello@prolinked.fr", "ProLinked");
  $mail->CharSet = 'UTF-8';
  $mail->Subject = 'Confirmation de création de compte';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "hello@prolinked.fr";
  //Password to use for SMTP authentication
  $mail->Password = "cab0493392127";
  //$mail->AltBody = $_POST['contact_content'];
  $mail->MsgHTML($body);

  if ($mail->Send())
    header('location: ../index.php?message=ok');
  else
  header('location: ../index.php?message=ko');
}

if (isset($_POST['login']))
{
  $id = Login($_POST['user_mail'], $_POST['user_password']);


    if ($id == "WRONGMDP")
    {
      unset($_SESSION['id']);
      header('location: ../index.php?login_ko=mdp&user=' . $_POST['user_mail']);
    }
    else
    if ($id == "WRONGUSER")
    {
      unset($_SESSION['id']);
      header('location: ../index.php?login_ko=user&user=' . $_POST['user_mail']);
    }
else {
  $_SESSION['id'] = $id;
  $_SESSION['type'] = "CLIENT";
  header('location: ../accueil.php');}


}

if (isset($_POST['register']))
{

  if (empty($_POST['user_firstname']) || empty($_POST['user_lastname']) || empty($_POST['user_mail']) || empty($_POST['user_password']) || empty($_POST['user_password2']))
    {
      header('location: ../index.php?page=inscription&register_ko=empty_field');
      return;
    }

  if ($_POST['user_password'] !== $_POST['user_password'])
    {
      header('location: ../index.php?register_ko=mdp_differs');
      return;

    }

  if (user_adress_exists($_POST['user_mail']))
  {
      header('location: ../index.php?register_ko=user');
      return;

    }
  else
  {
    $_SESSION['id'] = Register($_POST['user_mail'], $_POST['user_password'], $_POST['user_firstname'], $_POST['user_lastname']);
    send_mail_confirmation($_POST['user_mail']);
    header('location: ../accueil.php?page=modifier-profil');
    return;

  }
}
  header('location: ../index.php');

 ?>
