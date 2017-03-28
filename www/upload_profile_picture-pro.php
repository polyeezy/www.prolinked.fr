<?php
session_start();
include(dirname(__DIR__) . "/include/Membership.php");

$dest = "accueil.php?page=profil&src=desktop";

if (isset($_POST['id']))
{
  $id = $_POST['id'];
  $dest = "http://m.prolinked.fr/accueil.php?page=profil&refresh=ok";
}
else {
  $id = $_SESSION['id'];
}
$id = getProId($id);
// an array of allowed extensions
$allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

//check if the file type is image and then extension
// store the files to upload folder
//echo '0' if there is an error
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {



    header('Location: ' . $dest);

  } else {
    $target = "img/uploaded/";
    $name = $id."-pic." . $extension;
    move_uploaded_file($_FILES["file"]["tmp_name"], $target.$name );
    $new_picture = $target.$name;
    UpdatePro("user_pro_profile_picture", $new_picture, $id);

    header('Location: ' . $dest);
    }
} else
{
    header('Location: ' . $dest);
}
