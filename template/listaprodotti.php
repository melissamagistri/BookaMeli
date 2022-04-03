<section>
    <div class="custom-select">
        <p>Prodotti visualizzati: <label for="">num prodotti</label></p>
        <select> 
            <option value="0"><a href="">Rilevanza</a></option>
                <option value="1"><a href="">Dalla A alla Z</a></option>
                <option value="2"><a href="">Dal piu recente</a></option>
        </select>
    <?php var_dump($templateParams['prodotti']); ?>

    </div>
    <div>
      <ul class="no-padding displayflex">
      <?php for($i=0;$i<count($templateParams['prodottipopolari']);$i++):?>

        <li class="no-margin textcenter">
        <div>
        <a class="flex-a"
            href="prodotto.php?foto=<?php echo $templateParams['prodottipopolari'][$i]['foto']?> ">
          <img class="imghome <?php echo $templateParams['prodottipopolari'][$i]['quantità']==0 ? 'imgGray' : ''?>" src="<?php echo UPLOAD_DIR.$templateParams['prodottipopolari'][$i]['foto']?>" alt="<?php echo UPLOAD_DIR.$templateParams['prodottipopolari'][$i]['nome']?>">
          <div style="width:100%"><?php echo $templateParams['prodottipopolari'][$i]['nome']?></div>
        </a>
        <div class="displayflex">
          <p><?php echo $templateParams['prodottipopolari'][$i]['prezzo'].'€'?></p>
          <?php if($templateParams['prodottipopolari'][$i]['sconto']!=0): ?>
                  <p><?php echo round($templateParams['prodottipopolari'][$i]['prezzo'] - ($templateParams['prodottipopolari'][$i]['prezzo']*$templateParams['prodottipopolari'][$i]['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
            <?php endif; ?>
        </div>
    
</section>