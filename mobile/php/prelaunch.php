<?php
  include(dirname(__DIR__) . "/include/defines.php");

  if (isset($_POST['prelaunch_email']))
  {
    if (prelaunch_add_adress($_POST['prelaunch_email'], date("Y-m-d")) && !empty($_POST['prelaunch_email']))
      header('location: ../index.php?prelaunch=ok');
    else
      header('location: ../index.php?prelaunch=ko');
  }
 header('location: ../index.php');

 ?>
