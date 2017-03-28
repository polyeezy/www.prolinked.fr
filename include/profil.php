<?php
session_start();

include(dirname(__DIR__) . "/include/Membership.php");


if (isset($_SESSION['id']))
{
  $user = getUserById($_SESSION['id']);
  if (empty($user))
  {
    header('location: index.php');
  }
  if (isset($user['user_firstname']) && empty($user['user_firstname']) || isset($user['user_lastname']) && empty($user['user_lastname']))
    {
      header('location: modifier-profil.php?name=invalid');
    }
}
else
{
  header('location: index.php');
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 <!-- Optional theme -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
 <!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   <meta name="description" content="Connectez-vous à ProLinked et vous découvrirez quels bon professionnels vos amis ou vos relations recommandent ! " />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
   <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script type="text/javascript" src="js/javascript.js"></script>
 </head>
 <!-- <head>
   <meta charset="utf-8">
   <title>ProLinked - Découvrez les recommandations professionnelles</title>
   <link rel="icon" type="image/png"href="img/favicon.ico">
   <meta name="viewport" content="width=device-width"/>

   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
   <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
   <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 </head> -->

  <body>


  <div class="content">
    <div class="flex-container">

<!--
        <div class=" flex-item Header navbar-header navbar-fixed-top">
          <a href="#">
            <img id="logo" src="img/Logo.png" alt="ProLinked" />
          </a>
          <ul class="nav navbar-nav navbar-right">
             <li><a href="">Recommender</a></li>
             <li><a href="#">Bureau</a></li>
             <li><a href="#">// echo $user['user_firstname'] ?></a></li>
             <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
             <li><a href="#">Aide</a></li>
           </ul>
        </div>
-->

   <?php

    include("pages/header.inc.php");

    if (empty($user['user_firstname']) || empty($user['user_lastname']))
      header('location: modifier-profil.php');
    if (userIsPro($user))
      include("templates/profil-pro.tpl.php");
    else
      include("templates/profil.tpl.php");

     ?>
    </div>
    <?php     include("pages/footer.inc.php");
 ?>
  </div> <!-- CONTENT -->

  </body>
</html>
