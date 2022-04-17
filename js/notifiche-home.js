$(document).ready(function(){
    $('.contenutoNotifica').hide();
    $('.notifica').click(function(){
        $('.contenutoNotifica').slideUp();
        $(this).children('.contenutoNotifica').slideDown();
    });
});