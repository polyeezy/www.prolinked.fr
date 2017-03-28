

<style media="screen">
</style>

<div class="center-text row b">
  <div class="col-md-12 padding">
    <h3 class=" Title grey-font">Quelle est votre profession ?</h3>
  </div>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">


    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <form id="prof_form" class="" action="php/set-profession.php" method="post">
          <input type="text" autofocus class="input" id="prof" autocomplete="on" name="user_profession" value=""  placeholder="Profession">
          <?php echo "<input hidden type='text' name='user_id' value=", $_SESSION['id'], ">";?>

        </form>
        <span class=""></br>Votre profession n'est pas référencée ? <a href="mailto:hello@prolinked.fr"> Contactez-nous</a></span>

      </div>
  </div>
  <div class="row">
    <div class="col-md-4 left-align col-md-offset-3">
      <span class="nbr">1.</br></span>
      <p class="padding">
        Faites vous recommander par un membre de la communauté pour pouvoir être référencé sur ProLinked

      </p>
    </div>
    <div class="col-md-4 left-align">
      <span class="nbr">2.</br></span>
        <p class="padding">
          Completez votre profil. Décrivez à vos clients ce qui vous rend meilleur que les autres.    </div>

        </p>
<div class="col-md-4 left-align">
  <span class="nbr">3.</br></span>
  <p class="padding">
    Vous êtes visible aux yeux de tous les utilisateurs. Augmentez votre activité et devenez le professionnel le plus recommandé autour de vous !    </div>

  </p>
</div>


  </div>

</div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript">


var availableTags = [];

$(document).ready(function() {

  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});


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
