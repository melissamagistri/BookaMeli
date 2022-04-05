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
                <p>Ordine numero: <?php echo $templateParams['ordini'][$i]['idordine']?></p>
                <img src="<?php echo UPLOAD_DIR.'arrowDown.png'?>" alt="slider">
            </div>
            <ul class='listaProdotti'>
                <?php foreach($templateParams['prodottiinOrdine'][$i] as $ordine):?>
                <li>
                    <a href="prodotto.php?foto=<?php echo $ordine['foto']?> ">
                        <img class='imgordini' src="<?php echo UPLOAD_DIR.$ordine['foto']?>" alt="<?php echo UPLOAD_DIR.$ordine['nome']?>">
                        <div><?php echo $ordine['nome']?></div>
                    </a>
                    <p>Quantità: <?php echo $ordine['quantita']?></p>
                    <p>Prezzo: <?php echo $ordine['costo']?></p>
                    <button class='bluebutton bottonerecensione'>Inserisci recensione</button>
                    <div class='recensione'>
                    <p>Scegli una valutazione al prodotto:</p>
                    <div class="valutazione">
                        <input type="radio" id="star1" name="rate" value="5" />
                        <label for="star1" title="text">1 stella</label>
                        <input type="radio" id="star2" name="rate" value="4" />
                        <label for="star2" title="text">2 stelle</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stelle</label>
                        <input type="radio" id="star4" name="rate" value="2" />
                        <label for="star4" title="text">4 stelle</label>
                        <input type="radio" id="star5" name="rate" value="1" />
                        <label for="star5" title="text">5 stelle</label>
                    </div>
                    <div class="search">
                        <textarea class="textareadimension"  placeholder="Inserisci la tua recensione"></textarea> 
                        <button class="bluebutton">Invia</button>
                    </div>   
                </div>
                </li>
                <?php endforeach;?>
            </ul>
        </li>
         <?php endfor;/*
         <li>
         <div>
             <p>Scegli una valutazione al prodotto:</p>
             <div class="valutazione">
             <input type="radio" id="star1" name="rate" value="5" />
             <label for="star1" title="text">1 stella</label>
             <input type="radio" id="star2" name="rate" value="4" />
             <label for="star2" title="text">2 stelle</label>
             <input type="radio" id="star3" name="rate" value="3" />
             <label for="star3" title="text">3 stelle</label>
             <input type="radio" id="star4" name="rate" value="2" />
             <label for="star4" title="text">4 stelle</label>
             <input type="radio" id="star5" name="rate" value="1" />
             <label for="star5" title="text">5 stelle</label>
             </div
             <div class="search">
                 <textarea class="textareadimension"  placeholder="Inserisci la tua recensione"></textarea> 
                 <button class="bluebutton">Invia</button>
             </div>   
         </div>
         </li>
         */?>
     <?php endif;?>
     </ul>

</section>