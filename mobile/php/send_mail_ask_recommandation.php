<?php

require_once('PHPMailer/PHPMailerAutoload.php');
include(dirname(dirname(__DIR__)) . "/include/Membership.php");

  $receiver = getUserById($_POST['receiver']);

  $sender = getUserById($_POST['sender']);



    $fullname = $sender['user_firstname'] . ' ' . $sender['user_lastname'];


  include "../mails/mail-demande-recommandation.php";

  $email = $receiver['user_email'];

  $mail = new PHPMailer(true);

  $mail->Host = 587;
  $mail->Port = 465;
  $mail->addAddress($email, $email);
  $mail->setFrom("hello@prolinked.fr", "ProLinked");
  $mail->CharSet = 'UTF-8';
  $mail->Subject = $fullname . ' vous à envoyé une demande de recommandation';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "hello@prolinked.fr";
  //Password to use for SMTP authentication
  $mail->Password = "cab0493392127";
  //$mail->AltBody = $_POST['contact_content'];
  $mail->MsgHTML($body);

  if ($mail->Send())
    echo "La demande de recommandation a bien été envoyée";
  else {
    echo "La demande de recommandation a echoué";
  }
 ?>
