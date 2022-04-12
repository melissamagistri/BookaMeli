$(document).ready(function(){
    $('.radiobuttonattivo').attr('checked','true');

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
        if($('.selected + div > div > #titolo').val() != '' && $('.selected + div > div > #recensione').val() != '' && $('.selected + div > div > form > input[name="rate"]:checked').val()){
            var recensione = {
                nomeprodotto: $('.selected').siblings('.image').find('.imgordini').attr("alt"),
                titolorecensione: $('.selected + div > div > #titolo').val(),
                testorecensione: $('.selected + div > div > #recensione').val(),
                voto: $('.selected + div > div > form > input[name="rate"]:checked').val()
            };
            $.post('aggiungirecensione.php',{
                recensione: recensione
            }, function(data,status){
                if(status == 'success'){
                    $('.selected').hide();
                    $('.selected').next().html('<p>Grazie per il tuo feedback!</p>');
                } else {
                    $('.selected').next().html('<p>Si è verificato un problema con il server, la preghiamo di riprovare piu tardi.</p>');
                }
            });
        } else {
            alert('Per aggiungere o modificare una recensione devi compilare tutti i campi!');
        }
            
        
    });

    $(".elimina").click(function(){
        var recensione = {
            nomeprodotto: $('.selected').siblings('.image').find('.imgordini').attr("alt")
        };
        $.post('aggiungirecensione.php',{
            elimina: recensione
        }, function(data,status){
            if(status == 'success'){
                $('.selected').hide();
                $('.selected').next().html('<p>La recensione è stata eliminata con successo!</p>');
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