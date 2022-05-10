<?php
require_once 'util.php';
if(isset($_POST['statoOrdine'])){
    //cambia stato dell'ordine
    $stato = $_POST['statoOrdine']['stato'] == 'consegnato' ? 1 : 0;
    $dbh->changeOrderState($_POST['statoOrdine']['idordine'], $stato);
}
?>