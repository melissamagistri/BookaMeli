<section>
    <div class="custom-select">
        <p>Prodotti visualizzati: <label for="">num prodotti</label></p>
        <select> 
            <option value="0"><a href="">Rilevanza</a></option>
                <option value="1"><a href="">Dalla A alla Z</a></option>
                <option value="2"><a href="">Dal piu recente</a></option>
        </select>
    </div>
    <div>
        <ul class="no-padding displayflex">
            <?php for($i=0;$i<count($templateParams['prodotti']);$i++):?>

            <li class="no-margin textcenter prodotti">
                <div>
                <a class="flex-a"
                    href="prodotto.php?foto=<?php echo $templateParams['prodotti'][$i]['foto']?> ">
                    <img class="imghome <?php echo $templateParams['prodotti'][$i]['quantità']==0 ? 'imgGray' : ''?>" src="<?php echo UPLOAD_DIR.$templateParams['prodotti'][$i]['foto']?>" alt="<?php echo UPLOAD_DIR.$templateParams['prodotti'][$i]['nome']?>">
                    <div style="width:100%"><?php echo $templateParams['prodotti'][$i]['nome']?></div>
                </a>
                <div class="displayflex">
                    <p><?php echo $templateParams['prodotti'][$i]['prezzo'].'€'?></p>
                    <?php if($templateParams['prodotti'][$i]['sconto']!=0): ?>
                    <p><?php echo round($templateParams['prodotti'][$i]['prezzo'] - ($templateParams['prodotti'][$i]['prezzo']*$templateParams['prodotti'][$i]['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
                    <?php endif; ?>
                </div>
                <?php if($templateParams['prodotti'][$i]['quantità']==0):?>
                <a href="<?php echo isUserLoggedIn() ? '?notifica='.$templateParams['prodotti'][$i]['idprodotto'] : 'login.php'?>"> 
                <button class="bluebutton">Notificami della disponibilita</button>
                </a>
                <?php else:?> 
                <a href="<?php echo isUserLoggedIn() ? '?carrello='.$templateParams['prodotti'][$i]['idprodotto'] : 'login.php'?>">
                <button class="bluebutton" >Aggiungi al carrello</button>
                </a>
                <?php endif;?>
            </li>
            <?php endfor;?>
      </ul>
  </div>

    
</section>