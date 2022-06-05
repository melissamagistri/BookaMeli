<?php
require_once 'util.php';

$templateParams["titolo"] = "BookaMeli - Password dimenticata";
$templateParams["nome"] = "template/emailpassword.php";
$templateParams["js"] = array("js/jquery-3.4.1.min.js","js/baseScript.js");

if(isset($_POST['mail'])){
    $msg = "Reimposta la tua password qui:\n\n\n
            \t\t http://localhost/BookaMeli/conferma-password.php?email=".$_POST['mail'];
    sendMail($_POST['mail'], 'Cambio password', $msg);
    $templateParams['conferma'] = 'La mail è stata inviata con successo, per procedere seguire le istruzioni specificate nella mail.';
}

require_once 'template/base.php';
?>