/*// zet op hidden bij laden
$('.changePassword').hide();

$("#btn-change-password").click(function() {
  $('.changePassword').toggle();
});*/

$(function () {
    // script hier
    $('.changePassword').hide();

    $('#btn-change-password').click(function() {
        if($('.changePassword').is(':hidden')){
        	console.log("hidden");

            $('.changePassword').slideDown("slow");

        }
        else if($('.changePassword').is(':visible')){

            $('.changePassword').slideUp("slow");

        }

        
    });
});