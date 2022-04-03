$(document).ready(function(){
    if(getNumberImg()>1){
        showImage();
        changeImageWithTime();
        $(".dotdiv > span").click(function(){
            const active = getCurrentImg();
            $(".divimg > div:nth-of-type("+active+")").removeClass("current");
            $(".dotdiv > span:nth-of-type("+active+")").removeClass("dot-active");
            $(".dotdiv > span:nth-of-type("+active+")").addClass("dot");
            const dot = getSelectedDot(this);
            $(".dotdiv > span:nth-of-type("+dot+")").removeClass("dot");
            $(".dotdiv > span:nth-of-type("+dot+")").addClass("dot-active");
            $(".divimg > div:nth-of-type("+getCurrentDot()+")").addClass("current");
            showImage();
        });
    }
  
    //parte per mettere la barra sul prezzo vecchio se c'è lo sconto.
    for(let i = 1; i<=$('.novita>div>ul>li>div').length;i++){
        if($($(".novita>div>ul>li:nth-of-type("+i+")>div >div:nth-of-type(1)")).children().length == 2){
            $(".novita>div>ul>li:nth-of-type("+i+")>div >div:nth-of-type(1)>p:nth-of-type(1)").css({'text-decoration':'line-through', 'font-size':'10px'});
        };
    }

    for(let i = 1; i<=$('.popolari>div').length;i++){
        if($($(".popolari>div>ul>li:nth-of-type("+i+")>div >div:nth-of-type(1)")).children().length == 2){
            $(".popolari>div>ul>li:nth-of-type("+i+")>div >div:nth-of-type(1)>p:nth-of-type(1)").css('text-decoration','line-through');
        };
    }
    
    
});

function getSelectedDot($dot){
    for(let i = 1; i<=getNumberImg();i++){
        if($(".dotdiv > span:nth-of-type("+i+")").is($dot)){
            return i;
        }
    }
}

function hideAllImages(){
    for(let i = 1; i<=getNumberImg();i++){
       $(".divimg > div:nth-of-type("+i+")").hide();
    }
}

function getNumberImg(){
    return $(".divimg").children().length;
}

function showImage(){
    hideAllImages();
    for(let i = 1; i<=getNumberImg();i++){
        if($(".divimg > div:nth-of-type("+i+")").hasClass("current")){
            $(".divimg > div:nth-of-type("+i+")").show();
            break;
        }
        if(i==getNumberImg()){
            $(".divimg > div:nth-of-type("+getNumberImg()+")").addClass("current");
            $(".divimg > div:nth-of-type("+i+")").show();
        }
    }
    activeDot();
}

function getCurrentImg(){
    for(let i = 1; i<=getNumberImg();i++){
        if($(".divimg > div:nth-of-type("+i+")").hasClass("current")){
            return i;
        }
    }
}

function getCurrentDot(){
    for(let i = 1; i<=getNumberImg();i++){
        if($(".dotdiv > span:nth-of-type("+i+")").hasClass("dot-active")){
            return i;
        }
    }
}

function activeDot(){
    const active = getCurrentImg();
    $(".dotdiv > span:nth-of-type("+active+")").removeClass("dot");
    $(".dotdiv > span:nth-of-type("+active+")").addClass("dot-active");
}

function changeImageWithTime(){
    const active = getCurrentImg()
    $(".divimg > div:nth-of-type("+active+")").removeClass("current");
    $(".dotdiv > span:nth-of-type("+active+")").removeClass("dot-active");
    $(".dotdiv > span:nth-of-type("+active+")").addClass("dot");
    if(active == getNumberImg()){
        $(".divimg > div:nth-of-type("+1+")").addClass("current");
    } else {
        $(".divimg > div:nth-of-type("+(active+1)+")").addClass("current");
    }
    showImage();
    setTimeout(changeImageWithTime,5000);
}