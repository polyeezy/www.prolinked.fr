
<style media="screen">
  @import URL("https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css");
</style>
<!--start modal -->

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

<!-- end modal profile_picture -->


<?php

$cover = $user['user_profil_cover'];

 ?>

<div class="center-text row cover-photo-content " style="background: no-repeat center/100% url(<?=$user['user_profil_cover']?>)">
  <div class="col-md-12">
  </div>
</div>

<div class="row profil-content">
  <div class="row col-md-12 ">
    <div class="profil-photo center " style="background: no-repeat center url(<?=$user['user_profile_picture']?>)">

    </div>
  </div>
</div>



<div class="col-xs-6 general-infos">
  <h2 class="NAME"><?php echo $user['user_firstname'], ' ', $user['user_lastname']; ?></h2>
  </div>

<div class="col-xs-6 general-infos">
  <h4 class="center-text"><a href="accueil.php?page=modifier-profil" class="waves-effect btn red-border modifier-btn">Modifier le profil</a></h4>
</div>

    <div class="col-md-12 ">
      <?php
          $bio = preg_split("><br/>", printData($user, "user_bio", ""));

          foreach ($bio as $bio_elem ) {
          $bio_elem =  str_replace(">", "", $bio_elem);
          echo " <span class='profil-desc inline infos-perso'>$bio_elem </span>";
          }
       ?>

      <span class="profil-desc inline infos-perso"><?php echo printData($user, "user_adress", ""); ?></br></span>
    </div>




    <div class="col-md-12 text-left">
      <span class="profil-desc inline"><?php if (!printData($user, "user_bio")) ; ?></br></span>
    </div>
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
    <div class="row">
    <div class="col-md-8  col-md-offset-2 center center-text">
      <div class="col-md-4" onclick="loadPhotos()"><a  class="waves-effect waves-light btn white-font grey full-width">Photos</a></div>
      <div class="col-md-4" onclick="loadParams()"><a class="waves-effect waves-light btn grey white-font full-width">Parametres</a></div>
      <div onclick="loadNotifications()" class="col-md-4"><a class="waves-effect white-font waves-light btn grey full-width">Notifications <span class="nb_notifs"></span></a></div>
    </div>
  </div>

  <div class="row">

  <div class="col-md-6  col-md-offset-3 info-content center" >

    <ul class="list-group" id="info-content">

    </ul>





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
