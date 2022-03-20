<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Prodotto";
$templateParams["nome"] = "template/prodotto.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/prodotto.js");

if(isset($_GET["foto"])){
    $foto = $_GET["foto"];
} 
$templateParams["prodotto"] = $dbh->getProductInfos($foto);
$templateParams['recensioni'] = $dbh->getProductReviews($templateParams["prodotto"][0]['idprodotto']);

require_once 'template/base.php';
?>