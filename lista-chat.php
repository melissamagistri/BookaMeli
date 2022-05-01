<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Chats";
$templateParams["nome"] = "template/venditore/lista-chat.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js");


$templateParams['messaggi'] = $dbh->getChatsInfo($idchats);
$templateParams['info'] = $dbh->getChatsUser($idaccount);


require_once 'template/venditore/base.php';
?>