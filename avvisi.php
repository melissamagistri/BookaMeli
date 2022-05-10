<?php
require_once 'util.php';
if(isUserLoggedIn()){
    $templateParams["titolo"] = "BookaMeli - Avvisi";
    $templateParams["nome"] = "template/avvisi.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
    if(isset($_GET['rimuoviavviso'])){
        $dbh->removeFromAdvice($_SESSION['idaccount'][0]['idaccount'], $_GET['rimuoviavviso']);
    }
    $templateParams['avvisi'] = $dbh->getUserAdvices($_SESSION['idaccount'][0]['idaccount']);
} else{
    header('Location: login.php');
}
require_once 'template/base.php';
?>