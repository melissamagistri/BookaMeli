<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

    //funzione per l'invio delle mail
    function sendMail($emailDestinatario, $subject, $testo){
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bookamelishop@gmail.com';
            $mail->Password = 'bookameli';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
        
            $mail->setFrom('bookamelishop@gmail.com', 'BookaMeli');
            $mail->addCC(''.$emailDestinatario);
        
            $mail->isHTML(true); 
            $mail->Subject = ''.$subject;
            $mail->Body = ''.$testo;
        
            $mail->send();
        } catch (Exception $e) {
            echo 'Messaggio non inviato. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    //genera una stringa random di lunghezza da 5 a 10 caratteri
    function createSalt(){
        $array = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $salt = '';
        for($i=0;$i<rand(5,10);$i++){
            $salt = $salt.$array[rand(0,count($array)-1)];
        }

        return $salt;

    }

    //funzione per il controllo del login da parte dell'utente
    function isUserLoggedIn(){
        return !empty($_SESSION['idaccount']);
    }

    //funzione per la creazione della sessione
    function registerLoggedUser($user){
        $_SESSION["idaccount"] = $user;
    }

    //funzione per il check della password inserita
    function checkPassword(){
        if(strlen($_POST["password"]) > 7){
            return true;
        }
        return false;
    }

    //funzione che restituisce un array contenente le immagini che si vedono scorrere nella homepage
    function getHomeImages(){
        return array("schermata_op.png","ciao.png");
    }
    

?>