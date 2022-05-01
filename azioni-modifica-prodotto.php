<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Categorie";
$templateParams["nome"] = var_dump($_POST);
$templateParams["js"] = array("js/jquery-3.4.1.min.js", "js/categorie.js");

    //caso in cui voglio eliminare il prodotto
    if($_POST['azione'] == 1){
        $idprodotto = $_POST['idprodotto'];
        $dbh->removeProductFromAdvice($idprodotto);
        $dbh->removeProductFromCathegory($idprodotto);
        $dbh->removeProductFromProductInCart($idprodotto);
        $dbh->removeProductFromReviews($idprodotto);
        $dbh->removeProductFromProducts($idprodotto);
        header('Location: accountVenditore.php');
    }

     //caso in cui voglio modificare il prodotto
    else if($_POST['azione'] == 0){
        
    }


    //caso in cui si vuole inserire un nuovo prodotto
    if($_POST['azione']==2){
        if(!empty($_POST['titolo']) && !empty($_POST['prezzo']) && 
            !empty($_POST['descrizione']) && !empty($_POST['sconto']) && 
            !empty($_POST['quantità']) && !empty($_POST['categoria'])){
                list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["img"]);
                if($result!=0){
                    $img = $msg;
                    $prezzo = floatval($_POST['prezzo']);
                    $sconto = intval($_POST['sconto']);
                    $quantità = intval($_POST['quantità']);
                    if($sconto >= 0 && $sconto <= 100 && $quantità >= 0 && $prezzo >=0){
                        $dbh->insertProduct($_POST['titolo'], $_POST['descrizione'], $prezzo, $sconto, $quantità, $img);
                    } else {
                        header("Location: nuovo-prodotto.php?errore=numeri"); 
                    }
                    if($_POST['categoria'] != 'nessunaCategoria'){
                        $idprodotto = $dbh->getProductIdFromName($_POST['titolo'])[0]['idprodotto'];
                        $dbh->insertProductInCathegory($idprodotto, $_POST['categoria']);
                    }
                    header('Location: accountVenditore.php');
                } else {
                    header("Location: nuovo-prodotto.php?errore=immagine");
                }
                
            }else{
                header("Location: nuovo-prodotto.php?errore=campiNonCompilati");
            } 
    } 
require_once 'template/venditore/base.php';

?>