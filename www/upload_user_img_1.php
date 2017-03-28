<?php
include(dirname(__DIR__) . "/include/Membership.php");
session_start();
$dest = "accueil.php?page=profil";


if (isset($_GET['session']))
{
  $id = $_GET['session'];
  $dest = "http://m.prolinked.fr/accueil.php?page=profil&refresh=ok";
}
else {
  $id = $_SESSION['id'];
}
// an array of allowed extensions
$allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");
$temp = explode(".", $_FILES["user_img_1"]["name"]);
$extension = end($temp);

//check if the file type is image and then extension
// store the files to upload folder
//echo '0' if there is an error
if ((($_FILES["user_img_1"]["type"] == "image/gif")
|| ($_FILES["user_img_1"]["type"] == "image/jpeg")
|| ($_FILES["user_img_1"]["type"] == "image/jpg")
|| ($_FILES["user_img_1"]["type"] == "image/pjpeg")
|| ($_FILES["user_img_1"]["type"] == "image/x-png")
|| ($_FILES["user_img_1"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["user_img_1"]["error"] > 0) {
    header('Location: ' . $dest);
  } else {
    $target = "img/uploaded/";
    $name = $id."-img-1." . $extension;
    move_uploaded_file($_FILES["user_img_1"]["tmp_name"], $target.$name );
    $img = $target.$name;
    Update("user_img_1", $img, $id);
    header('Location: ' . $dest);

    }
} else {
  header('Location: ' . $dest);
}
