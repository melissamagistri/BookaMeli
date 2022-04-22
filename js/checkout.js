$(document).ready(function () {
  $(".checkoutdiv").hide();
  $("#carta").click(function () {
    $("#contanti").removeClass('selected');
    $('#carta').addClass('selected');
    $(".checkoutdiv").slideDown();
  });

  $("#contanti").click(function () {
    $("#carta").removeClass('selected');
    $('#contanti').addClass('selected');
    $(".checkoutdiv").slideUp();
  });

  $(".submit").click(function () {
    if($('#contanti').hasClass('selected')){
      $(".form").submit();
    }
    else if (
      $("#carta").hasClass('selected') && $(".datiNumero").value && $(".datiNome").value) {
      $(".form").submit();
    } else {
      alert("Devi inserire i dati della tua carta per proseguire");
    }
  });
});

function hideElement(element) {
  element.removeClass("active").next().slideUp();
}
