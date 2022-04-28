<?php
require_once('util.php');

if(isset($_POST['azione'])){
    //caso in cui si voglia inserire una nuova categoria
    if($_POST['azione']['azione'] == 1){
        if($_POST['azione']['categoria']==''){
            echo 'Devi inseire il nome della categoria che vuoi inserire';
        } else{
            $dbh->insertCathegory($_POST['azione']['categoria']);
            echo 'La categoria è stata inserita correttamente';
        }
    }
    //caso in cui si voglia eliminare una categoria
    else if($_POST['azione']['azione'] == 2){

    }
}

?>