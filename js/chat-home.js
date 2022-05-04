$(document).ready(function () {
    var intervalId = window.setInterval(function(){
        refreshChat();
    }, 30000);
});

function refreshChat(){
    $.post('refreshchats.php', function(data){
        $('#chat').html(data);
      });
}
