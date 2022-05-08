<?php
require_once 'util.php';

if(isUserLoggedIn() && $_SESSION['idaccount'][0]['idaccount'] == $dbh->getSellerId()[0]['idaccount']){
    $templateParams["titolo"] = "BookaMeli - Prodotti";
    $templateParams["nome"] = "template/venditore/ricerca_prodotto_modifica.php";
    $templateParams['categorie'] = $dbh->getCathegories();
    if(isset($_GET['cerca']) && isset($_GET['cat'])){
        if($_GET['cerca'] == '' && $_GET['cat'] == 'tutte le categorie'){
            header('Location: ricerca_prodotto_modifica.php');
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
    } else{
        $templateParams['prodotti'] = $dbh->getAllProducts();
    }
    $templateParams["js"] = array("js/jquery-3.4.1.min.js");
    } else{
    header("Location: login.php");
}
require_once 'template/venditore/base.php';
?>