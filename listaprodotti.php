<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Prodotti";
$templateParams["nome"] = "template/listaprodotti.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/listaprodotti.js");

if(isset($_GET['cerca']) && isset($_GET['cat'])){
    if($_GET['cerca'] == '' && $_GET['cat'] == 'tutte le categorie'){
        header('Location: index.php');
    } else if($_GET['cerca'] != '' && $_GET['cat'] != 'tutte le categorie'){
        //ricerca per prodotto e categoria
        $templateParams['prodotti'] = $dbh->getProducts($_GET['cerca'], $_GET['cat'], 1);
    } else if($_GET['cerca'] != '' && $_GET['cat'] == 'tutte le categorie'){
        //ricerca per prodotto
        $templateParams['prodotti'] = $dbh->getProducts($_GET['cerca'],'',2);
    } else if($_GET['cerca'] == '' && $_GET['cat'] != 'tutte le categorie'){
        //ricerca per categoria
        $templateParams['prodotti'] = $dbh->getProducts('',$_GET['cat'],3);
    }  
} else {
    header('Location: index.php');
}



require_once 'template/base.php';
?>