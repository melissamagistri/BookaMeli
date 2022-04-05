$(document).ready(function(){
    $('.recensione').hide();
    $('.listaProdotti').hide();
    
    $(".bottonerecensione").click(function(){
        if($(this).hasClass("selected")){
            hideElement($(this), 'selected');
        }
        else{
            hideElement($(".selected"), 'selected');
            $(this)
                .addClass("selected")
                .next().slideDown();
        }
    });
    

    
    $(".divlistaProdotti").click(function(){
        if($(this).hasClass("selezionato")){
            hideElement($(this), 'selezionato');
        }
        else{
            hideElement($(".selezionato"), 'selezionato');
            $(this)
                .addClass("selezionato")
                .next().slideDown();
        }
    });

    $(".invia").click(function(){
        var recensione = {
            nomeprodotto: $('.selected').siblings('.image').find('.imgordini').attr("alt"),
            titolorecensione: $('#titolo').val(),
            testorecensione: $('#recensione').val(),
            voto: $('input[name="rate"]:checked').val()
        };
        $.ajax({
            type: 'POST',
            url: 'aggiungirecensione.php',
            data: recensione
        });
            
        $('.selected').hide();
        $('.selected').next().html('<p>Grazie per il tuo feedback!</p>');
    });
});

function hideElement(element, string){
    element
        .removeClass(string)
        .next().slideUp(); 
}