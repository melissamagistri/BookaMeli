<?php
require_once 'util.php';
if(isset($_POST['aggiornaquantita'])){
    $idprodotto = $dbh->getProductIdFromName($_POST['aggiornaquantita']['nomeprodotto'])[0]['idprodotto'];
    $dbh->updateQuantityProductInCart($_SESSION['idaccount'][0]['idaccount'], $idprodotto,(int) $_POST['aggiornaquantita']['quantita']);
}
?>