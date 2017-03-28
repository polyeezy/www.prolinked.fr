<?php
session_start();
include(dirname(__DIR__) . "/include/Membership.php");
$dest = "accueil.php?page=profil";
if (isset($_POST['id']))
{
  $id = $_POST['id'];
  $dest = "http://m.prolinked.fr/accueil.php?page=profil";
}
else if (isset($_COOKIE['session']) && getUserById($_COOKIE['session']) !== NULL)
  {
    $_SESSION['id'] = $_COOKIE['session'];
    $id = $_SESSION['id'];

  }
else {
  $id = $_SESSION['id'];
}
$id = getProId($_SESSION['id']);
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
    $name = $id."-cover." . $extension;
    move_uploaded_file($_FILES["file"]["tmp_name"], $target.$name );
    $new_cover = $target.$name;
    UpdatePro("user_pro_profil_cover", $new_cover, $id);

    header('Location: ' . $dest);
    }
} else {

  header('Location: ' . $dest);
}

header('Location: ' . $dest);
