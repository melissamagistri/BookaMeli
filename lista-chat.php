<?php
require_once 'util.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "BookaMeli - Chats";
    $templateParams["nome"] = "template/venditore/lista-chat.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js");


    $templateParams['chats'] = $dbh->getSellerChats(); 
} else {
    header("Location: login.php");
}

require_once 'template/venditore/base.php';
?>