<style media="screen">
  @import URL("https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css");
</style>
<link rel="stylesheet" href="css/modal-upload.css" >
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="js/upload.js"></script>

<div class="modal" id="phoneTrigger" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title center-text red-font">Entrer votre téléphone</h4>
      </div>
      <div class="modal-body">
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

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



                            <form action="//www.prolinked.fr/upload.php" method="post" id="myFormCover" enctype="multipart/form-data">
                                     <input class="hidden"type="file" name="file" id="uploadCover"><br>
                                     <?php echo '<input hidden class="hidden" name="id"type="text" value="', $_SESSION["id"], '">'; ?>
                            </form>
                            <form action="//www.prolinked.fr/upload_profile_picture.php" method="post" id="myFormPhoto" enctype="multipart/form-data">
                                     <input class="hidden" type="file" name="file" id="uploadPic"><br>
                                     <?php echo '<input hidden name="id"class="hidden" type="text" value="', $_SESSION["id"], '">'; ?>

                            </form>

<div class="center-text row cover-photo-content hover" onclick="uploadCover();" title="Modifier la photo de couverture" style="background: no-repeat center/100% url(http://www.prolinked.fr/<?=$user['user_profil_cover']?>)" title="upload" data-toggle="modal" data-target="#myModal" style="cursor:pointer">
  <div class="topleft1"><a  title="upload" data-toggle="modal" data-target="#myModal" style="cursor:pointer"></a></div>
  <div class="col-md-12">
  </div>
</div>

<div class="row profil-content">
  <div class="row col-md-12 ">
    <div class="profil-photo center" onclick="uploadPhoto();" style="background: no-repeat center url(http://www.prolinked.fr/<?=$user['user_profile_picture']?>); cursor:pointer">

    </div>
  </div>
</div>



<script type="text/javascript">



  document.getElementById("uploadCover").onchange = function() {
      document.getElementById("myFormCover").submit();
  };

  document.getElementById("uploadPic").onchange = function() {
      document.getElementById("myFormPhoto").submit();
  };

  function uploadCover()
  {
  $('#uploadCover').click();
  }

  function uploadPhoto()
  {
    $('#uploadPic').click();
  }


</script>


<?php


 ?>
 <form class="" action="php/update.php" method="post">

    <div class="col-md-6 center-text">
      <div class="col-md-12">
        <div class="col-md-12 general-infos  left-align"><h2 class="NAME"><?php echo $user['user_firstname'], ' ', $user['user_lastname']; ?></h2></div>

        <textarea  class="half-size profil-input" rows="1" maxlength="120" name="user_bio" placeholder="Biographie" ><?php echo str_replace("<br/>", "&#13;&#10;", printData($user, 'user_bio')); ?></textarea></br>
        <?php echo  '<input  class="profil-input full-width" placeholder="Localisation" id="first_name" type="text" name="user_adress" value="', printData($user, "user_adress"), '">', '</br>'; ?>

      </div>




        <?php //echo
      //  '<input placeholder="Votre Bio" name="user_bio" id="first_name" type="text" class="prof-input" value="', printData($user, "user_bio"), '">','</br>'
      //  '<input placeholder="Description2" name="user_desc_1" id="user_desc_1" type="text" class="validate" value="', printData($user, "user_desc_1"), '">','</br>',
        //'<input placeholder="Description2" name="user_desc_2" id="user_desc_2" type="text" class="validate" value="', printData($user, "user_desc_2"), '">','</br>',
      //  '<input placeholder="Description3" name="user_desc_3" id="user_desc_3" type="text" class="validate" value="', printData($user, "user_desc_3"), '">','</br>',
        //'<input placeholder="Adresse" id="first_name" type="text" name="user_adress" class="validate" value="', printData($user, "user_adress"), '">'
        ; ?>


    </div>

    <div class="col-md-6 center-text">
      <h4 class="">
        <input type="submit" class="btn grey "name="update" value="Annuler">
        <input type="submit" class="btn red "name="update" value="Enregistrer">
    </div>




<!--
<div class="row">
  <div class="col-md-4">
    0 Recommendations
  </div>
  <div class="col-md-4">
    0 Contacts en commun
  </div>
  <div class="col-md-4">
    0 Contacts
  </div>
</div>

<div class="row col-md-12">
  <div class="col-md-4">
    <?php echo '<img class="profile_img center thumbnail" src="', $user['user_img_1'], '">';?>
  </div>
  <div class="col-md-4">
    <?php echo '<img class="profile_img center thumbnail" src="', $user['user_img_2'], '">';?>
  </div>
  <div class="col-md-4">
    <?php echo '<img class="profile_img center thumbnail" src="', $user['user_img_3'], '">';?>
  </div>
</div>
<div class="col-md-12 text-left">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2884.2673324204984!2d7.26336741517359!3d43.70499315709857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cddaa8268df1e1%3A0xa12517cf867bd0c!2s60+Avenue+Jean+M%C3%A9decin%2C+06000+Nice!5e0!3m2!1sfr!2sfr!4v1457692533394" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
</div -->

<script type="text/javascript" src="js/autosize.js"></script>
<script type="text/javascript">
autosize($('textarea'));
checkPhone();

</script>

</form>



</div>
</div>
