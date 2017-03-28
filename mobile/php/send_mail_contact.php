<?php

require_once('PHPMailer/PHPMailerAutoload.php');

if (isset($_POST['contact_submit']))
{
    if (!empty($_POST['contact_firstname'])
        && !empty($_POST['contact_lastname'])
        && !empty($_POST['contact_email'])
        && !empty($_POST['contact_object'])
        && !empty($_POST['contact_content']))
        {


          $mail = new PHPMailer(true);

          $mail->Host = 587;
          $mail->Port = 465;
          $mail->setFrom("dev@prolinked.fr", "Valerian Polizzi");
          $mail->addAddress($_POST['contact_email'], '');
          $mail->CharSet = 'UTF-8';
          $mail->Subject = '[CONTACT PROLINKED.FR] ' . $_POST['contact_object'];

          //$mail->AltBody = $_POST['contact_content'];
          $mail->MsgHTML($_POST['contact_content']);

          if ($mail->Send())
            header('location: ../index.php?message=ok');
          else
          header('location: ../index.php?message=ok');

        }
}

 ?>
