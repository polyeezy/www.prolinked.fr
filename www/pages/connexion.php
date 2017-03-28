<div class="row connexion">
  <div class="col-md-6 col-md-offset-3 center-text white-font">
    <h2>Connexion</h2>
    <div class="col-md-8 col-md-offset-2">
      <h4>Les meilleurs professionnels sont sur ProLinked, puisque vous les avez recommandés.</h4>
  </div>
    <div class="row">
      <div class="col-md-12">
        <button type="button" class="btn btn-default blue btn-primary bouton white-font" aria-label="Left Align"><a href="php/fblogin.php" class="white-font">Connexion via Facebook</a></button>
      </div>

    </div>
  </br>

    <div class="row">
    <div class="col-md-12">
      <span class="red" id="login_response"></span>
      <form onsubmit="Login(); return false;">
        <input type="text" name="user_mail" id="input_user" class="form-control center bouton" placeholder="Adresse e-mail" >
        <input type="password" id="input_password" name="user_password" class="form-control center bouton" placeholder="Mot de passe" >
    </div>
    <div class="row">
      <div class="col-md-12">
        <a href="#">Mot de passe oublié ?</a></br>
        <button type="submit" onclick="Login()" name="login" class="btn  red full-width" aria-label="Left Align">Se connecter</button>
      </form>
      </div>
    </div>
  </div>
  </div>
</div>
