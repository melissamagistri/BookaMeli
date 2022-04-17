<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Notifiche";
$templateParams["nome"] = "template/notifiche-home.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/notifiche-home.js");
$templateParams['notifiche'] = $dbh->getUserNotifications($_SESSION['idaccount'][0]['idaccount']);

require_once 'template/base.php';
?>