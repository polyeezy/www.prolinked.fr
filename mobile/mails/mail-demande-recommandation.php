<?php


$body = '

<style media="screen">
body
{
  font-family: Avenir;
  font-weight: medium;
  width: 100%;
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

.text-center
{
  text-align: center;
}

.red
{
  color: red;
}

.grey
{
  color: grey;
}

</style>


<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <img id="logo" src="http://dev.prolinked.fr/img/Logo_1.png" alt="Logo ProLinked" >
    <h1 class="red">Bienvenue sur ProLinked</h1>
    <h4 class="grey">Recherchez des professionnels recommandés par vos amis ou vos relations et faites le meilleur choix, à chaque fois ! </h4>

   <div class="Content">

   <p class="text-center"> <b class="red">'. $sender['user_firstname'] . ' ' . $sender['user_lastname'] .'</b> vous à envoyé une demande de recommandation afin qu’il puisse faire partie des professionnels recommandés sur ProLinked.</p>
   <p class="text-center">Rendez-vous sur <a href="http://dev.prolinked.fr/accueil.php?page=profil" target="_blank">Votre profil</a> afin de l\'accepter.</p>
   <p class="text-center">Vous faites toujours plus confiance aux professionnels recommandés par vos proches. </p>
   <p class="text-center">Inscrivez-vous sur <a href="www.prolinked.fr"  target="_blank">www.prolinked.fr</a> </p>
   <p class="red text-center">C’est entièrement gratuit !</p>
   </div>
  </body>
</html>
';


 ?>
