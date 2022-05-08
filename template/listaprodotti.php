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
                        <form action="<?php echo isUserLoggedIn() ? '' : 'login.php'?>" method='get'>
                            <button class="bluebutton" name='notifica' value='<?php echo $templateParams['prodotti'][$i]['idprodotto']?>'>Notificami della disponibilita</button>
                        </form>
                    <?php else:?> 
                    <form action="<?php echo isUserLoggedIn() ? '' : 'login.php'?>" method='get'>
                        <button class="bluebutton" name='carrello' value='<?php echo $templateParams['prodotti'][$i]['idprodotto']?>'>Aggiungi al carrello</button>
                    </form>
                    <?php endif;?>
                </div>
                
            </li>
            <?php endfor;?>
            <?php endif;?>
      </ul>
  </div>

    
</section>