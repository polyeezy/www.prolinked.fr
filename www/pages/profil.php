
<?php
    if (empty($user['user_firstname']) || empty($user['user_lastname']))
      header('location: modifier-profil.php');
    if ($_SESSION['type'] == "PRO")
      include("pages/profil/pro.php");
    else
      include("pages/profil/client.php");
        ?>
