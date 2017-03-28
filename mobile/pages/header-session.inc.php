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

 ?>

      <?php
        if (isset($_GET['page']) && $_GET['page'] == "profil" || $_GET['page'] == 'selection-profession' || $_GET['page'] == 'demander-recommandation' || $_GET['page'] == 'messages' || $_GET['page'] == 'modifier-profil')
      {
        ?>

        <li class="header-link"><a href="accueil.php?page=devenez-pro" class="black-font"<?php checkActive("devenez-pro"); checkActive("selection-profession"); ?>>Devenez professionnel</a></li>
        <li><a href="accueil.php?page=recommandez"class="black-font" <?php checkActive("recommandez"); ?>>Recommandez</a></li>
        <li ><a href="accueil.php?page=profil" class="black-font"<?php checkActive("profil"); ?>>  <?php echo $user['user_firstname']; if (userIsPro($user)) echo " (pro)";?></a></li>
        <li><a href="accueil.php?page=rendez-vous" class="black-font"<?php checkActive("rendez-vous"); ?>>Rendez-vous</a></li>
        <li><a href="accueil.php?page=messages"class="black-font" <?php checkActive("messages"); ?>>Messages</a></li>
        <li><a href="accueil.php?page=aide"class="black-font"<?php checkActive("aide"); ?>>Aide</a></li>

    <?php
      }
      else
{
 ?>

 <li><a href="accueil.php?page=devenez-pro" <?php checkActive("devenez-pro"); ?>>Devenez professionnel</a></li>
 <li><a href="accueil.php?page=recommandez" <?php checkActive("recommandez"); ?>>Recommandez</a></li>
 <li ><a href="accueil.php?page=profil" <?php checkActive("profil"); ?>>  <?php echo $user['user_firstname']; if (userIsPro($user)) echo " (pro)"; ?></a></li>
 <li ><a href="accueil.php?page=profil" <?php checkActive("rendez-vous"); ?>>Rendez-vous</a></li>
 <li><a href="accueil.php?page=messages"<?php checkActive("messages"); ?>>Messages</a></li>
 <li><a href="accueil.php?page=aide">Aide</a></li>
      <?php
}
       ?>
      </ul>
    </div>
  </div>
</nav>
