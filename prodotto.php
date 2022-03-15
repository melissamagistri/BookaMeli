<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Prodotto";
$templateParams["nome"] = "template/prodotto.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/prodotto.js");

if(isset($_GET["id"])){
    $idprodotto = $_GET["id"];
} 
$templateParams["prodotto"] = $dbh->getProductInfos($idprodotto);
$templateParams['recensioni'] = $dbh->getProductReviews($idprodotto);

require_once 'template/base.php';
?>