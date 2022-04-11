<section>
    <div>
        <ul class="no-padding displayflex">
            <?php if(count($templateParams['prodotti']) == 0):?>
                <p>La tua ricerca non ha prodotto risultati.</p>
            <?php else:?>

            <?php for($i=0;$i<count($templateParams['prodotti']);$i++):?>

            <li class="no-margin textcenter prodotti">
                <div>
                <a class="flex-a"
                    href="prodotto.php?foto=<?php echo $templateParams['prodotti'][$i]['foto']?> ">
                    <img class="imghome <?php echo $templateParams['prodotti'][$i]['quantità']==0 ? 'imgGray' : ''?>" src="<?php echo UPLOAD_DIR.$templateParams['prodotti'][$i]['foto']?>" alt="<?php echo UPLOAD_DIR.$templateParams['prodotti'][$i]['nome']?>">
                    <div><?php echo $templateParams['prodotti'][$i]['nome']?></div>
                </a>
                <div class="display-inlineflex">
                    <p><?php echo $templateParams['prodotti'][$i]['prezzo'].'€'?></p>
                    <?php if($templateParams['prodotti'][$i]['sconto']!=0): ?>
                    <p><?php echo round($templateParams['prodotti'][$i]['prezzo'] - ($templateParams['prodotti'][$i]['prezzo']*$templateParams['prodotti'][$i]['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <?php if($templateParams['prodotti'][$i]['quantità']==0):?>
                    <button class="bluebutton" onclick="window.location.href='<?php echo isUserLoggedIn() ? '?notifica='.$templateParams['prodotti'][$i]['idprodotto'] : 'login.php'?>';">Notificami della disponibilita</button>
                    <?php else:?> 
                    <button class="bluebutton" onclick="window.location.href='<?php echo isUserLoggedIn() ? '?carrello='.$templateParams['prodotti'][$i]['idprodotto'] : 'login.php'?>';">Aggiungi al carrello</button>
                    <?php endif;?>
                </div>
                
            </li>
            <?php endfor;?>
            <?php endif;?>
      </ul>
  </div>

    
</section>