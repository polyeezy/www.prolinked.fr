<?php

// Download library -> https://www.primotexto.com/api/librairies/latest-php.asp
require_once 'primotexto-api-php/baseManager.class.php';

// Authentication
authenticationManager::setApiKey('3a03a8ab439a97e0d4755145a733ffb1');

// Send SMS Notification
$sms = new Sms;
  $sms->type = 'notification';
  $sms->number = '+33661751697';
  $sms->message = 'Code de confirmation: 283951';
  $sms->sender = 'YourCompany';
  $sms->campaignName = 'Code de confirmation';
  $sms->category = 'codeConfirmation';
  messagesManager::messagesSend($sms);


 ?>
