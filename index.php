<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - HomePage";
$templateParams["nome"] = "homepage.php";
//template per l'inserimento delle immagini che scorrono
$templateParams["immaginihome"] = getHomeImages();
//template per l'inserimento dei prodotti nuovi
$templateParams['prodottinuovi'] = $dbh->getNewProducts();
//template per l'inserimento dei prodotti popolari
$templateParams['prodottipopolari'] = $dbh->getPopularProducts();
//template per l'inserimento delle categorie nella ricerca
$templateParams["categorie"] = $dbh->getCathegories();

$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/homepage.js");

require_once 'template/base.php';
?>