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

   <p class="text-center">Bonjour <b class="red">'. $prenom . ' ' . $nom .'</b></p>
   <p class="text-center">Merci de rejoindre la communauté ProLinked.</p>
   <p class="text-center">Le site internet www.prolinked.fr sera entièrement disponible et fonctionnel très bientôt. Nous vous en tiendrons informé</p>
   <p class="text-center">En attendant, vous pouvez déjà <a href="http://dev.prolinked.fr/accueil.php?page=devenez-pro">créer votre compte professionnel</a>, ou bien  <a href="http://dev.prolinked.fr/accueil.php?page=recommandez">recommander les professionnels </a> dont vous êtes satisfait. </p>
   <p class="red text-center">ProLinked est une communauté de confiance, d\'entraide et de partage !</p>
   <p class="text-center">En recommandant des professionnels sur ProLinked, vous partagez bien plus que de bons conseils : c’est aussi toute votre communauté !</p>
   <p class="text-center">Plus les utilisateurs se recommanderont mutuellement de bons professionnels, et mieux ce sera pour l\'ensemble de la communauté !</p>
   <p class="text-center">À très bientôt, </p>
   <p class="text-center">L\'équipe ProLinked.</p>

   </div>
  </body>
</html>
';



 ?>
