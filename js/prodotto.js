$(document).ready(function(){
    if($(".inlineflex").children().length == 2){
        $('.inlineflex>p:nth-of-type(1)').css({'text-decoration': 'line-through', 'font-size':'10px'});
    };
});