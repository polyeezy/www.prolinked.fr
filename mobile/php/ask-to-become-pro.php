<?php
session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");


if (isset($_POST['send-rec-request']))
{
  if (adress_is_member($_POST['user_email']) == true)
    {
      $id = create_token_ask_recommendation($_POST['user_id'], $_POST['user_email']);



      include("../templates/send_mail_ask_recomendation.php");

      require_once('PHPMailer/PHPMailerAutoload.php');

      $mail = new PHPMailer(true);

      $mail->Host = 587;
      $mail->Port = 465;
      $mail->addAddress($_POST['user_email'], $_POST['user_email']);
      $mail->setFrom("hello@prolinked.fr", "ProLinked");
      $mail->CharSet = 'UTF-8';
      $mail->Subject = 'Demande de recommandation';
      //Whether to use SMTP authentication
      $mail->SMTPAuth = true;
      //Username to use for SMTP authentication - use full email address for gmail
      $mail->Username = "hello@prolinked.fr";
      //Password to use for SMTP authentication
      $mail->Password = "cab0493392127";
      //$mail->AltBody = $_POST['contact_content'];
      $mail->MsgHTML($body);


      $mail->Send();

      header('location: ../accueil.php?page=demander-recommandation&send=ok');
    }
else
{
  header('location: ../accueil.php?page=demander-recommandation&err=wronguser');
}
}

 ?>
