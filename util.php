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

?>