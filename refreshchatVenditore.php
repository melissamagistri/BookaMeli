<?php
require_once 'util.php';

if(isset($_POST['invia'])){
    $dbh->insertMessageInChat($_POST['invia']['chat'], $_POST['invia']['messaggio'], 1);
    $messaggi = $dbh->getSellerMessages($_POST['invia']['chat']);
    $messaggio= '';
    if(count($messaggi) == 0){
        $messaggio .='<p> Non ci sono ancora messaggi </p>';
    } else {
        foreach($messaggi as $mess){
                if($mess['venditore'] == 1){
                    $sender = 'me';
                } else {
                    $sender = 'you';
                }
                if($mess['venditore'] == 1){
                    $chi = 'Tu';
                } else {
                    $chi = 'Cliente';
                }
                $messaggio.='<li class='.$sender.">
                    <div class=".'entete'.">
                        <p class='chatElement'>".$chi.'</p>
                        <p class='.'chatElement'.'>'.$mess['datamessaggio'].'</p>
                    </div>
                    <div class="message">
                        <p>'.$mess['testo'].'</p>
                    </div>
                </li>';
        }
    }
    echo $messaggio;
} else if(isset($_POST['refresh'])){
    $messaggi = $dbh->getSellerMessages($_POST['refresh']);
    $messaggio= '';
    if(count($messaggi) == 0){
        $messaggio .='<p> Non ci sono ancora messaggi </p>';
    } else {
        foreach($messaggi as $mess){
                if($mess['venditore'] == 1){
                    $sender = 'me';
                } else {
                    $sender = 'you';
                }
                if($mess['venditore'] == 1){
                    $chi = 'Tu';
                } else {
                    $chi = 'Cliente';
                }
                $messaggio.='<li class='.$sender.">
                    <div class=".'entete'.">
                        <p class='chatElement'>".$chi.'</p>
                        <p class='.'chatElement'.'>'.$mess['datamessaggio'].'</p>
                    </div>
                    <div class="message">
                        <p>'.$mess['testo'].'</p>
                    </div>
                </li>';
        }
    }
    echo $messaggio;
}

?>