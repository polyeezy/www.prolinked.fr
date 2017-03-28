<?php session_start();
include(dirname(__DIR__) . "/include/Membership.php");

if (isset($_SESSION['id']) && !is_null(getUserById($_SESSION['id'])))
  {
    header('location: accueil.php');
  }
  else if (isset($_COOKIE['session']))
    {
      if (getUserById($_COOKIE['session']) !== NULL)
      {
        header('location: deconnexion.php');
      }
      else
      {
      $_SESSION['id'] = $_COOKIE['session'];
      header('location: accueil.php');
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>ProLinked - Découvrez les recommandations professionnelles</title>
 <link rel="icon" type="image/png"href="img/favicon.ico">
 <meta name="viewport" content="width=device-width"/>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <!-- Latest compiled and minified CSS -->
 <script type="text/javascript" src="js/jquery.js"></script>
<meta property="og:image" content="http://www.dev.prolinked.fr/img/logo-profil.png"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 <meta name="description" content="Connectez-vous à ProLinked et vous découvrirez quels bon professionnels vos amis ou vos relations recommandent ! " />

 <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">-->
 <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
 <script type="text/javascript" src="js/javascript.js"></script>
 <script type="text/javascript" src="js/queries.js"></script>

</head>
  <body>


      <div class="content">
        <?php include("includes/header.inc.php");?>

        <?php

        if (isset($_GET['section']))
        {

echo          ' <div class="row page">';


          include('pages/' . $_GET['section'] . '.php');
          echo '</div>';
        }

        else
{
         ?>


        <div class="row page main-bg">


        <?php



          if (isset($_GET['page']))
          {
            include('pages/' . $_GET['page'] . '.php');
          }
          else
          {
            include('pages/inscription.php');
          }

        ?>

        </div>

        <?php include('pages/site.php'); ?>

        <script type="text/javascript">
        if ( (screen.width < 1024) && (screen.height < 768) ) {
    window.location = 'http://m.prolinked.fr';
    }
        </script>



  </div> <!-- CONTENT -->
  <?php
}
  include("includes/footer.php");

   ?>
  </body>
</html>
