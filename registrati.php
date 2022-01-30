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
    else if(count($dbh->checkEmail($_POST['email'])) > 0){
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
        $salt = createSalt();
        //(0,0,0) == (tentativoLogin,venditore,attivo)
        $dbh->createAccount($_POST["email"], $_POST["password"], $salt, 0, 0, 0, $_POST["nome"], $_POST["cognome"]);
        //manda mail

        $msg = "Grazie per esserti iscritto a BookaMeli.
        \n Per continuare con l'utilizzo del tuo account devi verificarlo.\n
        Ti preghiamo di clickare sul link nell'email e di inserire le tue credenziali.\n 
        Buon proseguimento.\n\n\n
        \t\t http://localhost/BookaMeli/attivaaccount.php";

        sendMail($_POST["email"], "Verifica account BookaMeli", $msg);

        //fai vedere la pagina di conferma dell'email
        $templateParams["titolo"] = "BookaMeli - Attiva Account";
        $templateParams["nome"] = "template/confermaemail.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
    }
} else {
    $templateParams["titolo"] = "BookaMeli - Registrati";
    $templateParams["nome"] = "template/registrati.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/registrati.js");
}


require_once 'template/base.php';
?>