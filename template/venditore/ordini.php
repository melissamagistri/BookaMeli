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
                    <a class='image' href="prodotto.php?foto=<?php echo $ordine['foto']?> ">
                        <img class='imgordini' src="<?php echo UPLOAD_DIR.$ordine['foto']?>" alt="<?php echo $ordine['nome']?>">
                        <div><?php echo $ordine['nome']?></div>
                    </a>
                    <p>Quantità: <?php echo $ordine['quantita']?></p>
                    <p>Prezzo: <?php echo $ordine['costo']?></p>
                    <label for="statoOrdine">Cambia stato Ordine:</label>
                    <select name="" id="statoOrdine">
                        <option <?php echo ($templateParams['ordini'][$i]['stato']) == 0 ? '' : 'selected'?> value="consegnato">Consegnato</option>
                        <option <?php echo ($templateParams['ordini'][$i]['stato']) == 0 ? 'selected' : ''?> value="nonAncoraSpedito">Non ancora spedito</option>
                    </select>    
                </li>
                <?php endforeach;?>
            </ul>
        </li>
        <?php endfor;?>
    <?php endif;?>
    </ul>
</section>