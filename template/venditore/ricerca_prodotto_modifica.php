<section>
    <div class="wrap">
       <div class="search">
         <form action="" method="get">
            <select name="cat" id="cat" class='select'>
              <option value="tutte le categorie">Tutte le categorie</option>
              <?php for($i=0;$i<count($templateParams['categorie']);$i++):?>
                <option value="<?php echo $templateParams['categorie'][$i]['nomecategoria']?>"><?php echo $templateParams['categorie'][$i]['nomecategoria']?></option>
              <?php endfor;?>
            </select>
            <label for="cerca"></label>
            <input type="search" class="searchTerm" placeholder="Che cosa stai cercando?" size="50" id='cerca' name='cerca'>
            <button type="submit" class="searchButton">
              <img class="imgsearch" src="<?php echo UPLOAD_DIR."loupe.png"; ?>" alt="Cerca">
            </button>
         </form>
       </div>
    </div>

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
                    <p style='<?php echo ($templateParams['prodotti'][$i]['sconto']!=0) ? 'text-decoration: line-through; font-size:10px' : ''?>'><?php echo $templateParams['prodotti'][$i]['prezzo'].'€'?></p>
                    <?php if($templateParams['prodotti'][$i]['sconto']!=0): ?>
                    <p><?php echo round($templateParams['prodotti'][$i]['prezzo'] - ($templateParams['prodotti'][$i]['prezzo']*$templateParams['prodotti'][$i]['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <form action="modifica-prodotto.php" method='get'>
                        <button class="bluebutton" name='idprodotto' value='<?php echo $templateParams['prodotti'][$i]['idprodotto']?>'>Elimina o Modifica</button>
                    </form>
                </div>
                
            </li>
            <?php endfor;?>
            <?php endif;?>
      </ul>
  </div>

    
</section>