<?php
require_once 'util.php';

//controllo se i campi post sono settatti
if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confermapassword"])){
    //controllo se tutti i campi sono stati riempiti
    if(empty($_POST["nome"]) || empty($_POST["cognome"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confermapassword"])){
        $templateParams["errorelogin"] = "Uno dei campi non è stato compilato.";
        $templateParams["titolo"] = "BookaMeli - Registrati";
        $templateParams["nome"] = "template/registrati.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/registrati.js");
    
    }
    //controllo che la mail inserita non sia gia in uso
    else if(!checkEmail()){
        $templateParams["titolo"] = "BookaMeli - Registrati";
        $templateParams["nome"] = "template/registrati.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/registrati.js");
        $templateParams["errorelogin"] = "L'email inserita è gia in uso";
    }
    //controllo che la password soddisfi i requisiti
    else if(!checkPassword()){
        $templateParams["titolo"] = "BookaMeli - Registrati";
        $templateParams["nome"] = "template/registrati.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/registrati.js");
        $templateParams["errorelogin"] = "La password inserita è piu corta di 8 caratteri.";
    }
    //controllo che la password di conferma sia uguale alla password
    else if($_POST["password"] != $_POST["confermapassword"]){
        $templateParams["titolo"] = "BookaMeli - Registrati";
        $templateParams["nome"] = "template/registrati.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/registrati.js");
        $templateParams["errorelogin"] = "La password di conferma inserita non corrisponde alla password.";
    }
    else{
        //inserisci dati db

        //manda mail
        //fai vedere la pagina di conferma dell'email
        $templateParams["titolo"] = "BookaMeli - Verifica Account";
        $templateParams["nome"] = "template/verificaAccount.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
    

    }
} else {
    $templateParams["titolo"] = "BookaMeli - Registrati";
    $templateParams["nome"] = "template/registrati.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/registrati.js");
}


require_once 'template/base.php';
?>