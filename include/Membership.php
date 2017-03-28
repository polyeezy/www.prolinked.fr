<?php

include_once('Query.php');

function getUserFromTerm($term)
{
  $res = QueryToTab("SELECT user_firstname, user_lastname, user_id, user_profile_picture FROM users WHERE user_firstname LIKE '%$term%'");
  return ($res);
}

function get_id_from_email($email)
{
  return (Query("SELECT user_id FROM users WHERE user_email = '$email'"));
}


function getUserById($id)
{
  $res = QueryToTab("SELECT * FROM " . USER_TABLE . " WHERE " . DB_USER_ID . " = $id");
  if (isset($res[0]))
  {
    return ($res[0]);
  }
  return (NULL);
}

function getUserByFID($fid)
{
  $res = Query("SELECT user_id FROM " . USER_TABLE . " WHERE user_fb_id = $fid");
  return ($res);
}

function xempty($data, $msg)
{
  if (!empty($data))
    return ($data);
  return ($msg);
}

function printData($user, $to_print, $msg = "")
{
  return (xempty($user[$to_print], $msg));
}

function userIsPro($user)
{
  $user_id = $user['user_id'];
  if (Query("SELECT count(id_recommandation) FROM recommandations WHERE id_sender = '$user_id' AND state = '0'") > 0)
    return (true);
  return (false);
}

function Update($key, $value, $id, $location = NULL)
{
  QueryExec("UPDATE users SET $key = '$value' WHERE user_id = $id");
  if ($location)
    {
      header('location: ' . $location);
    }
}

function UpdatePro($key, $value, $id, $location = NULL)
{
  QueryExec("UPDATE users_pro SET $key = '$value' WHERE user_pro_id = $id");
  if ($location)
    {
      header('location: ' . $location);
    }
}

function printAdress($user)
{
  if (!empty($user['user_adress']) && !empty($user['user_city']) || !empty($user['user_cp']))

  //  echo "<span class='red-font'> Votre adresse est incomplete.</span>";
  //else
    echo $user['user_adress'], ", ", $user['user_cp'], ", ", $user['user_city'];
}

function printMultiData($user, $to_print)
{
  foreach ($to_print as $to){
    printData($user, $to);
    echo ", ";
  }
}

function user_adress_exists($mail)
{
  if ($res = Query("SELECT count(user_email) FROM users WHERE user_email = '$mail'") > 0)
    return (true);
  return (false);
}

function getInvitSmsCount($phone, $id)
{
  return (Query("SELECT count(invit_id) FROM invitations WHERE invit_phone = '$phone'"));
}

function createInvitation($mail, $id)
{
  QueryExec("INSERT INTO invitations (invit_email, invit_from_id) VALUES ('$mail', '$id')");
}

function createInvitationPhone($phone, $id)
{
  QueryExec("INSERT INTO invitations (invit_phone, invit_from_id) VALUES ('$phone', '$id')");
}


function getInvits($id)
{
  $user = getUserById($id);
  $mail = $user['user_email'];


  return (QueryToTab("SELECT * FROM invitations WHERE invit_email = '$mail'"));
}

function getInvitsPhone($id)
{
  $user = getUserById($id);
  $phone = $user['user_phone'];


  return (QueryToTab("SELECT * FROM invitations WHERE invit_phone = '$phone'"));
}


function getInvitCount($id)
{

  $user = getUserById($id);
  $mail = $user['user_email'];
  $phone = $user['user_phone'];

  $res = Query("SELECT count(invit_id) FROM invitations WHERE invit_email = '$mail'");
  if (!empty($phone))
  {
    $res += Query("SELECT count(invit_id) FROM invitations WHERE invit_phone = '$phone'");
  }
  return ($res);
}

function Fb_Register($fb_id, $user_email = "", $firstname = "", $lastname = "", $profil_pic, $profil_cover)
{
  Query("INSERT INTO users (user_fb_id, user_email, user_pass, user_firstname, user_lastname, user_img_1, user_img_2, user_img_3, user_profile_picture, user_profil_cover)
    VALUES
  ('$fb_id', '$user_email', '', '$firstname', '$lastname', 'img/ProfilePlaceholderSuit.png', 'img/ProfilePlaceholderSuit.png', 'img/ProfilePlaceholderSuit.png', '$profil_pic', '$profil_cover')");
  return (getUserByFID($fb_id));
}

 function Register($adress, $pass, $firstname , $lastname)
 {
   $hashed = md5($pass);
   Query("INSERT INTO users (user_email, user_pass, user_firstname, user_lastname, user_img_1, user_img_2, user_img_3, user_profile_picture, user_profil_cover) VALUES ('$adress', '$hashed', '$firstname', '$lastname', 'img/ProfilePlaceholderSuit.png', 'img/ProfilePlaceholderSuit.png', 'img/ProfilePlaceholderSuit.png', 'img/ProfilePlaceholderSuit.png', 'img/ProfilePlaceholderSuit.png')");
   return (Query("SELECT user_id FROM users WHERE user_email = '$adress'"));
 }

function Login($adress, $pass)
{
  $hashed = md5($pass);

  if (user_adress_exists($adress))
    {
      if ($res = Query("SELECT count(user_email) FROM users WHERE user_email = '$adress' AND user_pass = '$hashed'") > 0)
        return (Query("SELECT user_id FROM users WHERE user_email = '$adress' AND user_pass = '$hashed' "));
      else
        return ("WRONGMDP");
    }
    return ("WRONGUSER");

}




function adress_is_member($adress)
{
  if ($res = Query("SELECT count(user_id) FROM users WHERE user_email = '$adress'") == 0)
    return (false);
  return (true);
}

function create_token_ask_recommandation($id, $mail)
{
  $token = bin2hex(random_bytes(12));
  QueryExec("INSERT INTO ask_recomendation (id_user, mail, token) VALUES ('$id', '$mail', '$token')");
  return (QueryToTab("SELECT * FROM ask_recomendation WHERE id_user = '$id' AND mail ='$mail'"));
}

function validToken($tokenId)
{
  QueryExec("UPDATE ask_recomendation SET valid = true WHERE id = $tokenId");
}

function check_recommandation($user1, $user2)
{
  $res = Query("SELECT count(id_recommandation) FROM recommandations WHERE id_sender = '$user1' AND id_receiver = '$user2'");
  if ($res === 0)
    return (NULL);
  else {
    return (Query("SELECT state FROM recommandations WHERE id_sender = '$user1' AND id_receiver = '$user2'"));
  }
}

function changeRecommandationState($recId, $state)
{
  QueryExec("UPDATE recommandations SET state = '$state' WHERE id_recommandation = $recId");
}

function getRecSendCount($user_id)
{
  return (Query("SELECT count(id_recommandation) FROM recommandations WHERE id_receiver = '$user_id' AND state = '0'"));

}

function getRecReceivedCount($user_id)
{
  return (Query("SELECT count(id_recommandation) FROM recommandations WHERE id_sender = '$user_id' AND state = '0'"));

}

function getAwaitingRecCount($user_id)
{
  return (Query("SELECT count(id_recommandation) FROM recommandations WHERE id_receiver = '$user_id' AND state = -1"));
}

function getPhotosClient($user_id)
{
  return (QueryToTab("SELECT user_img_1, user_img_2, user_img_3 FROM users WHERE user_id = '$user_id'"));

}

function getPhotosPro($user_id)
{
  $user_id = getProId($user_id);
  return (QueryToTab("SELECT user_pro_img_1, user_pro_img_2, user_pro_img_3 FROM users_pro WHERE user_pro_id = '$user_id'"));

}

function getRecs($user_id)
{
  return (QueryToTab("SELECT * FROM recommandations WHERE id_receiver = '$user_id' "));
}

function getRecsPro($user_id)
{
  return (QueryToTab("SELECT * FROM recommandations WHERE id_sender = '$user_id' AND state = '0'"));
}

function getAwaitingRec($user_id)
{
  return (QueryToTab("SELECT * FROM recommandations WHERE id_receiver = '$user_id' AND state = '-1'"));
}

function create_recommandation($user1, $user2, $state = -1)
{
  QueryExec("INSERT INTO recommandations (id_sender, id_receiver, state) VALUES ('$user1', '$user2', $state)");
}

function getTokenInfos($token)
{
  return (QueryToTab("SELECT * FROM ask_recomandation WHERE token = '$token'"));
}

function register_adress_exist($mail)
{
  if ($res = Query("SELECT user_id FROM users WHERE user_email = '$mail'") == 0)
    return (false);
  return (true);
}

function set_pro($id)
{
  QueryExec("UPDATE users SET user_is_pro = '1' WHERE user_id = '$id'");
}


function check_pro($id)
{
  if (!userIsPro(getUserById($id)))
    {
      $nb_rec = Query("SELECT count(id_user1) FROM recommandations WHERE id_user1 = '$id'");
      $nb_rec += Query("SELECT count(id_user2) FROM recommandations WHERE id_user2 = '$id'");
      if ($nb_rec > 0)
      {
        set_pro($id);
      }
    }
}

function setProfession($prof, $id)
{
  QueryExec("UPDATE users SET user_profession = '$prof' WHERE user_id = '$id'");
}

function createProUser($user_id, $prof, $cover_photo, $profile_photo)
{
  $user = getUserById($user_id);



  Query("INSERT INTO users_pro (user_pro_linked_id, user_pro_profession, user_pro_profile_picture, user_pro_profil_cover) VALUES ('$user_id', '$prof','$cover_photo', '$profile_photo')");

}

function getProId($user_id)
{
  $pro = getProUser($user_id);
  return ($pro['user_pro_id']);
}

function getProUser($user_id)
{
  $user = getUserById($user_id);


    $res = QueryToTab("SELECT * FROM users_pro WHERE user_pro_linked_id = '$user_id'");
    return ($res[0]);

}

function deleteAccount($id)
{
  $user = getUserById($id);
  $mail = $user['user_email'];

  QueryExec("DELETE FROM users WHERE user_id = '$id'");
  QueryExec("DELETE FROM recommandations WHERE id_sender = '$id'");
  QueryExec("DELETE FROM invitations WHERE invit_email = '$mail'");
  QueryExec("DELETE FROM phones WHERE phone_user_id = '$id'");
}

function compareCode($id, $code)
{
  $code_base = Query("SELECT phone_code FROM phones WHERE phone_user_id = '$id'");
  return (strcmp($code, $code_base));
}

function updatePhoneState($id)
{
  QueryExec("UPDATE phones SET phone_state = '1' WHERE phone_user_id = '$id'");
}

function getPhoneState($id)
{
  return (Query("SELECT phone_state FROM phones WHERE phone_user_id = '$id'"));
}

function createPhoneCode($id, $phone, $code)
{
  Query("INSERT INTO phones (phone_number, phone_state, phone_code, phone_user_id) VALUES ('$phone','-1', '$code', '$id')");
}

function checkPhoneInDb($phone)
{
  return (Query("SELECT count(phone_number) FROM phones WHERE phone_number = '$phone'"));

}

function getUserPhone($id)
{
  return (Query("SELECT user_phone FROM users WHERE user_id = '$id'"));
}

function getIdFromFb($id)
{
  return (Query("SELECT user_id FROM users WHERE user_fb_id = '$id'"));
}

 ?>
