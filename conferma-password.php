<?php
require_once 'util.php';

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confermapassword"])){
    $result = $dbh->getId($_POST["email"]);
    if(count($result) > 0){
        //caso in cui le credenziali siano di un account da attivare
        //se la password va bene continuo se no errore
        if(($_POST["password"] == $_POST["confermapassword"]) && checkPassword($_POST["password"])){
            $dbh->activateAccount($_POST["email"]);
            registerLoggedUser($result[0]["idaccount"]);
            $salt = createSalt();
            $dbh->changePassword($_POST["email"], $_POST["password"], $salt);
            $templateParams["titolo"] = "BookaMeli - Homepage";
            $templateParams["nome"] = "template/homepage.php";
            $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/homepage.js");
            $templateParams["immaginihome"] = getHomeImages();
        } else{
            $templateParams["errorelogin"] = "La password non soddisfa i requisiti o non le due inserite non corrispondono";
            $templateParams["titolo"] = "BookaMeli - Modifica Password";
            $templateParams["nome"] = "template/conferma-password.php";
            $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
        }
    } else{
        //caso in cui le credenziali non siano di un account da attivare
        $templateParams["errorelogin"] = "Le credenziali inserite sono sbagliate";
        $templateParams["titolo"] = "BookaMeli - Modifica Password";
        $templateParams["nome"] = "template/conferma-password.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
    }

} else{
    $templateParams["titolo"] = "BookaMeli - Conferma Account";
    $templateParams["nome"] = "template/conferma-password.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
}
require_once 'template/base.php';
?>