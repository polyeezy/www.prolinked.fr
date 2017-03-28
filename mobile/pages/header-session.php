<nav class="navbar navbar-inverse no-bg full-width">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand  center-text" href="accueil.php"><img src="img/logo1.png" alt="" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">

<?php

  function checkActive($current)
  {
    if (isset($_GET['page']) && $current == $_GET['page'])
      echo 'class="border"';
  }



  if (!userIsPro($user))
  {
  ?>

  <li class="full-width"><a href="accueil.php?page=devenez-pro" class="center-text" <?php checkActive("devenez-pro"); ?>>Devenez professionnel</a></li>

  <?php } ?>



 <li class="full-width"><a href="accueil.php?page=recommandez" class="center-text" <?php checkActive("recommandez"); ?>>Recommandez</a></li>
 <li class="full-width"><a href="accueil.php?page=profil" class="center-text" <?php checkActive("profil"); ?>>  <?php echo $user['user_firstname']; if (userIsPro($user)) echo " (pro)"; ?></a></li>
 <li class="full-width"><a href="accueil.php?page=rendez-vous" class="center-text"<?php checkActive("rendez-vous"); ?>>Rendez-vous</a></li>
 <li class="full-width"><a href="accueil.php?page=messages"class="center-text"<?php checkActive("messages"); ?>>Messages</a></li>
 <li class="full-width"><a href="accueil.php?page=aide" class="center-text">Aide</a></li>
 <li class="full-width"><a href="deconnexion.php" class="center-text">Deconnexion</a></li>

      </ul>
    </div>
  </div>
</nav>
