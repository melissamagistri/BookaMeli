<?php
require_once 'util.php';



// controllo se variavili sono settate corretamente, se settate si reindireizza se no visluazza errore
if(isset($_POST["metodo_pagamento"])){
    
    if($_POST["metodo_pagamento"] == 'Carta di credito' && !empty($_POST['datiNumero']) && !empty($_POST['datiNome'])){
        header('Location: confermaOrdine.php');
    } else if($_POST['metodo_pagamento'] == 'Contanti'){
        header('Location: confermaOrdine.php');
    } else{
        $templateParams['errore'] = 'Devi inserire i dati della carta.';
    }
}

$templateParams["titolo"] = "BookaMeli - Checkout";
$templateParams["nome"] = "template/checkout.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js", "js/checkout.js");
$templateParams["userinfo"] = $dbh->getAccountInfo($_SESSION['idaccount'][0]['idaccount']);

require_once 'template/base.php';
?>