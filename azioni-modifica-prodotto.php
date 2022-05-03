<?php
require_once 'util.php';
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
            if(!empty($_POST['titolo']) && !empty($_POST['prezzo']) && 
                !empty($_POST['descrizione']) && !empty($_POST['sconto']) && 
                !empty($_POST['quantità']) && !empty($_POST['categoria'])){
            //caso in cui voglio anche cambiare l'immagine
                if($_FILES['img']['name'] != ''){
                    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["img"]);
                        if($result!=0){
                            $img = $msg;
                            $prezzo = floatval($_POST['prezzo']);
                            $sconto = intval($_POST['sconto']);
                            $quantità = intval($_POST['quantità']);
                            if($sconto >= 0 && $sconto <= 100 && $quantità >= 0 && $prezzo >=0){
                                $dbh->updateProductInformation($_POST['idprodotto'], $_POST['titolo'], $_POST['descrizione'], $prezzo, $sconto, $quantità, $img, 0);
                    } else {
                                header("Location: modifica-prodotto.php?errore=numeri"); 
                    }
                    if($_POST['categoria'] != 'nessunaCategoria'){
                                $vecchiaCategoria = $dbh->getProductCathegory($_POST['idprodotto']);
                                if(count($vecchiaCategoria) > 0){
                                    //update categoria
                                    $dbh->updateCathegoryProduct($_POST['idprodotto'], $_POST['categoria']);
                        } else {
                                    //insert category
                                    $dbh->insertProductInCathegory($_POST['idprodotto'], $_POST['categoria']);
                        }
                    }
                    //mandare notifica ai clienti in attesa o rimuovere prodotto dai carrelli se quantità = 0
                    if($quantità == 0){
                                $dbh->removeProductFromProductInCart($_POST['idprodotto']);
                    }else {
                                $users = $dbh->getUsersWaitingForAdvice($_POST['idprodotto']);
                                $nomeProdotto = $dbh->getProductInfosbyId($_POST['idprodotto'])[0]['nome'];
                                if(count($users)>0){
                                    foreach($users as $user){
                                        $contenuto='Il prodotto '.$nomeProdotto.', che avevi messo nella lista di cui avvisarti è tornato disponibile.';
                                        $anteprima= 'Nuovamente disponibile il prodotto '.$nomeProdotto.'.';
                                        $dbh->insertUserNotification($user['idaccount'], $contenuto, $anteprima);
                                        $emailDestinatario = $dbh->getUserEmail($_SESSION['idaccount'][0]['idaccount'])[0];
                                        sendMail($emailDestinatario, $anteprima, $contenuto);
                            }
                        }
                    }
                    header('Location: accountVenditore.php');
                } else {
                            header("Location: modifica-prodotto.php?errore=immagine");
                }
        } else{
                    //caso in cui non aggiorno la foto
                    $prezzo = floatval($_POST['prezzo']);
                    $sconto = intval($_POST['sconto']);
                    $quantità = intval($_POST['quantità']);
                    if($sconto >= 0 && $sconto <= 100 && $quantità >= 0 && $prezzo >=0){
                        $dbh->updateProductInformation($_POST['idprodotto'], $_POST['titolo'], $_POST['descrizione'], $prezzo, $sconto, $quantità, null, 1);
            } else {
                        header("Location: modifica-prodotto.php?errore=numeri"); 
            }
            if($_POST['categoria'] != 'nessunaCategoria'){
                        $vecchiaCategoria = $dbh->getProductCathegory($_POST['idprodotto']);
                        if(count($vecchiaCategoria) > 0){
                            //update categoria
                            $dbh->updateCathegoryProduct($_POST['idprodotto'], $_POST['categoria']);
                } else {
                            //insert category
                            $dbh->insertProductInCathegory($_POST['idprodotto'], $_POST['categoria']);
                }
            }
            //mandare notifica ai clienti in attesa o rimuovere prodotto dai carrelli se quantità = 0
            if($quantità == 0){
                        $dbh->removeProductFromProductInCart($_POST['idprodotto']);
                        echo 'si';
            }else {
                        $users = $dbh->getUsersWaitingForAdvice($_POST['idprodotto']);
                        $nomeProdotto = $dbh->getProductInfosbyId($_POST['idprodotto'])[0]['nome'];
                        if(count($users)>0){
                            foreach($users as $user){
                                $contenuto='Il prodotto '.$nomeProdotto.', che avevi messo nella lista di cui avvisarti è tornato disponibile.';
                                $anteprima= 'Nuovamente disponibile il prodotto '.$nomeProdotto.'.';
                                $dbh->insertUserNotification($user['idaccount'], $contenuto, $anteprima);
                                $emailDestinatario = $dbh->getUserEmail($_SESSION['idaccount'][0]['idaccount'])[0];
                                sendMail($emailDestinatario, $anteprima, $contenuto);
                    }
                }
            }
            header('Location: accountVenditore.php');
        }
    } else {
                header("Location: modifica-prodotto.php?errore=campiNonCompilati");
    }
}
//caso in cui si vuole inserire un nuovo prodotto
if($_POST['azione']==2){
            if(!empty($_POST['titolo']) && !empty($_POST['prezzo']) && 
                !empty($_POST['descrizione']) && !empty($_POST['sconto']) && 
                !empty($_POST['quantità']) && !empty($_POST['categoria']) && $_FILES['img']['name'] != ''){
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
?>