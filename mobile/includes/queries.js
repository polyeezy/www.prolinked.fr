function Login()
{

  $.ajax(
    {
      url     : 'queries/login.php',
      data    : 'user=' + $("#input_user").val() + '&pass=' + $("#input_password").val(),
      type: 'POST',
      success : function(output)
      {

        switch (output) {
          case "WRONGMDP":
          $('#login_response').text("Le mot de passe est incorrect.\n").append('<br/></br>');
            break;
            case "WRONGUSER":
            $('#login_response').text("Cette adresse ne correspond a aucun utilisateur.\n").append('<br/></br>');
            break;
            default:
            window.location.href = 'accueil.php';
            break;
 }
      }
    })
}

function Register()
{
  $.ajax(
    {
      url     : 'queries/register.php',
      data    : 'user_firstname=' + $("#user_firstname").val() + '&user_lastname=' + $("#user_lastname").val() + '&user_mail=' + $("#user_mail").val() + '&user_password=' + $("#user_password").val() + '&user_password2=' + $("#user_password2").val(),
      type: 'POST',
      success : function(output)
      {

        switch (output) {
          case "ok":
          window.location.href = 'accueil.php?page=modifier-profil';
          break;
        default:
          $('#register_response').text(output).append('<br/></br>');
            break;
 }
      }
    })
}

function cleanDiv(div)
{
  document.getElementById(div).innerHTML = "";
}

function getProNotifs()
{
  $.ajax(
    {
      url     : 'php/getProNotifs.php',
      success : function(output)
      {
        if (output > 0)
        {
          $('.pro_notifs').text(" (1)");
          $('.pro_notifs').val(" (1)");

        }


      }


    })
checkProAccount();
}

function checkProAccount()
{
  $.ajax(
    {
      url     : 'php/checkProAccount.php',
      success : function(output)
      {
        if (output === "NEED_INIT" && window.location.href.indexOf("modifier-profil-pro") === -1)
          {
            alert('Vous pouvez maintenant creer votre profil professionnel');
            window.location.href = "accueil.php?page=modifier-profil-pro";
            return;
          }

          if (output === "NEED_NAME" && window.location.href.indexOf("modifier-profil-pro") === -1)
            {
              alert("Vous devez spécifier votre nom d\'entreprise");
              window.location.href = "accueil.php?page=modifier-profil-pro";
              return;
            }

            if (output === "NEED_EXP" && window.location.href.indexOf("modifier-profil-pro") === -1)
              {
                alert("Vous devez spécifier votre experience");
                window.location.href = "accueil.php?page=modifier-profil-pro";
                return;
              }

              if (output === "NEED_ADDR" && window.location.href.indexOf("modifier-profil-pro") === -1)
                {
                  alert("Vous devez spécifier votre adresse");
                  window.location.href = "accueil.php?page=modifier-profil-pro";
                  return;
                }

                if (output === "NEED_SIRET" && window.location.href.indexOf("modifier-profil-pro") === -1)
                  {
                    alert("Vous devez spécifier votre n° Siret");
                    window.location.href = "accueil.php?page=modifier-profil-pro";
                    return;
                  }

                  if (output === "NEED_STATUT" && window.location.href.indexOf("modifier-profil-pro") === -1)
                    {
                      alert("Vous devez spécifier votre statut");
                      window.location.href = "accueil.php?page=modifier-profil-pro";
                      return;
                    }


      }

    })
}

function getNotificationsCount()
{
  $.ajax(
    {
      url     : 'php/getNotifications.php',
      success : function(output)
      {
        if (output > 0)
        {
          $('.nb_notifs').text(" (" + output + ")");
          $('.nb_notifs').val(" (" + output + ")");
        }
        else {
          $('.nb_notifs').text("");
          $('.nb_notifs').val("");
        }
      }

    })
}

function getRecCountPro()
{
  $.ajax(
    {
      url     : 'queries/getRecCountPro.php',
      success : function(output)
      {
        if (output > 1)
        {
          $('.nb_recs').append('<b>' + output + "</b> recommandations");
        }
        else {
          $('.nb_recs').append('<b>' + output + "</b> recommandation");

        }
        }
      })
}

function getRecCount()
{
  $.ajax(
    {
      url     : 'queries/getRecCount.php',
      success : function(output)
      {
        if (output >= 1)
        {
          $('.nb_recs').append('<b>' + output + "</b> professionnels recommandés");
        }
        else {
          $('.nb_recs').append('<b>' + output + "</b> professionnels recommandé");

        }
        }
      })
}

function ChangeRec(obj)
{
  $.ajax(
    {
      url : 'php/changeRec.php',
      data : 'rec_id='  +  obj.getAttribute("id") + '&state=' + obj.getAttribute("value"),
         type: 'POST',
         success: function(output)
         {
             getNotificationsCount();
             loadNotifications();
             getRecCount();
         }
                });
}

function getRecsPro()
{
  cleanDiv("info-content");

  $.ajax(
    { url: 'queries/getRecsPro.php',
         success: function(output)
         {
           console.debug(output);

           var obj = JSON.parse(output);

           if (obj.length == 0)
             $("#rec-content").append('<b>Cette personne n\'a pas encore été recommandée</b>');

             console.debug(obj);

           for (var i = 0; i < obj.length; i++)
           {
             var json_data = JSON.parse(JSON.stringify(obj[i]));
             $("#rec-content").append('<li class="list-group-item"><b>'+ json_data.name+'</b></li>');
           }
         }

      })
}

function getRecs()
{
  cleanDiv("info-content");
  cleanDiv("photo-content");
  $.ajax(
    { url: 'queries/getRecs.php',
         success: function(output)
         {
           console.debug(output);

           var obj = JSON.parse(output);

           if (obj.length == 0)
             $("#rec-content").append('<b>Aucune personne recommandée</b>');

             console.debug(obj);

           for (var i = 0; i < obj.length; i++)
           {
             var json_data = JSON.parse(JSON.stringify(obj[i]));
             $("#rec-content").append('<li class="list-group-item"><b>'+ json_data.name+'</b></li>');
           }
         }

      })
}

function loadNotifications()
{
  cleanDiv("info-content");
  cleanDiv("photo-content");
  $.ajax(
    { url: 'php/getAwaitingRec.php',
         success: function(output)
         {
          var obj = JSON.parse(output);
          if (obj.length == 0)
            $("#info-content").append('<b>Aucune notification</b>');


          for (var i = 0; i < obj.length; i++)
          {
            var json_data = JSON.parse(JSON.stringify(obj[i]));
            $("#info-content").append('<li class="list-group-item"><b>'+ json_data.name+'</b> vous a fait une demande de recommandation :  <a  onclick="ChangeRec(this)" id="'+json_data.rec_id+'" class="green-font rec-responder" value="0" >Accepter</a> <a class="rec-responder" id="'+json_data.rec_id+'" onclick="ChangeRec(this)" value="1">Refuser</a></li>');
          }
        }
      })
}

function getSession()
{
  var result="";
    $.ajax({
      url:"php/getSession.php",
      async: false,
      success:function(data) {
         result = data;
      }
   });
   return result;
}

function loadPhotosPro()
{
  cleanDiv("info-content");
  cleanDiv("photo-content");

  $.ajax(
    { url: 'php/getPhotosPro.php',
         success: function(output)
         {
          var obj = JSON.parse(output);

//          if (obj.length < 100)
  //          $("#info-content").append('<b>Aucune Photo</b>');


  $("#photo-content").append('<div class="col-xs-4"><a class="thumbnail float-left fakelink thumb" onclick="changePhoto1();"><img src="http://dev.prolinked.fr/'+obj[0]+'" alt="..."></a></b></li></div><form class="hidden" action="//dev.prolinked.fr/upload_user_img_1_pro.php?session='+getSession()+'" id="user_img_1_form" method="post" enctype="multipart/form-data"><input type="file" name="user_img_1" id="user_img_1" value=""></form><script type="text/javascript">document.getElementById("user_img_1").onchange = function() {document.getElementById("user_img_1_form").submit();}</script>');
  $("#photo-content").append('<div class="col-xs-4"><a class="thumbnail float-left fakelink thumb" onclick="changePhoto2();"><img src="http://dev.prolinked.fr/'+obj[1]+'" alt="..."></a></b></li></div><form class="hidden" action="//dev.prolinked.fr/upload_user_img_2_pro.php?session='+getSession()+'" id="user_img_2_form" method="post" enctype="multipart/form-data"><input type="file" name="user_img_2" id="user_img_2" value=""></form><script type="text/javascript">document.getElementById("user_img_2").onchange = function() {document.getElementById("user_img_2_form").submit();}</script>');
  $("#photo-content").append('<div class="col-xs-4"><a class="thumbnail float-left fakelink thumb" onclick="changePhoto3();"><img src="http://dev.prolinked.fr/'+obj[2]+'" alt="..."></a></b></li></div><form class="hidden" action="//dev.prolinked.fr/upload_user_img_3_pro.php?session='+getSession()+'" id="user_img_3_form" method="post" enctype="multipart/form-data"><input type="file" name="user_img_3" id="user_img_3" value=""></form><script type="text/javascript">document.getElementById("user_img_3").onchange = function() {document.getElementById("user_img_3_form").submit();}</script>');

        }
      })

};

function loadPhotos()
{
  cleanDiv("info-content");
  cleanDiv("photo-content");

  $.ajax(
    { url: 'php/getPhotos.php',
         success: function(output)
         {
          var obj = JSON.parse(output);

//          if (obj.length < 100)
  //          $("#info-content").append('<b>Aucune Photo</b>');



  $("#photo-content").append('<div class="col-xs-4"><a class="thumbnail float-left fakelink thumb" onclick="changePhoto1();"><img src="http://dev.prolinked.fr/'+obj[0]+'" alt="..."></a></b></li></div><form class="hidden" action="//dev.prolinked.fr/upload_user_img_1.php?session='+getSession()+'" id="user_img_1_form" method="post" enctype="multipart/form-data"><input type="file" name="user_img_1" id="user_img_1" value=""></form><script type="text/javascript">document.getElementById("user_img_1").onchange = function() {document.getElementById("user_img_1_form").submit();}</script>');
  $("#photo-content").append('<div class="col-xs-4"><a class="thumbnail float-left fakelink thumb" onclick="changePhoto2();"><img src="http://dev.prolinked.fr/'+obj[1]+'" alt="..."></a></b></li></div><form class="hidden" action="//dev.prolinked.fr/upload_user_img_2.php?session='+getSession()+'" id="user_img_2_form" method="post" enctype="multipart/form-data"><input type="file" name="user_img_2" id="user_img_2" value=""></form><script type="text/javascript">document.getElementById("user_img_2").onchange = function() {document.getElementById("user_img_2_form").submit();}</script>');
  $("#photo-content").append('<div class="col-xs-4"><a class="thumbnail float-left fakelink thumb" onclick="changePhoto3();"><img src="http://dev.prolinked.fr/'+obj[2]+'" alt="..."></a></b></li></div><form class="hidden" action="//dev.prolinked.fr/upload_user_img_3.php?session='+getSession()+'" id="user_img_3_form" method="post" enctype="multipart/form-data"><input type="file" name="user_img_3" id="user_img_3" value=""></form><script type="text/javascript">document.getElementById("user_img_3").onchange = function() {document.getElementById("user_img_3_form").submit();}</script>');

        }
      })

};


function changePhoto1()
{
$('#user_img_1').click();
}

function changePhoto2()
{
$('#user_img_2').click();
}

function changePhoto3()
{
$('#user_img_3').click();
}

getNotificationsCount();
getProNotifs();
