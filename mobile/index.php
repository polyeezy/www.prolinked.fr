<?php session_start();
include(dirname(__DIR__) . "/include/Membership.php");


if (isset($_SESSION['id']) && !is_null(getUserById($_SESSION['id'])))
  {
    header('location: accueil.php');
  }
  else if (isset($_COOKIE['session']) && getUserById($_COOKIE['session']) !== NULL)
    {
      $_SESSION['id'] = $_COOKIE['session'];
      header('location: accueil.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png"href="img/favicon.ico">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ProLinked - Découvrez les recommandations professionnelles</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->


        <?php
        ?>
        <?php include("includes/header.inc.php"); ?>

        <div class="content">
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

<div class="row connexion">
  <div class="col-md-6 col-md-offset-3 center-text">
    <h2>Le site</h2>
</div>

<div class="row">

  <div class="col-md-12">

<div id="myCarousel" class="carousel slide" data-interval="false" data-ride="">
  <!-- Indicators -->


  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <div class="item active col-md-12 col-md-offset-4">
      <div class="col-md-4  center-text  ">
        <p class="text-under-img">
Vous accordez toujours plus d'importance aux professionnels que vous recommandent vos proches. ProLinked, site de recommandation entièrement gratuit, met toute la communauté en communication avec plus de 300 professions référencées (sport, santé, maison, juridique, enfant ...)        </p>
      </div>
    </div>

    <div class="item col-md-12 col-md-offset-4">
      <div class="col-md-4  center-text  ">
        <p class="text-under-img">
Relié à votre compte Facebook, LinkedIn, Google+, ou en important vos contacts mails, ProLinked vous permet de voir quels professionels vos amis recommandent ainsi que les relations en commun que vous partagez, ce qui vous aidera à faire le bon choix en toute confiance.        </p>
      </div>
    </div>

    <div class="item  col-md-12 col-md-offset-4">
      <div class="col-md-4  center-text">
        <p class="text-under-img">
          Clients</br>
          Sur ProLinked, tous les professionnels ne pourront pas être référencés. Vous ne serez en contact qu’avec ceux ayant été recommandés ! Tous les profils sont vérifiés, c’est notre gage de qualité !</br></br>
          Professionnels</br>
          Attirez de nouveaux clients, faites des offres, communiquez, faites-vous connaître, renforcez, étoffez, exploitez votre réseau, et placez vous en expert ! Bref, soyez le professionnel le plus recommandé autour de vous ! Planifiez, organisez, entrez dans votre "bureau" et visualiez tous vos rendez-vous programmés avec un rappel de la date, du lieu, de l'heure ainsi, que l'adresse du rendez-vous ... (agenda, service de rappel par SMS)
        </p>
      </div>
    </div>

    <div class="item  col-md-12 col-md-offset-4">
      <div class="col-md-4  center-text  ">
        <p class="text-under-img">
          Planifiez, organisez, entrez dans votre "bureau" et visualiez tous vos rendez-vous programmés avec un rappel de la date, du lieu, de l'heure ainsi, que l'adresse du rendez-vous ... (agenda, service de rappel par SMS)

        </p>
      </div>
    </div>




    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>
</div>



<div class="row compteur">
  <div class="col-md-12 bg-compteur center-text ">
    <div class="">
    </br>
      <span class="white-font 1000users ">Déjà plus de 1000 utilisateurs.</br>Rejoignez-les, c'est 100% gratuit</span>
    </div>
  </div>

</div>

</div>

<?php

include("includes/footer.php");

 ?>

        </div>

<script type="text/javascript">
$(function(){
  // You used .myCarousel here.
  // That's the class selector not the id selector,
  // which is #myCarousel

  $('.carousel').carousel({
    interval: false
  });

});

</script>



  </body>
</html>
