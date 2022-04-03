$(document).ready(function(){
    //parte per mettere la barra sul prezzo vecchio se c'è lo sconto.
    for(let i = 1; i<=$('.prodotti').length;i++){
        if($($(".prodotti:nth-of-type("+i+")>div >div:nth-of-type(1)")).children().length == 2){
            console.log('si');
            $(".prodotti:nth-of-type("+i+")>div >div:nth-of-type(1)>p:nth-of-type(1)").css({'text-decoration': 'line-through', 'font-size':'10px'});
        };
    }
});