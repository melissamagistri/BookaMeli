<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - HomePage";
$templateParams["nome"] = "homepage.php";
$templateParams["link"] = array("//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css");
//i 3 template sotto servono a inserire le immagini nella homepage
$templateParams["immaginihome"] = array(UPLOAD_DIR."carrello.png",UPLOAD_DIR."facebook.png",UPLOAD_DIR."onepiece1.png");
$templateParams["linkimmagine"] = array("#","#","#");
$templateParams["altimmagine"] = array("ciao", "sono", "io");
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");

require_once 'template/base.php';
?>