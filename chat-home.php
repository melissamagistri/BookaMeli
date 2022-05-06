<?php
require_once 'util.php';
if(isUserLoggedIn()){
    $templateParams["titolo"] = "BookaMeli - Chat con il venditore";
    $templateParams["nome"] = "template/chat-home.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", 'js/chat-home.js');
    $templateParams['messaggi'] = $dbh->getUserMessages($_SESSION['idaccount'][0]['idaccount']);
    if(count($templateParams['messaggi']) == 0){
        $dbh->insertUserChat($_SESSION['idaccount'][0]['idaccount']);
    }
    if(isset($_POST['messaggio'])){
        $chat = $dbh->getUserChat($_SESSION['idaccount'][0]['idaccount'])[0]['idchat'];
        $dbh->insertMessageInChat($chat,$_POST['messaggio'], 0);
        $templateParams['messaggi'] = $dbh->getUserMessages($_SESSION['idaccount'][0]['idaccount']);
    }
} else {
    header("Location: login.php");
}

require_once 'template/base.php';
?>