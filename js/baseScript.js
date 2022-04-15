$(document).ready(function(){
    $(document).click(function (e){
        if($(e.target).is('body > header > nav > div:nth-child(2) > img') && !document.getElementsByClassName('sidenavcar')[0].classList.contains('open')){
            openNav($('.sidenav'));
        }
        else if($(e.target).is('body > header > nav > div:first-child > img') && !document.getElementsByClassName('sidenav')[0].classList.contains('open')){
            openNav($('.sidenavcar'));
        }
        else if((!($(e.target).is('.sidenavcar')) && !($(e.target).is('.sidenavcar *'))) && document.getElementsByClassName('sidenavcar')[0].classList.contains('open')){
            closeNav($('.sidenavcar'));
        }
        else if((!($(e.target).is('.sidenav')) && !($(e.target).is('.sidenav *'))) && document.getElementsByClassName('sidenav')[0].classList.contains('open')){
            closeNav($('.sidenav'));
        }
        else if($(e.target).is("img[alt~='BookaMeli']")){
            window.location.href = 'index.php';
        }
        else if($(e.target).is("img[alt~='youtube']")){
            window.location.href = 'https://www.youtube.com';
        }
        else if($(e.target).is("img[alt~='instagram']")){
            window.location.href = 'https://www.instagram.com';
        }
        else if($(e.target).is("img[alt~='facebook']")){
            window.location.href = 'https://www.facebook.com';
        }
        else if($(e.target).is("img[alt~='chiusura']") && document.getElementsByClassName('sidenavcar')[0].classList.contains('open')){
            closeNav($('.sidenavcar'));
        }
        else if($(e.target).is("img[alt~='chiusura']") && document.getElementsByClassName('sidenav')[0].classList.contains('open')){
            closeNav($('.sidenav'));
        }
    });
    
    //chiamata ajax che si occupa dell'aggiornamento della quantità dei prodotti nel carrello
    $('select').on('change', function() {
        $(this).addClass('changed');
        var aggiornaquantita = {
            nomeprodotto: $('.changed').parent().siblings('.titolo').find('.hover').text(),
            quantita: this.value
        };
        $.post('aggiornaQuantitàProdotto.php',{
            aggiornaquantita: aggiornaquantita
        }, function(data, success){
            if(success){
                $('.totale').text(data+'€'); 
            }
        });
        $(this).removeClass('changed');
    });
   
});

function openNav(nav) {
    $(nav).addClass('open');
    $('body > header > nav').addClass('background');
    $('body> footer').addClass('background');
    $('body> main').addClass('background');
    $('a:not(.sidenav *, .sidenavcar *)').addClass('disable');
  }
  
  
  function closeNav(nav) {
    $(nav).removeClass('open');
    $('body > header > nav').removeClass('background');
    $('body> footer').removeClass('background');
    $('body> main').removeClass('background');
    $('a').removeClass('disable');
  }