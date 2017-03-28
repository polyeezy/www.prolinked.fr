<?php

require_once('PHPMailer/PHPMailerAutoload.php');


function send_mail_confirmation($rec_id)
{

  include "../mails/mail-demande-recommandation.php";


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
  $mail->MsgHTML($id['token']);

  if ($mail->Send())
    header('location: ../index.php?message=ok');
  else
  header('location: ../index.php?message=ko');
}


 ?>
