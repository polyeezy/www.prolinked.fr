<?php



require('autoload.php');
include(dirname(dirname(__DIR__)) . "/include/Membership.php");


$user = getUserById($_POST['from']);

$name = $user['user_firstname'] . ' ' . $user['user_lastname'];

if (getInvitSmsCount($_POST['phone'], $_POST['from']) > 0)
{
  echo "Vous avez deja recommandé cette personne.";
  return;
}
createInvitationPhone($_POST['phone'], $_POST['from']);


$MessageBird = new \MessageBird\Client('live_QQa6MfiGNhnBx56LT8ZkWTcDc');

$Message = new \MessageBird\Objects\Message();
$Message->originator = 'Prolinked';
$Message->recipients = '+33' . intval($_POST['phone']);
$Message->body = $name . ' vous a recommandé sur ProLinked.
Faites partie des professionnels les plus recommandés autour de vous en vous inscrivant. C\'est entièrement gratuit. 
Bonne navigation.';
$MessageBird->messages->create($Message);
echo "Recommandation envoyé au " . $_POST['phone'];


 ?>
