<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - HomePage";
$templateParams["nome"] = "homepage.php";
$templateParams["link"] = array("//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css");
//template per l'inserimento delle immagini che scorrono
$templateParams["immaginihome"] = getHomeImages();

$templateParams['prodottinuovi'] = $dbh->getNewProducts();
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/homepage.js");

require_once 'template/base.php';
?>