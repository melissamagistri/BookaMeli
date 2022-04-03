$(document).ready(function(){
    if($("div>ul>li:nth-of-type(4)>p").text()!=''){
        $('div>ul>li:nth-of-type(3)>p').css({'text-decoration': 'line-through', 'font-size':'10px'});
    };
});