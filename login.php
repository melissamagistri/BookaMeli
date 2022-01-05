<?php
require_once 'util.php';

if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"], 1);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){

} else {
    //se login viene sbagliato 3 volte si deve cambiare la password
    $templateParams["titolo"] = "BookaMeli - Login";
    $templateParams["nome"] = "accedi.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
}
require_once 'template/base.php';
?>