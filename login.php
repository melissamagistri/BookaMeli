<?php
require_once 'util.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $dbh->checkEmail($_POST['email']);
    if(count($email) > 0){
        $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"], 1);
        if(count($login_result)==0){
            //Login fallito
            $templateParams["errorelogin"] = "Errore! Controllare username e/o password!";
            
                
            //aggiunge 1 ai tentativi di login
            $dbh->loginFailed($_POST["email"]);
            //login failed e disable account funzionano, mi da errori con getLoginAttemps
            //dopo 3 tentativi di login falliti la password deve essere cambiata e l'account viene disabilitato temporaneamente
            if($dbh->getLoginAttemps($_POST["email"])[0]["tentativoLogin"]>2){
                //invia la mail per cambiare la password, disabilita temporaneamente l'account
                $dbh->disableAccount($_POST["email"]);
                //invia la mail per il cambio password
                $msg = "Abbiamo notato che ci sono stati vari tentativi di accesso falliti, per ragioni di sicurezza quindi chiediamo di cambiare la password.
                \n Per continuare con l'utilizzo del tuo account devi modificare la password.\n
                Ti preghiamo di clickare sul link nell'email e di inserire le tue nuove credenziali.\n 
                Buon proseguimento.\n\n\n
                \t\t http://localhost/BookaMeli/conferma-password.php".'?email='.$_POST['email'];

                sendMail($_POST["email"], "Verifica account BookaMeli", $msg);
            }
        }else{
            $dbh->loginSucceed($_POST["email"]);
            registerLoggedUser($dbh->getId($_POST['email']));
            $templateParams["titolo"] = "BookaMeli - Il tuo account";
            $templateParams["nome"] = "template/account.php";
            $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
            //refresha la pagina per visualizzare correttamente i prodotti all'interno del carrello
            ob_start();
            header('Refresh:0');
            ob_end_flush();
            die();
        }
    }
    $templateParams["errorelogin"] = "Errore! Controllare username e/o password!";
    
}

//controlla se l'user ?? loggato
if(isUserLoggedIn()){
    //controlla se l'user loggato ?? un cliente o un venditore
    if($dbh->userIsClient($_SESSION['idaccount'][0]['idaccount'])[0]['venditore'] == 0){
        //in questo caso l'utente ?? un cliente
        $templateParams["titolo"] = "BookaMeli - Il tuo account";
        $templateParams["nome"] = "template/info-account.php";
        $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
    } else{
        //in questo caso l'utente ?? il venditore
        $prodotti = $dbh->getProductNotSelled();
        foreach($prodotti as $prodotto){
            $anteprima = 'Prodotto non venduto da tempo';
            $contenuto = 'Il prodotto: '.$prodotto['nome'].' non ?? stato venduto da piu di 3 mesi';
            $dbh->insertUserNotification($dbh->getSellerId()[0]['idaccount'], $contenuto, $anteprima);
        }
        header('Location: accountVenditore.php');
    }

} else {
    $templateParams["titolo"] = "BookaMeli - Login";
    $templateParams["nome"] = "template/accedi.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
}
require_once 'template/base.php';
?>