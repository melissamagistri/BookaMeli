$(document).ready(function () {
    var intervalId = window.setInterval(function(){
        refreshChat();
    }, 30000);
    //invia messaggio e refresh
    $('#invia').click(function(){
        invia={
            messaggio: $('#messaggio').val(),
            chat: window.location.search.substr(1).split('idchat=').pop()
        }
        $.post('refreshchatVenditore.php',{
            invia:invia
        },function(data){
            $('#chat').html(data);
            $('#messaggio').val('');
          });
    });
});

function refreshChat(){
    refresh = window.location.search.substr(1).split('idchat=').pop()
    $.post('refreshchatVenditore.php',{
        refresh:refresh
    }, function(data){
        $('#chat').html(data);
      });
}