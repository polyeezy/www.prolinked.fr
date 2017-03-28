<nav class="navbar navbar-inverse no-bg full-width">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand  center-text" href="index.php"><img id="logo-header" src="img/logo/prolinked-logo-header.png" alt="" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">

<?php

  function checkActive($current)
  {
    if (isset($_GET['page']) && $current == $_GET['page'])
      echo 'class="border"';
  }

 ?>

      <?php

      if (isset($_GET['page']) && $_GET['page'] == "profil")
      {
        ?>
        <li><a href="accueil.php" class="bold" <?php checkActive("devenez-pro"); ?>><i class="fa fa-home fa-lg"></i></a></li>
        <li><a href="accueil.php?page=devenez-pro" class="black-font"<?php checkActive("devenez-pro"); ?>>Devenez professionnel</a></li>
        <li><a href="accueil.php?page=recommandez"class="black-font" <?php checkActive("recommandez"); ?>>Recommandez</a></li>
        <li ><a href="accueil.php?page=profil" <?php if (isset($_GET['page']) &&  $_GET['page'] == "profil") echo "class='black-border black-font'"; ?> class="black-font"<?php checkActive("profil"); ?>>  <?php echo $user['user_firstname'] ?></a></li>
        <!-- <li><a href="accueil.php?page=rendez-vous" class="black-font"<?php checkActive("rendez-vous"); ?>>Rendez-vous</a></li> -->
        <!-- <li><a href="accueil.php?page=messages" class="black-font"<?php checkActive("messages"); ?>>Messages</a></li> -->
        <!-- <li><a href="accueil.php?page=aide"class="black-font"<?php checkActive("aide"); ?>>Aide</a></li> -->
        <li><a href="http://dev.prolinked.fr/deconnexion.php" class="black-font">Deconnexion</a></li>
    <?php
      }
      else
{
 ?>

      <li><a href="index.php?page=connexion" <?php checkActive("connexion"); ?>>Connexion</a></li>
      <li><a href="index.php?page=inscription" <?php checkActive("inscription"); ?>>Inscription</a></li>
      <?php
}
       ?>
      </ul>
    </div>
  </div>
</nav>
