<?php
require_once 'util.php';
if(isset($_POST['recensione'])){
    if(!empty($_POST['recensione']['nomeprodotto']) && !empty($_POST['recensione']['titolorecensione']) && !empty($_POST['recensione']['testorecensione']) && !empty($_POST['recensione']['voto'])){
        $userReviews = $dbh->getUserReviews($_SESSION['idaccount'][0]['idaccount']);
        $idprodotto = $dbh->getProductIdFromName($_POST['recensione']['nomeprodotto'])[0]['idprodotto'];
        foreach($userReviews as $review){
            if($review['idprodotto'] == $idprodotto){
                $dbh->deleteReview($_SESSION['idaccount'][0]['idaccount'], $idprodotto);
                break;
            }
        }
        $dbh->addReview($_SESSION['idaccount'][0]['idaccount'], $idprodotto, $_POST['recensione']['titolorecensione'], $_POST['recensione']['testorecensione'], $_POST['recensione']['voto']);
    }
}

if(isset($_POST['elimina'])){
    $idprodotto = $dbh->getProductIdFromName($_POST['elimina']['nomeprodotto'])[0]['idprodotto'];
    $dbh->deleteReview($_SESSION['idaccount'][0]['idaccount'], $idprodotto);
}
?>