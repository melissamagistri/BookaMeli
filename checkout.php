<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Checkout";
$templateParams["nome"] = "template/checkout.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
$templateParams["userinfo"] = $dbh->getAccountInfo($_SESSION['idaccount'][0]['idaccount']);

require_once 'template/base.php';
?>