$(document).ready(function () {
  $(".checkoutdiv").hide();
  $("#carta").click(function () {
    $(".checkoutdiv").slideDown();
  });

  $("#contanti").click(function () {
    $(".checkoutdiv").slideUp();
  });

  $(".submit").click(function () {
    if (
      $("#carta").checked() &&
      $(".datiNumero").value &&
      $(".datiNome").value
    ) {
      $(".form").submit();
    } else {
      alert("Devi inserire i dati della tua carta per proseguire");
    }
  });
});

function hideElement(element) {
  element.removeClass("active").next().slideUp();
}
