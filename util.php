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
?>