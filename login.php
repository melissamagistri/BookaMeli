<?php
require_once 'util.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"], 1);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username e/o password!";
        //aggiunge 1 ai tentativi di login
        $dbh->loginFailed($_POST["email"]);
        //login failed e disable account funzionano, mi da errori con getLoginAttemps
        
        //dopo 3 tentativi di login falliti la password deve essere cambiata e l'account viene disabilitato temporaneamente
       /* if($dbh->getLoginAttemps($_POST["email"])[0]>2){
            //invia la mail per cambiare la password, disabilita temporaneamente l'account
            $dbh->disableAccount($_POST["email"]);
            //invia la mail per il cambio password
            $msg = "Abbiamo notato che ci sono stati vari tentativi di accesso falliti, per ragioni di sicurezza quindi chiediamo di cambiare la password.
            \n Per continuare con l'utilizzo del tuo account devi modificare la password.\n
            Ti preghiamo di clickare sul link nell'email e di inserire le tue nuove credenziali.\n 
            Buon proseguimento.\n\n\n
            \t\t http://localhost/BookaMeli/attivaaccount.php";

            sendMail($_POST["email"], "Verifica account BookaMeli", $msg);
        }*/
    }
    else{
        $dbh->loginSucceed($_POST["email"]);
        $templateParams["titolo"] = "BookaMeli - Il tuo account";
        $templateParams["nome"] = "template/account.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
    }
}


if(isUserLoggedIn()){
    //aggiumgere template visualizzazione info dell'account
} else {
    $templateParams["titolo"] = "BookaMeli - Login";
    $templateParams["nome"] = "template/accedi.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
}
require_once 'template/base.php';
?>