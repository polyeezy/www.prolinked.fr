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

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title center" id="myModalLabel" style="font-family:'Myriad Pro'" ><i class="fa fa-file-photo-o"></i> Upload une nouvelle photo de couverture</h4>
      </div>
      <div class="modal-body">
            <div class="container-main">
                   <div class="h2" style="font-family:'Myriad Pro';">Importer une photo de couverture</div>
                    <div class="well">
                            <form action="upload-pro.php" method="post" id="myForm" enctype="multipart/form-data">
                                     <input type="file" name="file" id="file"><br>
                                     <input type="submit" name="submit" class="btn" style="background-color:#F44336; color:white; font-family:'Myriad Pro';" value="Importer l'image">
                            </form>
                            <!-- <div class="progress progress-striped active">
                                   <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        <span class="sr-only">0% Complete</span>
                                  </div>
                            </div> -->
                    </div>
                    <!-- <div class="image"></div> -->
            </div>
      <div class="modal-footer" style="background-color: white; border-radius:5px">
        <button type="button" class="btn " data-dismiss="modal" style="background-color:#F44336; color:white; font-family:'Myriad Pro'">Fermer</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
<!--start modal profile_picture -->
<div class="modal" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background:none; overflow: hidden;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title center" id="myModalLabel" style="font-family:'Myriad Pro'" ><i class="fa fa-file-photo-o"></i> Upload une nouvelle photo de profil</h4>
      </div>
      <div class="modal-body">
            <div class="container-main">
                   <div class="h2" style="font-family:'Myriad Pro';">Importer une photo de profil</div>
                    <div class="well">
                            <form action="upload_profile_picture-pro.php" method="post" id="myForm" enctype="multipart/form-data">
                                     <input type="file" name="file" id="file"><br>
                                     <input type="submit" name="submit" class="btn" style="background-color:#F44336; color:white; font-family:'Myriad Pro';" value="Importer l'image">
                            </form>
                            <!-- <div class="progress progress-striped active">
                                   <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        <span class="sr-only">0% Complete</span>
                                  </div>
                            </div> -->
                    </div>
                    <!-- <div class="image"></div> -->
            </div>
      <div class="modal-footer" style="background-color: white; border-radius:5px">
        <button type="button" class="btn" data-dismiss="modal" style="background-color:#F44336; color:white; font-family:'Myriad Pro'">Fermer</button>
      </div>
      </div>
    </div>
  </div>
</div>




<div class="center-text row cover-photo-content hover" title="Modifier la photo de couverture" style="background: no-repeat center/100% url(<?=$user['user_profil_cover']?>)" title="upload" data-toggle="modal" data-target="#myModal" style="cursor:pointer">
  <div class="topleft1"><a  title="upload" data-toggle="modal" data-target="#myModal" style="cursor:pointer"></a></div>
  <div class="col-md-12">
  </div>
</div>


<div class="center-text row cover-photo-content hover" title="Modifier la photo de couverture" style="background: no-repeat center/100% url(<?=$userPro['user_pro_profil_cover']?>)" title="upload" data-toggle="modal" data-target="#myModal" style="cursor:pointer">
  <div class="topleft1"><a  title="upload" data-toggle="modal" data-target="#myModal" style="cursor:pointer"></a></div>
  <div class="col-md-12">
  </div>
</div>

<div class="row profil-content ">
  <div class="row col-md-12 ">
    <div class="profil-photo center hover" data-toggle="modal" data-target="#myModal1" style="cursor:pointer; background: no-repeat center url(<?=$userPro['user_pro_profile_picture']?>)" title="Modifier la photo de profil">

    </div>
  </div>
</div>


 <form class="" action="php/update-pro.php" method="post">

    <div class="col-md-6 center-text">
      <div class="col-md-12">
        <div class="col-md-12 general-infos  left-align"><h2 class="NAME margin-50"><?php echo $user['user_firstname'], ' ', $user['user_lastname']; ?></h2></div>

        <?php echo  '<span class="input_label">Nom d\'Entreprise</span><input placeholder="Votre nom d\'entreprise" id="user_pro_name" type="text" name="user_pro_name" class="profil-input full-width" value="', printData($userPro, 'user_pro_name'), '">', '</br>'; ?>

                <span class="input_label">Experience</span><select class="big_select" name="user_pro_exp">

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



        <?php echo  '<span class="input_label">Adresse</span><input placeholder="Localisation" id="first_name" type="text" name="user_pro_adress" class="profil-input full-width" value="', printData($userPro, "user_pro_adress"), '">', '</br>'; ?>
        <?php echo  '<span class="input_label">N° Siret (facultatif)</span><input placeholder="N° Siret" id="user_pro_siret" type="text" name="user_pro_siret" class="profil-input full-width" value="', printData($userPro, "user_pro_siret"), '">', '</br>'; ?>

        <span class="input_label">Statut</span><select class="big_select" name="user_pro_statut">

          <?php

            $exp = array('Selectionnez votre statut', 'Artisan', 'Association', 'Auto entrepreneur', 'En création', 'Cumul emploi retraite', 'EURL', 'Profession Libérale', 'Préstataire CESU', 'SA', 'Salarié des employeurs particuliers', 'SARL', 'SAS', 'SNC', 'Travailleur non salarié', 'Vendeur à Domicile indépendant', 'Salarié');


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

        <span class="input_label">Description</span><textarea  class="half-size profil-input" rows="1" maxlength="120" name="user_bio" placeholder="Biographie" ><?php echo str_replace("<br/>", "&#13;&#10;", printData($userPro, 'user_pro_bio')); ?></textarea>


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
        <input type="submit" class="btn red "name="update" value="Enregistrer les modifications">
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2 center ">



          <div class="col-md-6 center">

            <input type="submit" class="btn red "name="update" value="Appliquer">
          </div>
      </div>

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
