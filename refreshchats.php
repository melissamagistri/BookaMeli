<?php
require_once 'util.php';
$messaggi = $dbh->getUserMessages($_SESSION['idaccount'][0]['idaccount']);
$messaggio= '';
if(count($messaggi) == 0){
    $messaggio .='<p> Non ci sono ancora messaggi </p>';
} else {
    foreach($messaggi as $mess){
            if($mess['venditore'] == 0){
                $sender = 'me';
            } else {
                $sender = 'you';
            }
            if($mess['venditore'] == 0){
                $chi = 'Tu';
            } else {
                $chi = 'Venditore';
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
?>