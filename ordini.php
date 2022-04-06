<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Ordini";
$templateParams["nome"] = "template/ordini.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/ordini.js");
if(isUserLoggedIn()){
    $templateParams['recensioniuser'] = $dbh->getUserReviews($_SESSION['idaccount'][0]['idaccount']);
    $templateParams['recensioniidprodotto'] =  []; 
    foreach($templateParams['recensioniuser'] as $recensione){
        array_push($templateParams['recensioniidprodotto'], $recensione['idprodotto']);
    } 
    $templateParams['ordini'] = $dbh->getOrders($_SESSION['idaccount'][0]['idaccount']);
    $templateParams['prodottiinOrdine'] = [];
    foreach($templateParams['ordini'] as $ordine){
        array_push($templateParams['prodottiinOrdine'], $dbh->getProductsInOrder($ordine['idordine']));
    }
    
} else {
    header('Location: login.php');
}


require_once 'template/base.php';
?>