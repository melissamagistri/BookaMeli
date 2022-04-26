<?php
require_once 'util.php';

if(isset($_GET['idprodotto'])){
    $templateParams["titolo"] = "BookaMeli - Modifica prodotto";
    $templateParams["nome"] = "template/venditore/modifica-prodotto.php";
    $templateParams["js"] = array("js/jquery-3.4.1.min.js", 'js/modifica-prodotto.js');
    $templateParams['categorie'] = $dbh->getCathegories();
    $templateParams['categoriaProdotto'] = $dbh->getProductCathegory($_GET['idprodotto']);
    if(count($templateParams['categoriaProdotto']) == 0){
        $templateParams['categoriaProdotto']['nomecategoria'] = 'Nessuna Categoria';
    } else {
        $templateParams['categoriaProdotto'] = $templateParams['categoriaProdotto'][0];
    }
    $templateParams['infoProdotto'] = $dbh->getProductInfosbyId($_GET['idprodotto'])[0];
} else {
    header('Location: accountVenditore.php');
}



require_once 'template/venditore/base.php';
?>