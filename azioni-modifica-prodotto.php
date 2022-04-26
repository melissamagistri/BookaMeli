<?php
    //caso in cui voglio eliminare il prodotto
    if($_POST['azione'] == 1){
        echo 'elimina';
    }

    //caso in cui voglio modificare il prodotto
    if($_POST['azione'] == 0){
        echo 'modifica';
    }
?>