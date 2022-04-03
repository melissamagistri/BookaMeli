<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Dati Personali";
$templateParams["nome"] = "template/dati-personali.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");

if(isUserLoggedIn()){
    $templateParams['info'] = $dbh->getAccountInfo($_SESSION['idaccount'][0]['idaccount']);
} else {
    header('Location: login.php');
}

require_once 'template/base.php';
?>