<?php

require('autoload.php');


$MessageBird = new \MessageBird\Client('live_QQa6MfiGNhnBx56LT8ZkWTcDc');

$Message = new \MessageBird\Objects\Message();
$Message->originator = 'Prolinked';
$Message->recipients = '+33' . intval($_POST['phone']);
$Message->body = 'Votre code de validation est le : ' . $_POST['code'];
$MessageBird->messages->create($Message);


 ?>
