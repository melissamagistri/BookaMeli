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
                <img src="<?php echo UPLOAD_DIR.'arrowDown.png'?>" alt="slider">
            </div>
            <ul class='listaProdotti'>
                <?php foreach($templateParams['prodottiinOrdine'][$i] as $ordine):?>
                <li>
                    <a class='image' href="prodotto.php?foto=<?php echo $ordine['foto']?> ">
                        <img class='imgordini' src="<?php echo UPLOAD_DIR.$ordine['foto']?>" alt="<?php echo $ordine['nome']?>">
                        <div><?php echo $ordine['nome']?></div>
                    </a>
                    <p>Quantità: <?php echo $ordine['quantita']?></p>
                    <p>Prezzo: <?php echo $ordine['costo']?></p>
                    <?php if(!in_array($ordine['idprodotto'],$templateParams['recensioniidprodotto'])):/*controllo se l'utente ha già fatto una recensione per quel prodotto*/?>
                        <button class='bluebutton bottonerecensione'>Inserisci recensione</button>
                        <div class='recensione'>
                        <p>Scegli una valutazione al prodotto:</p>
                        <div class="valutazione">
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 stella</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stelle</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stelle</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stelle</label>
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stelle</label>
                        </div>
                        <div class="search">
                            <label for="titolo">Titolo:</label>
                            <input type="text" placeholder='Inserisci il titolo' name='titolo' id='titolo'></input>
                            <textarea class="textareadimension"  placeholder="Inserisci la tua recensione" id='recensione'></textarea> 
                            <button class="bluebutton invia">Invia</button>
                        </div>
                    <?php else:?>
                        <?php foreach($templateParams['recensioniuser'] as $recensione): ?>
                            <?php if($recensione['idprodotto'] == $ordine['idprodotto']):?>
                                <?php $rec = $recensione ?>
                                <?php break ?>
                            <?php endif;?>
                        <?php endforeach;?>

                        <button class='bluebutton bottonerecensione'>Modifica recensione</button>
                        <div class='recensione'>
                        <p>Scegli una valutazione al prodotto:</p>
                        <div class="valutazione">
                            <form action="">
                                <input type="radio" id="star1" name="rate" value="1" class='<?php echo ($rec['voto']==1) ? 'radiobuttonattivo' : '' ?>'/>
                                <label for="star1" title="text">1 stella</label>
                                <input type="radio" id="star2" name="rate" value="2" class='<?php echo ($rec['voto']==2) ? 'radiobuttonattivo' : '' ?>'/>
                                <label for="star2" title="text">2 stelle</label>
                                <input type="radio" id="star3" name="rate" value="3" class='<?php echo ($rec['voto']==3) ? 'radiobuttonattivo' : '' ?>'/>
                                <label for="star3" title="text">3 stelle</label>
                                <input type="radio" id="star4" name="rate" value="4" class='<?php echo ($rec['voto']==4) ? 'radiobuttonattivo' : '' ?>'/>
                                <label for="star4" title="text">4 stelle</label>
                                <input type="radio" id="star5" name="rate" value="5" class='<?php echo ($rec['voto']==5) ? 'radiobuttonattivo' : '' ?>'/>
                                <label for="star5" title="text">5 stelle</label>
                            </form>
                        </div>
                        <div class="search">
                            <label for="titolo">Titolo:</label>
                            <input type="text" value='<?php echo $rec['titolorecensione']?>' placeholder='Inserisci il titolo' name='titolo' id='titolo'></input>
                            <textarea class="textareadimension" placeholder="Inserisci la tua recensione" id='recensione'><?php echo $rec['testorecensione']?></textarea> 
                            <button class="bluebutton invia">Invia</button>
                            <button class='bluebutton elimina'>Elimina recensione</button>
                        </div>
                    <?php endif;?>   
                </div>
                </li>
                <?php endforeach;?>
            </ul>
        </li>
         <?php endfor;?>
     <?php endif;?>
     </ul>
</section>