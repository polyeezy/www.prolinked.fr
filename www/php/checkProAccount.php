<?php

session_start();

include(dirname(dirname(__DIR__)) . "/include/Membership.php");

if (!isset($_SESSION['id']))
  return;

$user = getUserById($_SESSION['id']);

if (userIsPro($user))
{
  $pro = getProUser($_SESSION['id']);

  if ($pro == NULL)
  {
    createProUser($_SESSION['id'], $user['user_profession'], $user['user_profile_picture'], $user['user_profil_cover']);
    Update("user_pro_id", getProId($_SESSION['id']), $_SESSION['id']);
    $_SESSION['type'] = 'PRO';
    $_SESSION['id_pro'] = getProId($_SESSION['id']);

  }

  if (empty($pro['user_pro_name']))
    {
      $_SESSION['type'] = 'PRO';
      $_SESSION['id_pro'] = getProId($_SESSION['id']);
      echo "NEED_NAME";
        return;
    }


      if (empty($pro['user_pro_adress']))
        {
          echo "NEED_ADDR";
            return;
        }


    if ($pro['user_pro_exp'] == "Experience")
      {
        echo "NEED_EXP";
          return;
      }

      if ($pro['user_pro_statut'] == "Selectionnez votre statut")
        {
          echo "NEED_STATUT";
            return;
        }




    if ($pro['user_pro_linked_id'] !== $_SESSION['id'])
    {
      createProUser($_SESSION['id'], $user['user_profession'], $user['user_profile_picture'], $user['user_profil_cover']);
      Update("user_pro_id", getProId($_SESSION['id']), $_SESSION['id']);
      $_SESSION['id_pro'] = getProId($_SESSION['id']);

      echo "NEED_INIT";

    }

  }

else {
echo "NOT_PRO";
}

 ?>
