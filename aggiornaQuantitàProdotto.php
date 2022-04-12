<?php
require_once 'util.php';
if(isset($_POST['aggiornaquantita'])){
    $idprodotto = $dbh->getProductIdFromName($_POST['aggiornaquantita']['nomeprodotto'])[0]['idprodotto'];
    $dbh->updateQuantityProductInCart($_SESSION['idaccount'][0]['idaccount'], $idprodotto,(int) $_POST['aggiornaquantita']['quantita']);
    $carrello = $dbh->getUserCart($_SESSION['idaccount'][0]['idaccount']);
    $totale = 0;
    foreach($carrello as $prodotto){
        if($prodotto['sconto'] == 0){
            $totale = $totale + ($prodotto['prezzo'] * $prodotto['quantita']);
        } else {
            $totale = $totale + (round($prodotto['prezzo'] - ($prodotto['prezzo']*$prodotto['sconto']/100),2,PHP_ROUND_HALF_UP)) * $prodotto['quantita'];
        }
    }
    echo 'Totale: '.$totale;
}
?>