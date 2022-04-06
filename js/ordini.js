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
        $.post('aggiungirecensione.php',{
            recensione: recensione
        }, function(data,status){
            if(status == 'success'){
                $('.selected').hide();
                $('.selected').next().html('<p>Grazie per il tuo feedback!</p>');
            } else {
                $('.selected').next().html('<p>Si è stato un problema con il server, la preghiamo di riprovare piu tardi.</p>');
            }
        });
            
        
    });
});

function hideElement(element, string){
    element
        .removeClass(string)
        .next().slideUp(); 
}