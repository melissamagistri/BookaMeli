<?php
require_once 'util.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "BookaMeli - Ordine Ricevuto";
    $templateParams["nome"] = "template/confermaOrdine.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");
    $carrello = $dbh->getUserCart($_SESSION['idaccount'][0]['idaccount']);
    if(count($carrello) != 0){
        //invia mail di conferma dell'ordine
        $messaggio = 'Il tuo ordine contenente: ';
        $notifica = "E' stato ricevuto un ordine contenente: ";
        $prezzo =  0;
        foreach($carrello as $prodotto){
            if(!empty($prodotto['sconto'])){
                $prezzo += round($prodotto['prezzo'] - ($prodotto['prezzo']*$prodotto['sconto']/100),2,PHP_ROUND_HALF_UP) * $prodotto['quantita'];
            } else {
                $prezzo += $prodotto['prezzo'] * $prodotto['quantita'];
            }
            $messaggio.=$prodotto['nome'].', ';
            $notifica.=$prodotto['quantita'].' '.$prodotto['nome'].', ';
            if(((int)$dbh->getProductQuantity($prodotto['idprodotto'])[0]['quantità'] - $prodotto['quantita']) == 0){
                $dbh->removeProductFromCarts($prodotto['idprodotto']);
                $mess = 'Il prodotto: '.$prodotto['nome'].' è terminato.';
                $dbh->insertUserNotification($dbh->getSellerId()[0]['idaccount'], $mess, 'Prodotto terminato');
                //sendMail($dbh->getSellerId()[0]['idaccount'], 'Prodotto terminato', $mess);
            }
        }
        $messaggio.='è stato ricevuto, per conoscerne lo stato consulta la schermata "I miei ordini" nel tuo profilo.';
        $templateParams["account"] = $dbh->getUserEmail($_SESSION['idaccount'][0]['idaccount'])[0]['email'];
        //sendMail($dbh->getUserEmail($_SESSION['idaccount'][0]['idaccount'])[0]['email'], 'Conferma di ricevuto ordine', $messaggio);
        //manda notifica cliente di ordine ricevuto
        $dbh->insertUserNotification($_SESSION['idaccount'][0]['idaccount'], $messaggio, 'Conferma di ricevuto ordine');
        //diminuisci quantità dei prodotti nel carrello
        foreach($carrello as $prodotto){
            $dbh->decreaseProductQuantity($prodotto['idprodotto'], $prodotto['quantita']);
        }
        //invia mail e notifica al venditore per dire che un acquisto è avvenuto
        $dbh->insertUserNotification($dbh->getSellerId()[0]['idaccount'], $notifica, 'Ordine ricevuto');
        sendMail($dbh->getUserEmail($dbh->getSellerId()[0]['idaccount']), 'Conferma di ricevuto ordine', $messaggio);
        //rimuovi dal carrello del utente tutti i prodotti e inseriscili nella tabella degli ordini
        if(count($dbh->getLastOrderId()) != 0){
            $ordineid = (int)$dbh->getLastOrderId()[0]['idordine'] + 1;
        } else {
            $ordineid = 1;
        }
         
        $dbh->insertNewOrder($ordineid, 0, $prezzo, $_SESSION['idaccount'][0]['idaccount']);
        foreach($carrello as $prodotto){
            //per ogni prodotto aggiornare data ultimo acquisto
            $dbh->changeLastBuyDate($prodotto['idprodotto']);
            $dbh->removeProductFromCart($_SESSION['idaccount'][0]['idaccount'], $prodotto['idprodotto']);
            $prezzo = 0;
            if(!empty($prodotto['sconto'])){
                $prezzo += round($prodotto['prezzo'] - ($prodotto['prezzo']*$prodotto['sconto']/100),2,PHP_ROUND_HALF_UP) * $prodotto['quantita'];
            } else {
                $prezzo += $prodotto['prezzo'] * $prodotto['quantita'];
            }
            $dbh->insertProductInOrder($ordineid, $prodotto['quantita'], $prodotto['idprodotto'], $prezzo);
        }
    } else{
        header('Location: index.php');
    }
} else {
    header('Location: login.php');
}

require_once 'template/base.php';
?>