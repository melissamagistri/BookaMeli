<?php
require_once 'util.php';

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confermapassword"])){
    $result = $dbh->getId($_POST["email"]);
    if(count($result) > 0){
        //caso in cui le credenziali siano giuste
        //se la password va bene continuo se no errore
        if(($_POST["password"] == $_POST["confermapassword"]) && checkPassword($_POST["password"])){
            $dbh->activateAccount($_POST["email"]);
            $salt = createSalt();
            $dbh->changePassword($_POST["email"], $_POST["password"], $salt);
            $dbh->loginSucceed($_POST["email"]);
            registerLoggedUser($dbh->getId($_POST['email']));
            header('Location: index.php');
        } else{
            $templateParams["errorelogin"] = "La password non soddisfa i requisiti o le due inserite non corrispondono";
            $templateParams["titolo"] = "BookaMeli - Modifica Password";
            $templateParams["nome"] = "template/conferma-password.php";
            $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
        }
    }
} else{
    $templateParams["titolo"] = "BookaMeli - Conferma Account";
    $templateParams["nome"] = "template/conferma-password.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
    if(isUserLoggedIn()){
        $templateParams['email']=$dbh->getUserEmail($_SESSION['idaccount'][0]['idaccount'])[0]['email'];
    }else if(isset($_GET['email'])){
        $templateParams['email'] = $_GET['email'];
    }
}
require_once 'template/base.php';
?>