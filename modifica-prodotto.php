<?php
require_once 'util.php';

if(isUserLoggedIn()){
    if(isset($_GET['idprodotto'])){
        $templateParams["titolo"] = "BookaMeli - Modifica prodotto";
        $templateParams["nome"] = "template/venditore/modifica-prodotto.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js", 'js/modifica-prodotto.js');
        $templateParams['categorie'] = $dbh->getCathegories();
        $templateParams['categoriaProdotto'] = $dbh->getProductCathegory($_GET['idprodotto']);
        if(isset($_GET['errore'])){
            if($_GET['errore']=='campiNonCompilati'){
                $templateParams['errore'] = 'Alcuni campi non sono stati compilati.';
            } else if($_GET['errore'] == 'immagine'){
                $templateParams['errore'] = "L'immagine che hai tentato di inserire è troppo grande.";
            }else if($_GET['errore'] == 'numeri'){
                $templateParams['errore'] = "Il prezzo o lo sconto o la quantità inseriti contengono errori.";
            }
        
        }
        if(count($templateParams['categoriaProdotto']) == 0){
            $templateParams['categoriaProdotto']['nomecategoria'] = 'Nessuna Categoria';
        } else {
            $templateParams['categoriaProdotto'] = $templateParams['categoriaProdotto'][0];
        }
        $templateParams['infoProdotto'] = $dbh->getProductInfosbyId($_GET['idprodotto'])[0];
    } else {
        header('Location: accountVenditore.php');
    }
} else {
    header("Location: login.php");
}


require_once 'template/venditore/base.php';
?>