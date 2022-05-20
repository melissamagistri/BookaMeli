<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_STRICT);
session_start();
define("UPLOAD_DIR", "./upload/");
require_once "utils/functions.php";
require_once "database/database.php";
$dbh = new Database("localhost", "root", "", "BookaMeli", 3306);
//template per l'inserimento dei prodotti nel carrello, si accerta prima che l'utente sia loggato
if(isUserLoggedIn()){
    $templateParams['prodottiCarrello'] = $dbh->getUserCart($_SESSION["idaccount"][0]['idaccount']);
} else {
    $templateParams['prodottiCarrello'] = [];
}

//funzione per la rimozione di un prodotto dal carrello
if(isset($_GET['rimuovi'])){
    $dbh->removeProductFromCart($_SESSION['idaccount'][0]['idaccount'], (int)$_GET['rimuovi'][0]);
    //refresha la pagina per la corretta visualizzazione del carrello
    $url = $_SERVER['REQUEST_URI'];
    $suburl = explode('?', $url);
    $url = '';
    for($i=0;$i<count($suburl)-1;$i++){
        $url = $url.$suburl[$i];
    }
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

//funzione per l'inserimento di un prodotto nel carrello
if(isUserLoggedIn()){
    if(isset($_GET['carrello']) && ($dbh->getProductQuantity($_GET['carrello'])[0]['quantità'] != 0)){
        $dbh->addProductToCart($_SESSION['idaccount'][0]['idaccount'], $_GET['carrello']);
        //refresha la pagina per la corretta visualizzazione del carrello
        $url = $_SERVER['REQUEST_URI'];
        $suburl = explode('?', $url);
        $url = '';
        for($i=0;$i<count($suburl)-1;$i++){
            $url = $url.$suburl[$i];
        }
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }

    //funzione per l'inserimento del cliente nella lista dei clienti da avvisare quando un prodotto torna disponibile
    if(isset($_GET['notifica']) && ($dbh->getProductQuantity($_GET['notifica'])[0]['quantità'] == 0)){
        $dbh->addUserToNotifyList($_SESSION['idaccount'][0]['idaccount'], $_GET['notifica']);
        //refresha la pagina per la corretta visualizzazione del carrello
        $url = $_SERVER['REQUEST_URI'];
        $suburl = explode('?', $url);
        $url = '';
        for($i=0;$i<count($suburl)-1;$i++){
            $url = $url.$suburl[$i];
        }
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
}

?>