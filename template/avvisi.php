<section>
    <?php if(count($templateParams['avvisi']) > 0):?>
    <ul class="no-padding displayflex">
        <?php foreach($templateParams['avvisi'] as $avviso):?>
        <li class="no-margin textcenter prodotti">
            <a class='image flex-a' href="prodotto.php?foto=<?php echo $avviso['foto']?>">
                <div>
                    <img class='imgordini' src="<?php echo UPLOAD_DIR.$avviso['foto']?>" alt="<?php echo $avviso['nome']?>">
                    <p><?php echo $avviso['nome']?></p>
                </div>
            </a>
            <form action="" method="get">
                <button class="bluebutton" name="rimuoviavviso" value="<?php echo $avviso['idprodotto']?>">Rimuovi</button>
            </form>
        </li>
        <?php endforeach;?>
    </ul>
    <?php else:?>
        <p>Non hai ancora inserito nessun prodotto per il quale vuoi essere avvisato.</p>
    <?php endif;?>
</section>