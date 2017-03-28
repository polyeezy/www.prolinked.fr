<div class="row compteur">
  <div class="col-md-12 bg-rec center-text ">
    <span class="white-font 1000users">RECOMMANDEZ
    <div class="col-xs-12">
        <h5 class="center-text ">Plus les utilisateurs se recommanderont de bons professionnels entre eux, mieux cela sera pour l'ensemble de la communauté
</h5>
    </div>
  </div>
</div>

</br>

<div class="center-text  d Grey row block-content center col-md-10 col-md-offset-1">

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      </br>
    <p class="darkgrey rec-desc center-text">
      Sur ProLinked, les professionnels n'ont qu'une seule façon de s'inscrire au site: être recommandé.
      L'entraide et le partage sont les valeurs principales de notre communauté.
      Il est donc important d'aider les professionnels qui le méritent en les recommandant.
      Vous connaissez un bon professionnel et vous aimeriez qu'il rejoigne ProLinked ?    </p>
    </br>
    </div>

    <div class="row">
      <div class="col-md-12">
        <form action="php/send_mail_invit.php" method="post">
          <input id="input_send_invit" autocomplete="off" class="full-width " type="text" name="user_mail" placeholder="Adresse mail du professionnel">
          <button id="send_next" type="submit" class="waves-effect waves-light btn red 25" onclick="alert('Messages envoyés')">Envoyer par mail</button>

      </div>
      - ou -

        <div class="col-md-4 fields-left">
</br>
          <input id="input_sms_rec" autocomplete="off" class="" type="text" name="user_phone" placeholder="Par téléphone">
          <button id="send_next" type="button" onclick="sendSMSrec();" class="waves-effect waves-light btn red" onclick="alert('Messages envoyés')">Envoyer par SMS </button>
        </div>
      </div>
      <div class="row">
      </br>
        <div class="col-md-12">
          <input type="text" class="full-width" autofocus id="prof" autocomplete="on" name="user_profession"   placeholder="Profession">
        </form>

      </div>




  </div>


<script type="text/javascript">
function send_fb(page)
{
  window.open(page, "Recommandez vos amis Facebook", "menubar=no, resizable=yes, status=no, scrollbars=yes, menubar=no, width=626, height=436, modal" )
}
</script>
  <!--
      <div class="col-xs-6 col-xs-offset-3 invite faceblue">
   <a href="#">Invitez avec facebook</a>
</br>
    </div>
  </br>
</br>
-->
</div>
</br>

</div>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


<script type="text/javascript">



$(document).ready(function() {

  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

var availableTags = [];

$.get('pages/professions.txt', function(data) {
  var i;
  var pos = 0;

  data = data.split(/[\n]+/); //split text using regex (separators: ';' and '\n')

  for(i = 0; i < data.length; i = i + 1)
     availableTags[pos++] = data[i];
}, 'text');


$( "ui" ).click(function() {
  alert( "Handler for .click() called." );
});

  $( "#prof" ).autocomplete({
    source: availableTags,
               change: function (event, ui) {
                   if(!ui.item){
                     $('#prof').val("");
                     //$('#send_next').addClass("hidden");
                   }
                   else {
                     var selectedObj = ui.item.label;
                     $('#prof').text(selectedObj);
                     $('#prof_form').submit();

                     //$('#send_next').removeClass("hidden");
                   }
               },
               select: function (event, ui) {
                 var selectedObj = ui.item.label;

                 $('#prof').val(selectedObj);
                 $('#prof_form').submit();
                              }

  });


</script>

<script type="text/javascript">

function sendInvitFb()
{
send_fb('http://www.facebook.com/dialog/send?app_id=120539481683874&link=http://m.prolinked.fr/invitation.php?from='+ getSession() +'&redirect_uri=http://m.prolinked.fr/accueil.php&display=touch');
}

</script>
