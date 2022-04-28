$(document).ready(function () {
  $(".aggiungicategoria").hide();
  $(".eliminacategoria").hide();

  $("#aggiungicategoria").click(function () {
    $(".aggiungicategoria").slideDown();
    $(".eliminacategoria").slideUp();
  });

  $("#eliminacategoria").click(function () {
    $(".eliminacategoria").slideDown();
    $(".aggiungicategoria").slideUp();
  });

  $('#aggiungi').click(function(){
    azione={
      azione: 1,
      categoria: $('#categoria').val()
    }
    $.post('gestione-categorie-venditore.php',{
      azione: azione,
    }, function(data){
      alert(data);
    });
  });

  $('#elimina').click(function(){
    azione={
      azione: 2,
      categoria: $('#categoria').val()
    }
    $.post('gestione-categorie-venditore.php',{
      azione: azione,
    }, function(data){
      alert(data);
    });
  });
});
