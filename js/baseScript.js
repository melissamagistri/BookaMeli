$(document).ready(function(){
    $("body > header > nav > div:last-child>img, div > ul > li:first-of-type > img:first-of-type").click(function(e){
        window.location.href = '#';
    });
    //inserire i redirect dei social nel footer
    $("footer > div > ul > li:last-of-type > div > ul > li:first-child").click(function(e){
        window.location.href = 'https://www.youtube.com';
    });
    $("footer > div > ul > li:last-of-type > div > ul > li:nth-child(2)").click(function(e){
        window.location.href = 'https://www.instagram.com';
    });
    $("footer > div > ul > li:last-of-type > div > ul > li:nth-child(3)").click(function(e){
        window.location.href = 'https://www.facebook.com';
    });
});