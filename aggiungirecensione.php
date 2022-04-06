<?php
require_once 'util.php';
if(isset($_POST['recensione'])){
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
?>