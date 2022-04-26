$(document).ready(function(){
    $('#elimina').click(function(){
        var azione = 1;
        $.post('azioni-modifica-prodotto.php',{
            azione: azione
        }, function(data,status){
            alert(data);
        });
    });

    $('#salva').click(function(){
        var azione = 0;
        $.post('azioni-modifica-prodotto.php',{
            azione: azione
        }, function(data,status){
            alert(data);
        });
    });
});