$(document).scroll(function() {
 var y = $(this).scrollTop();
console.log(window.innerWidth / 1.5 + ' ' + window.innerWidth / 1.3 + ' ' + window.innerWidth / 1);


if (y < window.innerWidth / 1.5)
{
  $('#iPhone1').removeClass("iphone-hidden");
  $('#iPhone2').addClass("iphone-hidden");
  $('#iPhone3').addClass("iphone-hidden");
}
else if (y < window.innerWidth / 1.3)
{
  $('#iPhone1').addClass("iphone-hidden");
  $('#iPhone2').removeClass("iphone-hidden");
  $('#iPhone3').addClass("iphone-hidden");
}
else if (y < window.innerWidth / 1)
{
  $('#iPhone1').addClass("iphone-hidden");
  $('#iPhone2').addClass("iphone-hidden");
  $('#iPhone3').removeClass("iphone-hidden");
}


 /*
 if (y > window.innerWidth / 1.7 && y < window.innerWidth / 1.3)
{
  $('#iPhone2').addClass("iphone-hidden");
  $('#iPhone3').removeClass("iphone-hidden");
}

 else if (y > window.innerWidth /1.3)
  {
    console.log(y);
    $('#iPhone2').fadeOut(0);
    $('#iPhone3').fadeIn(0);
  }
  else
   {
    $('#iPhone1').fadeIn(0);
    $('#iPhone2').fadeOut(0);
    $('#iPhone3').fadeOut(0);
  }
  */
});
$(document).ready( function () {

   $('.redirection').click(function()
   {
     $('html,body').animate({scrollTop: $(".count").offset().top}, 'slow'      );
   });

   $('.redirection-contact').click(function()
   {
     $('html,body').animate({scrollTop: $("#contact").offset().top}, 'slow'      );
   });


});
