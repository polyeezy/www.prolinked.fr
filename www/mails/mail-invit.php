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
    <img id="logo" src="http://www.prolinked.fr/img/Logo_1.png" alt="Logo ProLinked" >
    <h1 class="red">Bienvenue sur ProLinked</h1>
    <h4 class="grey">Recherchez des professionnels recommandés par vos amis ou vos relations et faites le meilleur choix, à chaque fois ! </h4>

   <div class="Content">


   <p class="text-center"><b class="red">'. $name .'</b> vous a recommandé pour faire partie des professionnel sur ProLinked' . $prof. '.</p>
   <p class="text-center">ProLinked est un site de mise en relation entre clients et professionnels entièrement basé sur de la recommandation sociale. ( B to C )</p>
   <p class="text-center grey">Sur ProLinked, vous êtes mis en relation avec de nombreux clients à la recherche de service comme le vôtre, vous attirez de nouveaux contacts et vous exploitez votre réseau en vous faisant recommander. </p>
   <p class="text-center grey"> Une présence sur ProLinked vous permettra d\'augmenter de manière considérable votre visibilité ainsi que votre activité auprès d\'un large public cible intéressé par vos services. </p>
   <p class="text-center grey"> Le site est entièrement gratuit. Inscription : <a href="http://prolinked.fr/">http://prolinked.fr/</a></p>

   <p class="text-center">L\'équipe ProLinked.</p>

   </div>
  </body>
</html>
';


 ?>
