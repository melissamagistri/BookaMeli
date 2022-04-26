<?php
    //caso in cui voglio eliminare il prodotto
    if($_POST['azione']['azione'] == 1){
        $prodotto = $_POST['azione']['prodotto'];
        $str = explode(' ', $prodotto);
        $idprodotto = $str[count($str)-1];
        $dbh->removeProduct($idprodotto);
        echo 'Il prodotto è stato eliminato con successo';
    }

    //caso in cui voglio modificare il prodotto
    if($_POST['azione'] == 0){
        echo 'modifica';
    }
?>