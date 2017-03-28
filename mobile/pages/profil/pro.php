<?php

$userPro = getProUser($_SESSION['id']);


 ?>


<style media="screen">
  @import URL("https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css");
</style>
<!--start modal -->

<div class="modal" id="myModal"tabindex="-1" role="dialog">
  <div class="modal-dialo">
    <div class="modal-conten">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Personnes recommandées</h4>
      </div>
      <div class="modal-body" >

        <ul class="list-group" id="rec-content">
        </ul>

      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php

$cover = $userPro['user_pro_profil_cover'];
if (!filter_var($cover, FILTER_VALIDATE_URL))
{
  $cover = 'http://dev.prolinked.fr/' . $cover;
}

$pic = $userPro['user_pro_profile_picture'];

if (!filter_var($pic, FILTER_VALIDATE_URL))
{
  $pic = 'http://dev.prolinked.fr/' . $pic;
}

 ?>

<!-- end modal profile_picture -->
<div class="center-text row cover-photo-content " style="background: no-repeat center/100% url(<?=$cover?>)">
  <div class="col-md-12">
  </div>
</div>

<div class="row profil-content">
  <div class="row col-md-12 ">
    <div class="profil-photo center " style="background: no-repeat center url(<?=$pic?>)">

    </div>
  </div>
</div>

<div class="col-xs-12 general-infos">
  <h2 class="NAME margin-50"><?php echo $user['user_firstname'], ' ', $user['user_lastname']; ?></h2>
  <h3 class="NAME"><?php echo $userPro['user_pro_name'];?></h3>
  </div>

<div class="col-xs-12 general-infos">
  <h4 class="center-text"><a href="accueil.php?page=modifier-profil-pro" class="waves-effect btn red-border modifier-btn red">Modifier le profil</a></h4>
</div>
</br></br>

    <div class="col-md-12 row">

      <?php
          $bio = preg_split("><br/>", printData($userPro, "user_bio", ""));

          foreach ($bio as $bio_elem ) {
          $bio_elem =  str_replace(">", "", $bio_elem);
          echo " <span  class='profil-desc inline infos-perso'> $bio_elem </span></br>";
          }
       ?>
      <span class="profil-desc inline infos-perso"><b>Profession&nbsp;&nbsp;:&nbsp;&nbsp; </b><?php echo printData($userPro, "user_pro_profession", ""); ?></br></span>
      <span class="profil-desc inline infos-perso"><b>Experience&nbsp;&nbsp;:&nbsp;&nbsp; </b><?php echo printData($userPro, "user_pro_exp", ""); ?></br></span>
      <span class="profil-desc inline infos-perso"><b>N° Siret  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :&nbsp;&nbsp;</b><?php echo printData($userPro, "user_pro_siret", ""); ?></br></span>
      <span class="profil-desc inline infos-perso"><b>Adresse  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :&nbsp;&nbsp;</b><?php echo printData($userPro, "user_pro_adress", ""); ?></br></span>
      <span class="profil-desc inline infos-perso"><b>Statut &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;&nbsp;</b><?php echo printData($userPro, "user_pro_statut", ""); ?></br></span>
      <span class="profil-desc inline infos-perso"><b>Description&nbsp;&nbsp;:&nbsp;&nbsp;</b><?php echo printData($userPro, "user_pro_bio", ""); ?></br></span>

      </div>




    <div class="col-md-12 text-left">
      <span class="profil-desc inline"><?php if (!printData($user, "user_bio")) ; ?></br></span>
    </div>
    <div class="row">
      <div class="col-md-8  col-md-offset-2 center-text">
        <div class="col-md-4">
    <a id="modalRec" onclick="getRecsPro();" class="black-font fakelink">  <span class="nb_recs"></span> </div></a>
        <div class="col-md-4">
    <b>0</b> commentaires   </div>
        <div class="col-md-4">
      <b>0</b> relations   </div>
      </div>
    </div>
    <div class="row">
    <div class="col-md-8  col-md-offset-2 center center-text">
      <div class="col-md-4" onclick="loadPhotosPro()"><a  class="waves-effect white-font waves-light btn grey full-width">Photos</a></div>
      <div class="col-md-4"><a class="waves-effect waves-light btn grey white-font full-width">Parametres</a></div>
      <div onclick="loadNotifications()" class="col-md-4"><a class="waves-effect white-font waves-light btn grey full-width">Notifications <span class="nb_notifs"></span></a></div>
    </div>
  </div>

  <div class="row">

  <div class="col-md-6  col-md-offset-3 info-content center" >
    <ul class="list-group" id="info-content">

    </ul>

                <div class="row" id="photo-content">
                </div>

  </div>
</div>

<script type="text/javascript">

$("#modalRec").click(function() {
  $('#myModal').modal();
});

getNotificationsCount();
getRecCountPro();
$('.navbar').addClass('light-grey-background');

</script>
