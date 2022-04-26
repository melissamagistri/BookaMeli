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

    function uploadImage($path, $image){
        $imageName = basename($image["name"]);
        $fullPath = $path.$imageName;
        
        $maxKB = 500;
        $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
        $result = 0;
        $msg = "";
        //Controllo se immagine è veramente un'immagine
        $imageSize = getimagesize($image["tmp_name"]);
        if($imageSize === false) {
            $msg .= "File caricato non è un'immagine! ";
        }
        //Controllo dimensione dell'immagine < 500KB
        if ($image["size"] > $maxKB * 1024) {
            $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
        }
    
        //Controllo estensione del file
        $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
        if(!in_array($imageFileType, $acceptedExtensions)){
            $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
        }
    
        //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
        if (file_exists($fullPath)) {
            $i = 1;
            do{
                $i++;
                $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
            }
            while(file_exists($path.$imageName));
            $fullPath = $path.$imageName;
        }
    
        //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
        if(strlen($msg)==0){
            if(!move_uploaded_file($image["tmp_name"], $fullPath)){
                $msg.= "Errore nel caricamento dell'immagine.";
            }
            else{
                $result = 1;
                $msg = $imageName;
            }
        }
        return array($result, $msg);
    }

?>