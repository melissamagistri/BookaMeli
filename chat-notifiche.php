<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Chat e Notifiche";
$templateParams["nome"] = "template/chat-notifiche.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");

if(!isUserLoggedIn()){
    header('Location: login.php');
}

require_once 'template/base.php';
?>