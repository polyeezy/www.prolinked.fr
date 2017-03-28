<?php

session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

changeRecommandationState($_POST['rec_id'], $_POST['state']);


 ?>
