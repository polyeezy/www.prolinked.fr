<?php session_start();


require_once('PHPMailer/PHPMailerAutoload.php');
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

$user = getUserById($_SESSION['id']);

$name = $user['user_firstname'] . ' ' . $user['user_lastname'];

include "../mails/mail-invit.php";

$mail = new PHPMailer(true);

$email = $_POST['user_mail'];



  $mail = new PHPMailer(true);

  $mail->Host = 587;
  $mail->Port = 465;
  $mail->addAddress($email, $email);
  $mail->setFrom("hello@prolinked.fr", "ProLinked");
  $mail->CharSet = 'UTF-8';
  $mail->Subject = $name . ' vous a recommandé sur ProLinked';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "hello@prolinked.fr";
  //Password to use for SMTP authentication
  $mail->Password = "cab0493392127";
  //$mail->AltBody = $_POST['contact_content'];
  $mail->MsgHTML($body);

if ($mail->Send())
{
      createInvitation($email, $_SESSION['id']);
      header('location: ../accueil.php?page=recommandez&send=ok');
}
else {
  header('location: ../accueil.php?page=recommandez&send=ko');
}


 ?>
