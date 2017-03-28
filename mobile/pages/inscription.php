<div class="row inscription">
  <div class="col-md-6 col-md-offset-3 center-text ">
    <h2>Inscription</h2>
    <div class="col-md-8 col-md-offset-2 ">

    <p>
      Les meilleurs professionnels sont sur ProLinked, puisque vous les avez recommandés.
    </p>
  </div>
    <div class="row">
      <div class="col-md-12">
        <a href="php/fblogin.php"type="button" class="btn btn-default blue btn-primary bouton" aria-label="Left Align">Inscription via Facebook</a>
      </div>
    </div>

  </br>

    <div class="row">
    <div class="col-md-12">
      <form c action="php/login-register.php" method="post">

          <input type="text" name="user_firstname" class="form-control center bouton" placeholder="Prénom" >
          <input type="text" name="user_lastname" class="form-control center bouton" placeholder="Nom" >
          <input type="text" name="user_mail" class="form-control center bouton" placeholder="Adresse e-mail" >
          <input type="password" name="user_password" class="form-control center bouton" placeholder="Mot de passe" >
          <input type="password" name="user_password2" class="form-control center bouton" placeholder="Confirmation mot de passe" >

          <?php

          if (isset($_GET['register_ko']))
            {
              switch ($_GET['register_ko'])
                {
                  case "empty_field":
                    echo '<span class="red">Tous les champs sont obligatoires </span>';
                    break;
                  case "mdp_differs":
                    echo '<span class="red">Les mots de passes sont differents</span>';
                  case "user":
                  echo '<span class="red">L\'adresse mail est déjà enregistrée</span>';
                  break;
                }
            }

           ?>

    </div>
    <div class="row">
      <div class="col-md-6">
        <p class="black-text">
          En cliquant sur 'S'inscrire', vous acceptez les <a href="#">Conditions Générales d'utilisation</a>  et la <a href="#"> Politique de Confidentialité </a>
        </p>
        <button type="submit" name="register"class="btn  red full-width" aria-label="Left Align">S'inscrire</button>
      </form>

      </div>
    </div>

  </div>



</div>
</div>
