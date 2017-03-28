

<div class="row compteur">
  <div class="col-md-12 page-phone center-text ">
    <h4 class="modal-title center-text red-font">Entrer votre téléphone</h4>

    <h5 class="center-text">Votre numéro de téléphone protège votre compte, vous relie à vos amis et simplifie votre connexion. </h5>
    </br>
    <span class="code_res green-font"></span>
    <div class="input-group center">
      <input type="input" id="user_phone" class="center" name="phone" value="" placeholder="Votre numero">
      <input onclick="checkPhoneSyntax();" id="phone_next"type="button" class="red" name="name" value="Suivant">
      <input type="input" style="display:none;" id="code_phone" name="code" value="" placeholder="Code reçu">
      <input style="display:none;" onclick="compareCode();" id="code_next"type="button" class="red" name="name" value="Suivant"></br>
        <span class="phone_res red-font"></span>
      </br></br></br>

    </div>



    <h7 class="center-text">Nous allons envoyer un code de verification à ce numero. Nous n'afficherons jamais votre numéro de téléphone aux autres utilisateurs.</h7>


  </div>


</div>
