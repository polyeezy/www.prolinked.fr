<?php
  session_start();
  session_destroy();
  header('location: index.php');
  setcookie("session", "", time() - 3600);

 ?>
