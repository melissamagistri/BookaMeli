<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Chats";
$templateParams["nome"] = "template/venditore/chats.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js", 'js/chat-venditore.js');
$templateParams['messaggi'] = $dbh->getSellerMessages($_GET['idchat']);

require_once 'template/venditore/base.php';
?>