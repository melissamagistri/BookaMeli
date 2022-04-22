<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Aggiungi prodotto";
$templateParams["nome"] = "template/venditore/nuovo-prodotto.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js");
$templateParams['categorie'] = $dbh->getCathegories();


require_once 'template/venditore/base.php';
?>