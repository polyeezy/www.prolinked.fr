<div class="inscription">
  <div class="col-md-6 col-md-offset-3 center-text ">
    <h2 class="white-font"> Inscription</h2>
    <div class="col-md-8 col-md-offset-2 ">
        <h4 class="white-font">Les meilleurs professionnels sont sur ProLinked, puisque vous les avez recommandés.</h4>
    </div>

    <div class="row">

      <div class="col-md-12">

        <button type="button" class="btn btn-default blue btn-primary bouton " aria-label="Left Align"><a href="php/fblogin.php" class="white-font">Inscription via Facebook</a></button>
      </div>

    </div>
    </br>

    <div class="row">
      <div class="col-md-12">
        <form onsubmit="Register(); return false;" method="post">
          <input type="text" name="user_firstname" id="user_firstname" class="form-control center bouton" placeholder="Prénom" >
          <input type="text" name="user_lastname" id="user_lastname" class="form-control center bouton" placeholder="Nom" >
          <input type="text" name="user_mail" id="user_mail" class="form-control center bouton" placeholder="Adresse e-mail" >
          <input type="password" name="user_password" id="user_password" class="form-control center bouton" placeholder="Mot de passe" >
          <input type="password" name="user_password2" id="user_password2" class="form-control center bouton" placeholder="Confirmation mot de passe" >
          <span class="red" id="register_response"></span>

    </div>
    <div class="row">
      <div class="col-md-12">
        <p class="white-font">
          En cliquant sur <b>S'inscrire</b>, vous acceptez les <a class="blue-font" href="section.php?content=CGU-politique">Conditions Générales d'utilisation</a>  et la <a href="section.php?content=CGU-politique"> Politique de Confidentialité </a>
        </p>

        <button type="submit" onclick="Register();" name="register"class="btn  red full-width" aria-label="Left Align">S'inscrire</button>
      </form>

      </div>
    </div>

  </div>



</div>
</div>
