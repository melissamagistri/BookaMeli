<?php
require_once 'util.php';
if(isUserLoggedIn() && $_SESSION['idaccount'][0]['idaccount'] == $dbh->getSellerId()[0]['idaccount']){
    $templateParams["titolo"] = "BookaMeli - Ordini";
    $templateParams["nome"] = "template/venditore/ordini.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js", 'js/ordiniVenditore.js');
    $templateParams['ordini'] = $dbh->getAllOrders();
    $templateParams['prodottiinOrdine'] = [];
    foreach($templateParams['ordini'] as $ordine){
        array_push($templateParams['prodottiinOrdine'], $dbh->getProductsInOrder($ordine['idordine']));
    }
} else {
    header('Location: login.php');
}


require_once 'template/venditore/base.php';
?>