$(document).ready(function(){
    $('.contenutoNotifica').hide();
    $('.notifica').click(function(){
        $('.contenutoNotifica').slideUp();
        $(this).children('.contenutoNotifica').slideDown();
    });
    $('#selettoreNotifiche').on('change', function() {
        //caso in cui devo visualizzare tutti gli ordini
        if(this.value == 'ordini'){
            azione = 'ordini';
        }
        //caso in cui devo visualizzare le notifiche dei prodotti
        else if(this.value == 'prodotti'){
            azione = 'prodotti';
        }
        //caso in cui devo visualizzare tutte le notifiche
        else if(this.value == 'notifiche'){
            azione = 'notifiche';
        }
        $.post('visualizzaNotificheVenditore.php',{
            azione: azione
        }, function(data){
            $('#listaNotifiche').html(data);
            $('.contenutoNotifica').hide();
            $('.notifica').click(function(){
                $('.contenutoNotifica').slideUp();
                $(this).children('.contenutoNotifica').slideDown();
            });
        });
    });
});