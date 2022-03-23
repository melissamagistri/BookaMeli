<?php if(count($templateParams["prodotto"])==0): ?>
        <div>
            <p>Articolo non presente</p>
    </div>
    <?php 
            else:
                $prodotto = $templateParams["prodotto"][0];
        ?>
<section>
    <div>
        <img class="imgprodotto" src="<?php echo UPLOAD_DIR.$prodotto['foto']?>" alt="<?php echo $prodotto['foto'] ?>">
    </div>

    <div>
        <ul>
            <li><h1><?php echo $prodotto['nome']?></h1></li>
            <li><p><?php echo $prodotto['descrizione']?></p></li>
            <li><p><?php echo $prodotto['prezzo'].'€'?></p></li>
            <?php if($prodotto['sconto']!=0): ?>
                <li><p><?php echo round($prodotto['prezzo'] - ($prodotto['prezzo']*$prodotto['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p></li>
            <?php endif; ?>

            <li>
                <div>
                <?php
                    if($prodotto['quantità']==0):
                ?> 
                <a class="bluebutton" href="">Notificami della disponibilita</a>
                <?php
                    else:
                ?> 
                <a class="bluebutton" href="">Aggiungi al carrello</a>

                <?php
                    endif;
                ?> 
        
                </div>
            </li>
        </ul>
    </div>

</section>

<section>
    <?php endif; ?>
    <?php if(count($templateParams["recensioni"])!=0): ?>
        <div>
            <p>Recensioni di questo prodotto</p>
            <?php for($i=0;$i<count($templateParams["recensioni"]);$i++): ?>
            <ul>
                <li>
                    <p><?php echo $templateParams['recensioni'][$i]['titolorecensione']?></p>
                    <p><?php echo $templateParams['recensioni'][$i]['testorecensione'] ?></p>
                    <p><?php echo $templateParams['recensioni'][$i]['voto'] ?></p>

                </li>
            </ul>
            <?php endfor; ?>
        </div>
</section>
<?php endif; ?>