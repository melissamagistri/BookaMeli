<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Prodotti";
$templateParams["nome"] = "template/listaprodotti.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");

if(isset($_GET['cerca']) && isset($_GET['cat'])){
    //ricerca per prodotto e categoria
    $templateParams['prodotti'] = $dbh->getProducts($_GET['cerca'], $_GET['cat'], 1);
} else if(isset($_GET['cerca'])){
    //ricerca per prodotto
    $templateParams['prodotti'] = $dbh->getProducts($_GET['cerca'],'',2);
} else if(isset($_GET['cat'])){
    //ricerca per categoria
    $templateParams['prodotti'] = $dbh->getProducts('',$_GET['cat'],3);
} else {
    header('Location: index.php');
}



require_once 'template/base.php';
?>