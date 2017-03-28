<?php session_start();
if (!isset($_SESSION['id']))
{
    header('location: index.php');
}
  else {
    $id = $_SESSION['id'];
    setcookie('session', $id);
    session_set_cookie_params(0, '/', NULL, TRUE, TRUE);

  }
    include(dirname(__DIR__) . "/include/Membership.php");
    $user = getUserById($_SESSION['id']);


?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ProLinked - Découvrez les recommandations professionnelles</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.css">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <script type="text/javascript" src="js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

 <!-- Optional theme -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.js"></script>

 <!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <meta name="description" content="Connectez-vous à ProLinked et vous découvrirez quels bon professionnels vos amis ou vos relations recommandent ! " />

  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="js/javascript.js"></script>
  <script src="js/queries.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->



        <?php include("includes/header-session.php"); ?>



        <div class="content">
<?php
          if (isset($_GET['page']))
          {
            include('pages/' . $_GET['page'] . '.php');
          }
          else {

          ?>
          <div class="bienvenue-bg page">
              <div class="col-md-6 col-md-offset-3 center-text">
              </br>              </br>              </br>


                <h2 class="white">BIENVENUE SUR PROLINKED</h2>
              </div>
              <div class="row col-md-6 col-md-offset-3 center-text">
                <p><h4 class="white">                Recherchez des professionnels recommandés par vos amis ou vos relations parmis plus de 300 professions.
</h4>
                </p>
              </div>
          </div>

          <div class="nomargin">


          <div class="wrap">
              <div class="row">
                <h3 class="center-text dark-grey-font">Le site sera entièrement</br> disponible dans:</h3>

                <div class="col-md-12">
                  <div class="col-xs-3  bloc  " id="days">
                    Jours
                  </div>
                  <div class="col-xs-3 bloc " id="hours">
                    Heure
                  </div>
                  <div class="col-xs-3 bloc " id="minutes">
                    Minutes
                  </div>
                  <div class="col-xs-3 bloc" id="seconds">
                    Secondes
                  </div>
                </div>

<div class="row col-xs-10 center-text col-xs-offset-1">
</br>
<h4>En attendant,vous pouvez déjà créer votre <a href="accueil.php?page=devenez-pro"> compte professionnel </a> ,
  ou bien, <a href="accueil.php?page=recommandez">recommander</a> les professionnels dont vous êtes satisfait.</h4>
</br>
</div>

</br>

          </div>
        </br>

          </div>

        </div>
            <?php
        }
?>

        </div>

<?php

  include("includes/footer.php");

 ?>

<script type="text/javascript">
  checkPhoneMobile();
</script>


  </body>
</html>
