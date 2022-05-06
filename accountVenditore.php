<?php
require_once 'util.php';

if(isUserLoggedIn()){ 
    $templateParams["titolo"] = "BookaMeli - Prodotti";
    $templateParams["nome"] = "template/venditore/prodotti.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js");
} else { 
    header('Location: login.php'); 
}

require_once 'template/venditore/base.php';
?>