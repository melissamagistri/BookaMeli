<?php
require_once 'util.php';
if(isUserLoggedIn()){
$templateParams["titolo"] = "BookaMeli - Categorie";
$templateParams["nome"] = "template/venditore/categorie.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js", "js/categorie.js");
$templateParams['categorie'] = $dbh->getCathegories();
} else {
    header("Location: login.php");
}

require_once 'template/venditore/base.php';
?>