<?php

session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

$recs = getRecs($_SESSION['id']);


$res = array();
foreach ($recs as $rec)
{
  $user = getUserById($rec['id_sender']);
  $name = $user['user_firstname'] . ' ' . $user['user_lastname'];

  $info['name'] = $name;
  $info['sender_id'] = $rec['id_receiver'];

  array_push($res, $info);
}


echo json_encode($res);


 ?>
