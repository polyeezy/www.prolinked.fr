<?php

require_once('PHPMailer/PHPMailerAutoload.php');
include(dirname(dirname(__DIR__)) . "/include/Membership.php");


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

send_mail_confirmation("polizzi.valerian@gmail.com");

 ?>
