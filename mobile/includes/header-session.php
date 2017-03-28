<nav class="navbar navbar-inverse no-bg full-width">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand  center-text" href="accueil.php"><img id="logo-header" src="img/logo1.png" alt="" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
        <li class="full-width"><a class="center-text" href="accueil.php" <?php checkActive("devenez-pro"); ?>><i class="fa fa-home fa-lg"></i> Accueil</a></li>

<?php

  function checkActive($current)
  {
    if (isset($_GET['page']) && $current == $_GET['page'])
      echo 'class="border"';
  }



  if (!userIsPro($user))
  {
  ?>

  <li class="full-width"><a href="accueil.php?page=devenez-pro" class="center-text" <?php checkActive("devenez-pro"); ?>>Devenez professionnel <span class="pro_notifs"></span></a></li>

  <?php

}
else {
  # code...
}


   ?>


 <li class="full-width"><a class="center-text"href="accueil.php?page=recommandez" class="center-text" <?php checkActive("recommandez"); ?>>Recommandez</a></li>
 <li class="full-width"><a class="center-text"href="accueil.php?page=profil" class="center-text">
         <?php

         if (isset($_SESSION['type']) && $_SESSION['type'] == "PRO")
         {
          $pro = getProUser($_SESSION['id']);
          echo $pro['user_pro_name'];
        }
        else {
          echo $user['user_firstname'];
        }
?>
<span class="nb_notifs"></a></li>

<?php

if (userIsPro($user))
         {

         echo '<li class="full-width"><a class="center-text" href="php/client-to-pro.php">';

         if (isset($_SESSION['type']))
         {
           if ($_SESSION['type'] == "PRO")
           {
            echo 'Passer en mode Client';
           }
           else {
             echo 'Passer en mode Pro';
           }

         }
         else {
           echo 'Passer en mode Pro';
         }

         echo '</a></li>';
       }
       else {
         echo '<li class="full-width"><a class="center-text" href="accueil.php?page=devenez-pro">Passer en mode Pro</a><span class="pro_notifs"></span></li>';
       }

 ?>

 <li class="full-width"><a href="deconnexion.php" class="center-text">Deconnexion</a></li>

      </ul>
    </div>
  </div>
</nav>
