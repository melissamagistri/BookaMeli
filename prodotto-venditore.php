<?php
require_once 'util.php';

if(isUserLoggedIn() && $_SESSION['idaccount'][0]['idaccount'] == $dbh->getSellerId()[0]['idaccount']){
    $templateParams["titolo"] = "BookaMeli - Prodotti";
    $templateParams["nome"] = "template/venditore/prodotti.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js");
} else{
    header("Location: login.php");  
}

require_once 'template/venditore/base.php';
?>