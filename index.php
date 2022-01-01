<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - HomePage";
$templateParams["nome"] = "homepage.php";
$templateParams["link"] = array("//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css");
//i 3 template sotto servono a inserire le immagini nella homepage
$templateParams["immaginihome"] = array(UPLOAD_DIR."schermataop.png",UPLOAD_DIR."schermataop.png",UPLOAD_DIR."schermataop.png");
$templateParams["linkimmagine"] = array("#","#","#");
$templateParams["altimmagine"] = array("alt", "alt", "alt");
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/homepage.js");

require_once 'template/base.php';
?>