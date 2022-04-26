$(document).ready(function(){
    $('#elimina').click(function(){
        var azione ={
            azione:1,
            prodotto: $('#idprodotto').text()
        } 
        $.post('azioni-modifica-prodotto.php',{
            azione: azione
        }, function(data,status){
            alert(data);
        });
    });

    $('#salva').click(function(){
        var azione = {
            azione: 0,
            prodotto: $('#idprodotto').value()
        }
        $.post('azioni-modifica-prodotto.php',{
            azione: azione
        }, function(data,status){
            alert(data);
        });
    });
});