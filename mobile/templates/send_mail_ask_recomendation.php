<?php


$body = '
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <img id="logo" src="http://dev.prolinked.fr/img/Logo_1.png" alt="Logo ProLinked" >
    <h1>Bienvenue sur ProLinked</h1>
    <h4>Découvrez les recommandations professionnelles de vos amis ou de vos relations qui vous permettront de faire à coup sûr le meilleur choix !
   </h2>

   <style media="screen">
   body
   {
     font-family: Avenir;
     font-weight: medium;
     width: 500px;
     margin-left: auto;
     margin-right: auto;
     text-align: center;
   }

   h1
   {
     color: red;
   }

   #logo
   {
     width: 350px;
     height: auto;
   }

   .center
   {
     margin-left: auto;
    margin-right: auto;
   }

   .Content
   {
     text-align: left;
   }

   .footer
   {
     text-align: left;
     font-size: 0.8em;
   }

   </style>

   <div class="Content">

   Vous avez reçu une demande de recommandation de <b>'. $sender['user_firstname'] . ' ' . $sender['user_lastname'] .'</b></br>
   Rendez-vous sur <a href="http://dev.prolinked.fr/accueil.php?page=profil">Votre profil</a> afin de l\'accepter.


   </div>
  </body>
</html>
';

 ?>
