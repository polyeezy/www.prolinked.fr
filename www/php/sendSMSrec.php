<?php



require('autoload.php');
include(dirname(dirname(__DIR__)) . "/include/Membership.php");


$user = getUserById($_POST['from']);

$name = $user['user_firstname'] . ' ' . $user['user_lastname'];

$prof = "";


if (!empty($_POST['user_profession']))
{
  $prof = " en tant que " . $_POST['user_profession'];
}

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
$Message->body = $name . 'vous a recommandé sur ProLinked '. $prof.'.Sur ProLinked, vous êtes mis en relation avec de nombreux clients à la recherche de service comme le votre, vous attirez de nouveaux contacts et vous exploitez votre réseau.
Le site est entièrement gratuit.';
$MessageBird->messages->create($Message);
echo "Recommandation envoyé au " . $_POST['phone'];



 ?>
