<?php session_start();
if (isset($_SESSION['id']))
{
  $id = $_SESSION['id'];

    include(dirname(__DIR__) . "/include/Membership.php");
    $user = getUserById($_SESSION['id']);
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
 <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
 <!-- Latest compiled and minified CSS -->
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
 <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">

 <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">-->
 <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <script type="text/javascript" src="js/javascript.js"></script>
 <script src="js/queries.js"></script>
 <script type="text/javascript" src="js/main.js"></script>


</head>
  <body>

    <script type="text/javascript">

    </script>



      <div class="content">
        <?php

        if (isset($_SESSION['id']))
        {
        include("includes/header-session.inc.php");
        }
        else {
          include("includes/header.inc.php");
        }
          if (isset($_GET['content']))
          {
            echo '<div class="row page section_block">';


            include('pages/footer/' . $_GET['content'] . '.php');

            echo '</div>';



          }





            ?>


  </div> <!-- CONTENT -->
  <?php

  include("includes/footer.php");

   ?>




  </body>
</html>
