
<style media="screen">
  @import URL("https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css");
</style>


<div class="modal" id="myModal"tabindex="-1" role="dialog">
  <div class="modal-dialo">
    <div class="modal-conten">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Professionnel recommandés</h4>
      </div>
      <div class="modal-body" >

        <ul class="list-group" id="rec-content">
        </ul>

      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="center-text row cover-photo-content color-default border">
  <div class="col-md-12">

    <?php

    $cover = $user['user_profil_cover'];
    if (!filter_var($cover, FILTER_VALIDATE_URL))
    {
      $cover = 'http://www.prolinked.fr/' . $cover;
    }

    $pic = $user['user_profile_picture'];
    if (!filter_var($pic, FILTER_VALIDATE_URL))
    {
      $pic = 'http://www.prolinked.fr/' . $pic;
    }


     ?>


    <?php echo '<img class="cover-photo" src="', $cover, '">';?>
  </div>
</div>

<div class="row profil-content">
  <div class="row col-md-12 ">
      <div class="profil-photo center" onclick="uploadPhoto();" data-toggle="modal" data-target="#myModal1" title="Modifier la photo de profil" style="background: no-repeat center url(<?=$pic?>); cursor:pointer">
  </div>
</div>

<div class="col-md-12">
  <h3 class="name center-text"><?php echo $user['user_firstname'], ' ', $user['user_lastname']; ?></h3>
</div>

    <div class="col-md-12 ">
      <span class="profil-desc  infos-perso"><?php echo printData($user, "user_adress", "") ?></span></br>
      <span class="profil-desc   infos-perso"><?php echo printData($user, "user_bio", ""); ?></span>
    </div>
    <div class="col-md-12 text-left">
      <span class="profil-desc inline"><?php if (!printData($user, "user_bio")) ; ?></span>
    </br></br>
    </div>

    <div class="col-md-6 center-text">
      <a class="waves-effect tored waves-light info-btnx2" href="accueil.php?page=modifier-profil">Modifier le profil</a>
    </div>
  </br></br>
    <div class="row">
      <div class="col-md-8  col-md-offset-2 center-text">
        <div class="col-md-4">
          <a id="modalRec" onclick="getRecs();" class="black-font fakelink">  <span class="nb_recs"></span> </div></a>
              <div class="col-md-4">
            <b>0</b> commentaire   </div>
              <div class="col-md-4">
            <b>0</b> relation   </div>
</div>
    </div>
      </div>
    </div>
    <div class="row">

    <div class="col-md-8  col-md-offset-2 center center-text">
      <div class="col-md-4" onclick="loadPhotos()"><a  class="waves-effect waves-light btn white-font grey full-width">Photos</a></div>
      <div class="col-md-4" onclick="loadParams()"><a class="waves-effect waves-light btn grey white-font full-width">Parametres</a></div>
      <div onclick="loadNotifications()" class="col-md-4"><a class="waves-effect white-font waves-light btn grey full-width">Notifications <span class="nb_notifs"></span></a></div>

    </div>
  </div>

  <div class="col-md-6  col-md-offset-3 info-content center" >
    <ul class="list-group" id="info-content">



    </ul>

    <div class="row" id="photo-content">
    </div>
  </div>

<script type="text/javascript">

$("#modalRec").click(function() {
  $('#myModal').modal();
});

getNotificationsCount();
getRecCount();

$('.navbar').addClass('light-grey-background');


</script>
