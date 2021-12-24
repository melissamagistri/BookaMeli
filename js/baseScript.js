$(document).ready(function(){

    $("body > header > nav > div:first-child").click(function (e){
        openNav($('.sidenavcar'));
    });

    $("body > header > div:nth-of-type(2) > ul:nth-child(1)").click(function (e){
        closeNav($('.sidenavcar'));
    }); 

    $("body > header > nav > div:nth-child(2)").click(function (e){
        openNav($('.sidenav'));
    });

    $("body > header > div:first-of-type > ul:nth-child(1)").click(function (e){
        closeNav($('.sidenav'));
    });    
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

function openNav(nav) {
    $(nav).addClass('open');
    $('body > header > nav').addClass('background');
    $('body> footer').addClass('background');
    $('body> main').addClass('background');
  }
  
  
  function closeNav(nav) {
    $(nav).removeClass('open');
    $('body > header > nav').removeClass('background');
    $('body> footer').removeClass('background');
    $('body> main').removeClass('background');
  }