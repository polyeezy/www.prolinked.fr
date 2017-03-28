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
<li><a href="accueil.php" class="bold" <?php checkActive("devenez-pro"); ?>><i class="fa fa-home fa-lg"></i></a></li>
<?php
if (!userIsPro($user))
{
   ?>
 <li><a href="accueil.php?page=devenez-pro" class="bold" <?php checkActive("devenez-pro"); ?>>Devenez professionnel <span class="pro_notifs"></span></a></li>
 <?php } ?>
 <li><a href="accueil.php?page=recommandez" class="bold" <?php checkActive("recommandez"); ?>>Recommandez</a></li>
  <li class="dropdown" onclick="window.location.href = 'accueil.php?page=profil'">
       <a href="accueil.php?page=profil" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
         <span class="nb_notifs"></span> <span class="caret"></span></a>
       <ul class="dropdown-menu">
         <li class="full-width"><a href="accueil.php?page=profil">Mon profil</a></li>
         <?php if (userIsPro($user))
         {
         echo '<li><a href="php/client-to-pro.php">';
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
         echo '<li><a href="accueil.php?page=devenez-pro">Passer en mode Pro</a></li>';
       }
          ?>
       </ul>
     </li>
 <li><a href="deconnexion.php" class="bold">Deconnexion</a></li>
 <!-- <li ><a href="accueil.php?page=profil" class="bold" <?php checkActive("rendez-vous"); ?>>Rendez-vous</a></li> -->
 <!-- <li><a href="accueil.php?page=messages" class="bold"<?php checkActive("messages"); ?>>Messages</a></li>-->
 <!-- <li><a href="accueil.php?page=mode-emploi">Aide</a></li> -->
      </ul>
    </div>
  </div>
</nav>
<?php
  function checkActive($current)
  {
    if (isset($_GET['page']) && $current == $_GET['page'])
      echo 'class="border"';
  }

 ?>

<script type="text/javascript">
  checkProAccount();
</script>
