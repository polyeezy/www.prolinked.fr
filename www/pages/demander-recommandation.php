

<style media="screen">
  @import URL("https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css");
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.js"></script>




<?php

    if (getInvitCount($_SESSION['id']) > 0)
      {
        $invites = getInvits($_SESSION['id']);

        foreach ($invites as $invit)
        {
          create_recommandation($_SESSION['id'], $invit['invit_from_id'], 0);
        }

        $invites = getInvitsPhone($_SESSION['id']);

        foreach ($invites as $invit)
        {
          create_recommandation($_SESSION['id'], $invit['invit_from_id'], 0);
        }


    }

 ?>


<div class="center-text row col-md-12 demander-reco">
  <div class="col-md-8 col-md-offset-2">
    <h5 class=" Title grey-font">Pour pouvoir créer un compte professionnel sur ProLinked, vous devez
être recommandé par un membre de la communauté.</h5><a class="rec center modal-trigger phone-trigger hidden phone" href="#phoneTrigger">PHONE</a>

  </div>
</br>

  <div class="row">

    <div class="col-md-8 col-md-offset-2 demander-rec left-align  center-text">
      <h4 class="center-text">DEMANDER UNE RECOMMANDATION</h4>
    </br></br>


    <a class="rec center modal-trigger" href="#modalContact">
    <div class="col-md-6 ">
        <img src="img/icons/logo_contacts.png" class="logo-demande center" alt="Logo Facebook" />
      <div class="row center-text">
<span class="rec-desc">  Demander une recommandation à mes contacts ProLinked </span>
             </div>
    </div>
</a>
      <a class="rec center modal-trigger" href="#modalFacebook">
      <div class="col-md-6 ">
          <img src="img/icons/logo_facebook.png" class="logo-demande center" alt="Logo Facebook" />
        <div class="row center-text">
<span class="rec-desc">  Demander une recommandation à mes contacts Facebook </span>
               </div>
      </div>
    </a>





    </div>
</div>


<div id="modalFacebook" class="modal">
  <div class="odal-content">
    <h4 class="red-font">Recommandation Via Facebook</h4>
    <div class="row">
      <fb:login-button scope="public_profile,email,user_friends" onlogin="getfriend();">Cliquez ici pour retrouver vos amis Facebook
      </fb:login-button>
    </br>
      <div id="friends" style="margin-top: 25px;">
      </div>
      <script>
      console.log("<div class='container'><b>" + data['data'][friendIndex]['name'] + "</b>" + "<span><img src='" + data['data'][friendIndex]['picture']['data']['url'] + "' class='img-circle' width='50' height='50' style='border-radius: 25%'>"+ "</b></span><span>id=" + data['data'][friendIndex]['id'] +"</span><span><Button class='btn btn-default' onclick='envoie()'>Envoyer un message privé</button></span></div>");
      window.fbAsyncInit = function() {
      FB.init({
        appId      : '120539481683874',
        cookie     : true,  // enable cookies to allow the server to access
                            // the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.6' // use version 2.2
        });
          };
          (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
        //   function envoi(id)
        //   {
        //     FB.ui({
        //       method: 'send',
        //       link: 'http://prolinked',
        //       to: id,
        // });
      //   function getfriend(){
      //   FB.api('/me','GET',{"fields":"id,name,friends{cover,picture{url,height=200px},name}"},function(response) {
      //       console.log(response);
      //       var divfb=document.getElementById("fblist");
      //       var data=response.friends;
      //       divfb.style.width = "40%";
      //       divfb.style.length = "40%";
      //       for (var friend=0; friend<data['data'].length; friend++)
      //     {
      //           var divtab = document.createElement("div");
      //           divtab.style.background = "url("+data['data'][friend]['cover']['source']+") no-repeat";
      //            divtab.style.backgroundSize= "200px 200px";
      //            divtab.innerHTML="<div class='container'><b>" + data['data'][friendIndex]['name'] + "</b>" + "<span><img src='" + data['data'][friendIndex]['picture']['data']['url'] + "' class='img-circle' width='50' height='50' style='border-radius: 25%'>"+ "</b></span><span>id=" + data['data'][friendIndex]['id'] +"</span><span><Button class='btn btn-default' onclick='envoie()'>Envoyer un message privé</button></span></div>";
      //            divfb.appendChild(divtab);
      //     }
      //   });
      // };
      function getfriend(){
      FB.api('/me','GET',{"fields":"id,name,friends{cover,picture{url,height=200px},name}"},function(response) {
          console.log(response);
          var data = response.friends;
          var content = document.getElementById("friends");

          for (var friendIndex=0; friendIndex<data['data'].length; friendIndex++)
        {



          var row =  document.createElement("div");
          row.className = 'row';
          content.appendChild(row);

          var imgContainer = document.createElement("div");
          imgContainer.className = 'col-xs-2';

          var img = document.createElement("img");
          img.className = 'rec-img';
          img.setAttribute('src', data['data'][friendIndex]['picture']['data']['url']);
          imgContainer.appendChild(img);

          var nameContainer = document.createElement("div");
          nameContainer.className = 'col-xs-2 center-text';
          nameContainer.innerHTML = data['data'][friendIndex]['name'];

          var linkContainer = document.createElement("div");
          linkContainer.className = 'col-xs-6';

          var a = document.createElement('a');
          var linkText = document.createTextNode(" + DEMANDER UNE RECOMMANDATION");
          a.appendChild(linkText);
          a.title = "DEMANDER UNE RECOMMANDATION";
          a.className = 'full-width rec-link';
          a.setAttribute('fbid', data['data'][friendIndex]['id']);
          linkContainer.appendChild(a);



          row.appendChild(imgContainer);
          row.appendChild(nameContainer);
          row.appendChild(linkContainer);


          $(".rec-link").click(function()
          {
            var sender = "<?php echo $_SESSION['id']?>";

            if (!$(this).attr("state"))
            {
            sendRecRequest(getSession(), getIdFromFb($(this).attr("fbid")));
            $(this).addClass("green-font");
            $(this).html("Demmande Envoyée <i class='glyphicon glyphicon-ok'></i>");
            $(this).attr("state", "done");
          }
          });




        }
        });
      };
        </script>
    </div>

    </div>
  </div>


    </div>



      <div id="modalContact" class="modal">
        <div class="odal-content">
          <h4 class="red-font modal-header">Recommandation Via Contacts ProLinked</h4>
          <div class="row">
            <div id="friends" style="margin-top: 25px;">
          </br>
              <?php

                $users = getUserFromTerm("");
                foreach ($users as $user) {

                  $name = $user['user_firstname'] . ' ' . $user['user_lastname'];
                  $img = $user['user_profile_picture'];

                  if (!filter_var($img, FILTER_VALIDATE_URL))
                  {
                  }

                  $id = $user['user_id'];

                  $rec = check_recommandation($_SESSION['id'], $id);

                  if ($user['user_id'] != $_SESSION['id'])
{
                  switch ($rec) {
                    case NULL:
                    echo "
                    <div class='row'>
                    <div class='col-xs-2'>

                   <img class='rec-img' src='$img'>
                    </div>

                    <div class='col-xs-2 center-text '>
                    <span class='nameContainer'>$name</span>
                    </div>

                    <div class='col-xs-6 '>
                    <a class='full-width rec-link' id='$id'> + DEMANDER UNE RECOMMANDATION</a>
                    </div>

                    </div>
                  ";
                  break;

                  case -1:
                  echo "

                  <div class='row'>
                  <div class='col-xs-2'>

                 <img class='rec-img' src='$img'>
                  </div>

                  <div class='col-xs-2 center-text '>
                  <span class='nameContainer'>$name</span>
                  </div>

                  <div class='col-xs-6 '>

                  <a class='full-width green-font' id='$id'>Demmande Envoyée <i class='glyphicon glyphicon-ok'></i></a>
                  </div>
                  </div>
";

                    default:
                      # code...
                      break;
                  }




                }
              }
               ?>


            </div>
            </div>
          </div>

          </div>
        </div>
</div>


<?php

if (isset($_GET['err']))
{
  if ($_GET['err'] == "wronguser")
  {
    echo "<script type='text/javascript'>
    $.noConflict();
    $('#modalContact').openModal();

    </script>";
  }
}

 ?>


<script type="text/javascript">
$.noConflict();

function sendRecRequest(sender_id, receiver_id)
{




  $.ajax(
    { url: 'php/ask_recommandation.php',
         data: "sender="+ sender_id + "&receiver="+receiver_id + "",
         type: 'POST',
         success: function(output)
         {
           $.ajax(
             { url: 'php/send_mail_ask_recommandation.php',
                  data: "sender="+ sender_id + "&receiver="+receiver_id + "",
                  type: 'POST',
                  success: function(output)
                  {
                    alert(output);
                 },
                 error: function () {
                   alert('error');
                 }
         })
        }
})



//  $.ajax(
//    { url: 'php/send_mail_ask_recommandation.php',
  //       data: "sender="+ sender_id + "&receiver="+receiver_id + "",
  //       type: 'POST',
  //       success: function(output) {
    //                  alert(output);

      //            }
//})




}


$(".rec-link").click(function()
{

  var sender = "<?php echo $_SESSION['id']?>";

  if (!$(this).attr("state"))
  {
  sendRecRequest(sender, $(this).attr('id'));
  $(this).addClass("green-font");
  $(this).html("Demmande Envoyée <i class='glyphicon glyphicon-ok'></i>");
  $(this).attr("state", "done");
}
});




$(document).ready(function(){
$('.modal-trigger').leanModal();




});
$('.navbar').addClass('light-grey-background');

</script>
