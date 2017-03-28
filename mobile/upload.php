<?php
session_start();
include(dirname(__DIR__) . "/include/Membership.php");
$id = $_SESSION['id'];
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
    echo "0";
  } else {
    $target = "img/uploaded/";
    $name = $id."-cover." . $extension;
    move_uploaded_file($_FILES["file"]["tmp_name"], $target.$name );
    $new_cover = $target.$name;
    Update("user_profil_cover", $new_cover, $_SESSION['id']);

    header('Location: accueil.php?page=profil');
    }
} else {
  echo "0";
  header('Location: accueil.php?page=profil');
}
