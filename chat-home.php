<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Chat con il venditore";
$templateParams["nome"] = "template/chat-home.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
$templateParams['messaggi'] = $dbh->getUserMessages($_SESSION['idaccount'][0]['idaccount']);

require_once 'template/base.php';
?>