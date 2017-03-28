<?php session_start();

$_SESSION['id'] = 1569;


session_set_cookie_params(0, '/', NULL, TRUE, TRUE);    // Cookie de session
if (!isset($_SESSION['id']))
{
    header('location: index.php'); // si pas de session, redirection vers index
}
  else
{
    $id = $_SESSION['id'];
    setcookie('session', $id);
}
    include(dirname(__DIR__) . "/include/Membership.php");
    $user = getUserById($_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>ProLinked - Découvrez les recommandations professionnelles</title>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.js"></script>

 <link rel="icon" type="image/png"href="img/favicon.ico">
 <meta name="viewport" content="width=device-width"/>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 <meta name="description" content="Connectez-vous à ProLinked et vous découvrirez quels bon professionnels vos amis ou vos relations recommandent ! " />
 <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
 <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

 <script type="text/javascript" src="js/javascript.js"></script>
 <script src="js/queries.js"></script>
 <script type="text/javascript" src="js/main.js"></script>
</head>
  <body>

    <script type="text/javascript">
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      window.location.href = "http://" + "m.prolinked.fr/" + window.location.pathname
}
    </script>
    <?php
    ?>
      <div class="content">
        <?php include("includes/header-session.inc.php");?>
        <?php
          if (isset($_GET['page']))
          {
            echo '<div class="row page">';

            include('pages/' . $_GET['page'] . '.php');
          }

          else if (isset($_GET['section']))
          {

  echo          ' <div class="row page">';


            include('pages/' . $_GET['section'] . '.php');
            echo '</div>';
          }

          else
          {
            ?>
            <div class="bienvenue-bg page-90">
                <div class="col-md-12 center-text">
                </br>              </br>              </br>

                  <h1 class="bienvenue"></b>BIENVENUE SUR PROLINKED</b></h1>
                </div>
                <div class="col-md-8 col-md-offset-2 center-text">
                  <p class="white bienvenue-sub">
                  Recherchez des professionnels recommandés par vos amis ou vos relations parmis plus de 300 professions.
                  </p>
                </div>
                <!-- <div class="row col-md-6 col-md-offset-3 center-text">
                </br></br>
                  <a class="waves-effect tored waves-light md-emploi" href="accueil.php?page=mode-emploi">Mode d'emploi</a>
                </div> -->
            </div>

            <div class=" ">

            <div class="wrap">

                <div class="row compteur">

                  <h2 class="center-text dark-grey-font">Le site sera entièrement disponible dans:</h2>

                  <div class="col-md-12 date" id="clockdiv">
                    <div class="col-md-3  bloc center-text " id="days">
                      Jours
                    </div>

                    <div class="col-md-3 bloc " id="hours">
                      Heures
                    </div>
                    <div class="col-md-3 bloc " id="minutes">
                      Minutes
                    </div>
                    <div class="col-md-3 bloc" id="seconds">
                      Secondes
                    </div>
                  </div>
                  <script type="text/javascript" src="js/countdown.js"></script>


                  <div class="row col-xs-12 subcompt center-text ">
                  </br>
                  En attendant,vous pouvez déjà créer votre <a href="accueil.php?page=devenez-pro"> compte professionnel </a> ,
                    ou bien, <a href="accueil.php?page=recommandez">recommander</a> les professionnels dont vous êtes satisfait.
                  </br>
                  </div>


            </div>

            </div>

          </div>
              <?php
          }
 ?>





         <script type="text/javascript">
         if ( (screen.width < 1024) && (screen.height < 768) ) {
     window.location = 'http://m.prolinked.fr';
     }
         </script>

  </div> <!-- CONTENT -->
  <?php

  include("includes/footer.php");

   ?>

<script type="text/javascript">
  checkPhone();
</script>


  </body>
</html>
