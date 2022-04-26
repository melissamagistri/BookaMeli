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
});
