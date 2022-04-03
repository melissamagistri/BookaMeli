$(document).ready(function(){
    if($(".display-inlineflex").children().length == 2){
        $('.display-inlineflex>p:nth-of-type(1)').css({'text-decoration': 'line-through', 'font-size':'10px'});
    };
});