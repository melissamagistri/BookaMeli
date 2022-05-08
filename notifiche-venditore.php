<?php
require_once 'util.php';
if(isUserLoggedIn() && $_SESSION['idaccount'][0]['idaccount'] == $dbh->getSellerId()[0]['idaccount']){
    $templateParams["titolo"] = "BookaMeli - Notifiche";
    $templateParams["nome"] = "template/venditore/notifiche.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js", 'js/notifiche-venditore.js');
    $templateParams['notifiche'] = $dbh->getUserNotifications($_SESSION['idaccount'][0]['idaccount']);
} else {
    header('Location: login.php');
}


require_once 'template/venditore/base.php';
?>