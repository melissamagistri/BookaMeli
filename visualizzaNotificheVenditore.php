<?php
require_once('util.php');
if(isUserLoggedIn()){
    if(isset($_POST['azione'])){
        if($_POST['azione'] == 'ordini'){
            $notifiche = $dbh->getSellerNotificationsOrders();
        } else if($_POST['azione'] == 'prodotti'){
            $notifiche = $dbh->getSellerNotificationsProducts();
        } else if($_POST['azione'] == 'notifiche'){
            $notifiche = $dbh->getUserNotifications($_SESSION['idaccount'][0]['idaccount']);
        }
        $result = '';
            if(count($notifiche) > 0){
                foreach($notifiche as $notifica){
                    $elemento = '
                        <li class="border-radius notifica">
                            <div class="">
                                <p>'.$notifica['anteprima'].'</p>
                                <p>'.$notifica['datanotifica'].'</p>
                            </div>
                            <div class="contenutoNotifica">
                                <p>'.$notifica['contenuto'].'</p>
                            </div>
                        </li>
                    ';
                    $result = $result.$elemento;
                }
            } else {
                $result=$result.'
                    <li><p>Non hai ancora nessuna notifica.</p></li>
                ';
            }
        echo $result;
    }
} else {
    header("Location: login.php");
}
?>