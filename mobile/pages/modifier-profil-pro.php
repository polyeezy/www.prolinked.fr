<?php

  if (!isset($_SESSION['type']))
  {
    $_SESSION['type'] = 'PRO';
   }

 ?>


<?php $userPro = getProUser($_SESSION['id']);?>

<script src="http://code.jquery.com/jquery-2.1.1-rc2.min.js" ></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="js/upload.js"></script>


                            <form action="//dev.prolinked.fr/upload-pro.php" method="post" id="myFormCover" enctype="multipart/form-data">
                                     <input hidden type="file" class="hidden" name="file" id="uploadCoverPro"><br>
                                     <?php echo '<input hidden name="id" class="hidden" type="text" value="', $_SESSION["id"], '">'; ?>

                            </form>


                            <form action="//dev.prolinked.fr/upload_profile_picture-pro.php" class="hidden" method="post" id="myFormPhoto" enctype="multipart/form-data">
                                     <input hidden type="file" name="file" id="uploadPhotoPro"><br>
                                     <?php echo '<input hidden name="id" class="hidden" type="text" value="', $_SESSION["id"], '">'; ?>

                            </form>





<div class="center-text red row cover-photo-content hover fakelink" onclick="uploadCoverPhoto();"title="Modifier la photo de couverture" style="background: no-repeat center/100% url(http://dev.prolinked.fr/<?=$userPro['user_pro_profil_cover']?>)" title="upload" style="cursor:pointer">
  <div class="topleft1"><a  title="upload" data-toggle="modal" data-target="#myModal" style="cursor:pointer"></a></div>
  <div class="col-md-12">
  </div>
</div>



<div class="row profil-content" onclick="uploadProfilePhoto();" >
  <div class="row col-md-12 ">
    <div class="profil-photo center hover" data-toggle="modal" data-target="#myModal1" style="cursor:pointer; background: no-repeat center url(http://dev.prolinked.fr/<?=$userPro['user_pro_profile_picture']?>)" title="Modifier la photo de profil">

    </div>
  </div>
</div>

<script type="text/javascript">
document.getElementById("uploadCoverPro").onchange = function() {
    document.getElementById("myFormCover").submit();
};

document.getElementById("uploadPhotoPro").onchange = function() {
    document.getElementById("myFormPhoto").submit();
};

function uploadCoverPhoto()
{
$('#uploadCoverPro').click();
}

function uploadProfilePhoto()
{
  $('#uploadPhotoPro').click();
}
</script>

 <form class="" action="php/update-pro.php" method="post">

    <div class="col-md-6 center-text">
      <div class="col-md-12">
        <div class="col-md-12 general-infos  left-align"><h2 class="NAME margin-50"><?php echo $user['user_firstname'], ' ', $user['user_lastname']; ?></h2></div>

        <?php echo  '<span class="input_label">Nom d\'Entreprise</span></br><input class="profil-input" placeholder="Votre nom d\'entreprise" id="user_pro_name" type="text" name="user_pro_name" class="profil-input full-width" value="', printData($userPro, 'user_pro_name'), '">', '</br>'; ?>

                <span class="input_label">Experience</span></br><select class="big_select" name="user_pro_exp">

                  <?php

                    $exp = array('Experience', 'moins de 2ans', '2-5 ans', '5-8 ans', '10 ans et plus');


                    foreach ($exp as $key ) {

                      if ($userPro['user_pro_exp'] == $key)
                      {
                        echo "<option selected value='$key'>$key</option> ";
                      }
                    else {
                      echo "<option  value='$key'>$key</option> ";
                    }
                  }

                   ?>

                </select></br></br>



        <?php echo  '<span class="input_label">Adresse</span></br><input placeholder="Localisation" id="first_name" type="text" name="user_pro_adress" class="profil-input full-width" value="', printData($userPro, "user_pro_adress"), '">', '</br>'; ?>
        <?php echo  '<span class="input_label">N° Siret (facultatif)</span></br><input placeholder="N° Siret" id="user_pro_siret" type="text" name="user_pro_siret" class="profil-input full-width" value="', printData($userPro, "user_pro_siret"), '">', '</br>'; ?>

        <span class="input_label">Statut</span></br><select class="big_select" name="user_pro_statut">

          <?php

            $exp = array('Selectionnez votre statut', 'Artisan', 'Association', 'Auto entrepreneur', 'En création', 'Cumul emploi retraite', 'EURL', 'Profession Libérale', 'Préstataire CESU', 'SA', 'Salarié des employeurs particuliers', 'SARL', 'SAS', 'SNC', 'Travailleur non salarié', 'Vendeur à Domicile indépendant');


            foreach ($exp as $key ) {

              if ($userPro['user_pro_statut'] == $key)
              {
                echo "<option selected value='$key'>$key</option>";
              }
              else
              {
                echo "<option value='$key'>$key</option> ";
              }

            }

           ?>

        </select></br></br>

        <span class="input_label">Description</span></br><textarea  class="half-size profil-input" rows="1" maxlength="120" name="user_bio" placeholder="Biographie" ><?php echo str_replace("<br/>", "&#13;&#10;", printData($userPro, 'user_pro_bio')); ?></textarea>


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
$('.no-bg').addClass('light-grey-background');



</script>

</form>



</div>
</div>
