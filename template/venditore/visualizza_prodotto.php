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
        <img class="imgprodotto <?php echo $prodotto['quantità']==0 ? 'imgGray' : ''?>" src="<?php echo UPLOAD_DIR.$prodotto['foto']?>" alt="<?php echo $prodotto['foto'] ?>">
    </div>

    <div class="displaycenter displayproduct flexcolumn width50 inlineprodotto">
        
        <h2 class="h1product"><?php echo $prodotto['nome']?></h2>
        <p class="textalingjustify"><?php echo $prodotto['descrizione']?></p>
        <div class="inlineflex">
            <p><?php echo $prodotto['prezzo'].'€'?></p>
            <?php if($prodotto['sconto']!=0): ?>
                <p><?php echo round($prodotto['prezzo'] - ($prodotto['prezzo']*$prodotto['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
            <?php endif; ?>

        </div>
    </div>

</section>

<section class="displayproduct">
    <?php endif; ?>
    <?php if(count($templateParams["recensioni"])!=0): ?>
        <div class="displaycenter">
            <p>Recensioni di questo prodotto: </p>
            
            <ul>
                <?php for($i=0;$i<count($templateParams["recensioni"]);$i++): ?>
                <li>
                    <p class="padding-bottom5"><?php echo $templateParams['recensioni'][$i]['nome'].' '.$templateParams['recensioni'][$i]['cognome'] ?></p>
                    <p class="padding-bottom5"><?php echo $templateParams['recensioni'][$i]['voto'] ?> su 5</p>
                    <p class="padding-bottom5 boldtext"><?php echo $templateParams['recensioni'][$i]['titolorecensione']?></p>
                    <p class="padding-bottom5"><?php echo $templateParams['recensioni'][$i]['testorecensione'] ?></p>
                </li>
                <?php endfor; ?>
            </ul>
            
        </div>
</section>
<?php endif; ?>