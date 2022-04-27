<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Aggiungi prodotto";
$templateParams["nome"] = "template/venditore/nuovo-prodotto.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js");
$templateParams['categorie'] = $dbh->getCathegories();
if(isset($_GET['errore'])){
    if($_GET['errore']=='campiNonCompilati'){
        $templateParams['errore'] = 'Alcuni campi non sono stati compilati.';
    } else if($_GET['errore'] == 'immagine'){
        $templateParams['errore'] = "L'immagine che hai tentato di inserire è troppo grande.";
    }else if($_GET['errore'] == 'numeri'){
        $templateParams['errore'] = "Il prezzo o lo sconto o la quantità inseriti contengono errori.";
    }

}


require_once 'template/venditore/base.php';
?>