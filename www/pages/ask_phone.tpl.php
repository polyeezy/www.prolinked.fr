<div id="phoneTrigger" class="modal phoneModal">
  <div class="modal-content">
    <h4 class="red-font modal-header center-text">Entrer votre téléphone</h4>
    <div class="row">


      <div class="col-md-8 center-text col-md-offset-2">
        <h5>Votre numéro de téléphone protège votre compte, vous relie à vos amis et simplifie votre connexion. </h5>
      </br>
      <span class="code_res green-font"></span></br></br>

        <input type="input" id="user_phone" name="phone" value="" placeholder="Votre numero">
        <input onclick="checkPhoneSyntax();" id="phone_next"type="button" class="red" name="name" value="Suivant">
        <input type="input" style="display:none;" id="code_phone" name="code" value="" placeholder="Code reçu">
        <input style="display:none;" onclick="compareCode();" id="code_next"type="button" class="red" name="name" value="Suivant">
      </br>
        <span class="phone_res red-font"></span>
      </br></br></br>

        <h7>Nous allons envoyer un code de verification à ce numero. Des frais relatifs au SMS pourront s'appliquer. Nous n'afficherons jamais votre numéro de téléphone aux autres utilisateurs.</h7>

      </div>

    </div>
  </div>
</div>
