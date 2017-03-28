<div class="center-text row recommandez-main">
  <div class="col-md-12">
    <h2 class="white-font Title big">RECOMMANDEZ</h2>
  </div>
  <div class="row">
    <p class="white-font recommandez-desc">
      Plus les utilisateurs se recommanderont de bons professionnels entre eux,</br> mieux cela sera pour l'ensemble de la communauté
    </p>
  </div>
</div>
</br>

<div class="center-text  invit Grey row block-content center col-md-10 col-md-offset-1">
    <h4 class="darkgrey invitez-desc">Invitez de nouveaux professionnels</h4>
  <div class="row">
    <div class="col-md-12 ">
      </br>
    <p class="darkgrey rec-desc center-text">
      Sur ProLinked, les professionnels n'ont qu'une seule façon de s'inscrire au site: être recommandé.
      L'entraide et le partage sont les valeurs principales de notre communauté.
      Il est donc important d'aider les professionnels qui le méritent en les recommandant.
      Vous connaissez un bon professionnel et vous aimeriez qu'il rejoigne ProLinked ?    </p>
    </br>
    </div>

    <div class="row">

      <div class="col-md-6  fields-right ">
        <form action="php/send_mail_invit.php" method="post">
          <input id="input_send_invit" autocomplete="off" class="full-width " type="text" name="user_mail" placeholder="Adresse mail du professionnel">
          <button id="send_next" type="submit" class="waves-effect waves-light btn red 25" onclick="alert('Messages envoyés')">Envoyer par mail</button>



      </div>

        <div class="col-md-4 fields-left">
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
  </div>

  <div class="row">
    <div class="col-md-12">
    </br>

    <a class="btn center btn-social btn-facebook" onclick="sendInvitFb()">
       <span class="fa fa-facebook white-font"></span><span class="white-font">Recommandez avec Facebook</span>
     </a>
     <script language="javascript">
     function send_fb(page)
     {
       window.open(page, "Recommandez vos amis Facebook", "menubar=no, resizable=yes, status=no, scrollbars=yes, menubar=no, width=626, height=436, modal" )
     }
     </script>
    <!-- modal facebook -->
    <div class="modal fade" id="modalFacebook" role="dialog">
      <div class="modal-dialog">

        <!-- modal facebook content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Inviter avec Facebook</h4>
          </div>
          <div class="modal-body">
            <p>Invitez vos amis à nous rejoindre</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!-- end modal fb -->

    <!-- <div class="col-md-2 invite linkedinBlue">
      <a href="#">Invitez avec Linkedin</a>
    </div>
    <div class="col-md-2 invite red">
      <a href="#">Invitez avec Gmail</a>
    </div> -->

<!--
    <div class="col-md-2 invite yahoo">
      <a href="#">Invitez avec Yahoo</a>
    </div>
  -->
  </div>
</div>
</div>
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
send_fb('http://www.facebook.com/dialog/send?app_id=120539481683874&link=http://www.prolinked.fr/invitation.php?from='+ getSession() +'&redirect_uri=http://www.prolinked.fr/accueil.php?page=recommandez');
}

</script>
