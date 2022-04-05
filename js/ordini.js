$(document).ready(function(){
    $('.recensione').hide();
    $('.listaProdotti').hide();
    $(document).ready(function(){
        $(".bottonerecensione").click(function(){
            if($(this).hasClass("selected")){
                hideElement($(this), 'selected');
            }
            else{
                hideElement($(".selected"), 'selected');
                $(this)
                    .addClass("selected")
                    .next().slideDown();
            }
        });
    });

    $(document).ready(function(){
        $(".divlistaProdotti").click(function(){
            if($(this).hasClass("selezionato")){
                hideElement($(this), 'selezionato');
            }
            else{
                hideElement($(".selezionato"), 'selezionato');
                $(this)
                    .addClass("selezionato")
                    .next().slideDown();
            }
        });
    })
});

function hideElement(element, string){
    element
        .removeClass(string)
        .next().slideUp(); 
}