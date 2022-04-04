<?php if(count($templateParams["prodotto"])==0): ?>
        <div>
            <p>Articolo non presente</p>
        </div>
    <?php 
            else:
                $prodotto = $templateParams["prodotto"][0];
        ?>
<section class="displayproduct">
    <div class="displaycenter">
        <img class="imgprodotto" src="<?php echo UPLOAD_DIR.$prodotto['foto']?>" alt="<?php echo $prodotto['foto'] ?>">
    </div>

    <div class="displaycenter displayproduct flexcolumn">
        
            <h1 class="h1product"><?php echo $prodotto['nome']?></h1>
            <p><?php echo $prodotto['descrizione']?></p>
            <div class="display-inlineflex">
                <p><?php echo $prodotto['prezzo'].'€'?></p>
                <?php if($prodotto['sconto']!=0): ?>
                    <p><?php echo round($prodotto['prezzo'] - ($prodotto['prezzo']*$prodotto['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
                <?php endif; ?>

            </div>
   
                <div>
                <?php
                    if($prodotto['quantità']==0):
                ?> 
                <button class="bluebutton" >Notificami della disponibilita</button>
                <?php
                    else:
                ?> 
                <button class="bluebutton">Aggiungi al carrello</button>

                <?php
                    endif;
                ?> 
        
                </div>
         
    </div>

</section>

<section class="displayproduct">
    <?php endif; ?>
    <?php if(count($templateParams["recensioni"])!=0): ?>
        <div class="displaycenter">
            <p>Recensioni di questo prodotto</p>
            
            <ul>
                <?php for($i=0;$i<count($templateParams["recensioni"]);$i++): ?>
                <li>
                    <p><?php echo $templateParams['recensioni'][$i]['titolorecensione']?></p>
                    <p><?php echo $templateParams['recensioni'][$i]['testorecensione'] ?></p>
                    <p><?php echo $templateParams['recensioni'][$i]['voto'] ?></p>

                </li>
                <?php endfor; ?>
            </ul>
            
        </div>
</section>
<?php endif; ?>