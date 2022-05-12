$(function () {

    $('#filter').keyup(function () {
        var filter = $(this).val().toLowerCase();
        if(filter != ''){
            $('.searchCard').hide();
            $('.categoryTitle').hide();
            $('.container').css("white-space", "normal");
            $('.moviesRow').css("display", "inline");
            $('.searchCard[data-g*="' + filter + '"]').show();

        }
        else{
        	$('.searchCard').show();
            $('.categoryTitle').show();
            $('.container').css("white-space", "no-wrap");
            location.reload();
        }
        /*teller();*/
    });

/*    // tellerfunctie
    function teller() {
        //
    	var teller = $('main li:visible').length;
    	$('#zichtbaar').text(teller);
    }

    // start de teller bij het openen van de pagina.
    teller();*/
});