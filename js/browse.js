//card hover animation
$('.card').hover(function(){
  $(this).children('img').animate({'width':'25vw', 'height':'14vw'}, 200);
  $(this).children('.infoText').addClass("d-block");
  $(this).children('.infoText').removeClass("d-none");
}, function(){
  $(this).children('img').first().animate({'width':'18vw', 'height':'10vw'}, 200);
  $(this).children('.infoText').addClass("d-none");
  $(this).children('.infoText').removeClass("d-block");
});


//rating button color when submit
$('.#rating-up-button').click(function(){
  $(this).css('background-color: #0f0')
});

$('.#rating-down-button').click(function(){
  $(this).css('background-color: #f00')
});
