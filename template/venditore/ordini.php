<h1>Storico Ordini</h1>
<section>
    <ul>
     <?php if(count($templateParams['ordini']) == 0):?>
        <li><p>Non hai ancora eseguito nessun ordine.</p></li>
     <?php else: ?>
         <?php for($i=0;$i<count($templateParams['ordini']);$i++):?>
        <li>
            <div class='displayflex divlistaProdotti'>
                <p>Ordine effettuato il: <?php echo $templateParams['ordini'][$i]['dataordine']?></p>
                <p>Totale: <?php echo $templateParams['ordini'][$i]['prezzo'].'€'?></p>
                <p>Stato: <?php echo ($templateParams['ordini'][$i]['stato']) == 0 ? 'Non ancora spedito' : 'Consegnato'?></p>
                <p>Ordine numero: <?php echo $templateParams['ordini'][$i]['idordine']?></p>
                <p hidden><?php echo $templateParams['ordini'][$i]['idordine']?></p>
                <img src="<?php echo UPLOAD_DIR.'arrowDown.png'?>" alt="slider">
            </div>
            <ul class='listaProdotti textcenter padding-bottom'>
                <?php foreach($templateParams['prodottiinOrdine'][$i] as $ordine):?>
                <li class="padding-bottom">
                    <a class='image padding-bottom5' href="visualizza_prodotto.php?foto=<?php echo $ordine['foto']?> ">
                        <img class='imgordini padding-bottom10' src="<?php echo UPLOAD_DIR.$ordine['foto']?>" alt="<?php echo $ordine['nome']?>">
                        <div class="padding-bottom5"><?php echo $ordine['nome']?></div>
                    </a>
                    <p class="padding-bottom5">Quantità: <?php echo $ordine['quantita']?></p>
                    <p class="padding-bottom5">Prezzo: <?php echo $ordine['costo']?></p>
                       
                </li>
                <?php endforeach;?>
                <li>
                    <label for="statoOrdine<?php echo $templateParams['ordini'][$i]['idordine']?>">Cambia stato Ordine:</label>
                    <select class="padding-bottom5 select" name="" id="statoOrdine<?php echo $templateParams['ordini'][$i]['idordine']?>">
                        <option <?php echo ($templateParams['ordini'][$i]['stato']) == 0 ? '' : 'selected'?> value="consegnato">Consegnato</option>
                        <option <?php echo ($templateParams['ordini'][$i]['stato']) == 0 ? 'selected' : ''?> value="nonAncoraSpedito">Non ancora spedito</option>
                    </select> 
                </li>
            </ul>
        </li>
        <?php endfor;?>
    <?php endif;?>
    </ul>
</section>