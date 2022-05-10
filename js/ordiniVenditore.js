$(document).ready(function () {
    $(".radiobuttonattivo").attr("checked", "true");

    $(".listaProdotti").hide();
  
    $(".divlistaProdotti").click(function () {
      if ($(this).hasClass("selezionato")) {
        hideElement($(this), "selezionato");
      } else {
        hideElement($(".selezionato"), "selezionato");
        $(this).addClass("selezionato").next().slideDown();
      }
    });

    $('#statoOrdine').on('change', function() {
        var statoOrdine = {
            //mettere a posto le variabili che passo
            idordine: $('.selezionato > p:last-of-type()').text() ,
            stato: this.value
        };
        
        $.post('aggiornaStatoOrdine.php',{
            statoOrdine: statoOrdine
        }, function(data, success){
            if(statoOrdine['stato'] == 'consegnato'){
              $('.selezionato > p:nth-of-type(3)').text('Stato: Consegnato');
            } else {
              $('.selezionato > p:nth-of-type(3)').text('Stato: Non ancora spedito');
            }
        });
    });
    
  });
function hideElement(element, string) {
    element.removeClass(string).next().slideUp();
  }