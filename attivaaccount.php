<?php
require_once 'util.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $result = $dbh->checkLogin($_POST["email"], $_POST["password"], 0);
    if(count($result) > 0){
        //caso in cui le credenziali siano di un account da attivare
        $dbh->activateAccount($_POST["email"]);
        registerLoggedUser($result[0]["idaccount"]);
        $templateParams["titolo"] = "BookaMeli - Homepage";
        $templateParams["nome"] = "template/homepage.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/homepage.js");
        $templateParams["immaginihome"] = array(UPLOAD_DIR."schermataop.png",UPLOAD_DIR."ciao.png");
        $templateParams["linkimmagine"] = array("#","#");
        $templateParams["altimmagine"] = array("alt", "alt");
    } else{
        //caso in cui le credenziali non siano di un account da attivare
        $templateParams["errorelogin"] = "Le credenziali inserite sono sbagliate o non sono di un account da attivare";
        $templateParams["titolo"] = "BookaMeli - Attiva Account";
        $templateParams["nome"] = "template/attivaaccount.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
    }

} else{
    $templateParams["titolo"] = "BookaMeli - Attiva Account";
    $templateParams["nome"] = "template/attivaaccount.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
}
require_once 'template/base.php';
?>