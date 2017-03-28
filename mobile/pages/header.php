<nav class="navbar navbar-inverse no-bg full-width">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand  center-text" href="index.php"><img id="logo" src="img/logo1.png" alt="" /></a>
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
      <li class="center-text"><a href="index.php?page=connexion" <?php checkActive("connexion"); ?>>Connexion</a></li>
      <li class="center-text"><a href="index.php?page=inscription" <?php checkActive("inscription"); ?>>Inscription</a></li>
      </ul>
    </div>
  </div>
</nav>
