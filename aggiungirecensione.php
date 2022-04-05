<?php
require_once 'util.php';
if(isset($_POST['recensione'])){
    $idprodotto = $dbh->getProductIdFromName($_POST['recensione']['nomeprodotto'])[0];
    $dbh->addReview($_SESSION['idaccount'][0]['idaccount'], $idprodotto, $_POST['recensione']['titolorecensione'], $_POST['recensione']['testorecensione'], $_POST['recensione']['voto']);
}
?>