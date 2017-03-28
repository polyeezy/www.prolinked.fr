<div class="row connexion">
  <div class="col-md-6 col-md-offset-3 center-text ">
    <h2>Connexion</h2>
    <div class="col-md-8 col-md-offset-2 ">
    <p>
      Les meilleurs professionnels sont sur ProLinked, puisque vous les avez recommandés.
    </p>
  </div>
    <div class="row">
      <div class="col-md-12">
        <a href="php/fblogin.php"type="button" class="btn btn-default blue btn-primary bouton" aria-label="Left Align">Connexion via Facebook</a>
      </div>
    </br>
  </br>
    </div>

    <div class="row">
      <form  action="php/login-register.php" method="post">
    <div class="col-md-12">
      <?php
              if (isset($_GET['login_ko']))
                {
                  switch ($_GET['login_ko'])
                    {
                      case "user":
                        echo '<span class="red">L\'adresse mail ne correpond a aucun utilisateur</br></span></br>';
                        break;
                      case "mdp":
                        echo '<span class="red">Le mot de passe est incorrect</span></br></br>';
                      break;
                    }
                }
       ?>

          <input type="text" name="user_mail" class="form-control center bouton" placeholder="Adresse e-mail" >
          <input type="password" name="user_password" class="form-control center bouton" placeholder="Mot de passe" >
    </div>
    <div class="row">
      <div class="col-md-12">
    <a href="#" class="red-font">Mot de passe oublié ?</a></br>
        <button type="submit" name="login" class="btn  red full-width" aria-label="Left Align">Se connecter</button>
      </form>
      </div>
    </div>
  </div>
  </div>
</div>
