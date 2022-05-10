<section>
    <?php if(count($templateParams['avvisi']) > 0):?>
    <ul>
        <?php foreach($templateParams['avvisi'] as $avviso)?>
        <li>
            <a class='image' href="prodotto.php?foto=<?php echo $avviso['foto']?>">
                <div>
                    <img class='imgordini' src="<?php echo UPLOAD_DIR.$avviso['foto']?>" alt="<?php echo $avviso['nome']?>">
                    <p><?php echo $avviso['nome']?></p>
                </div>
            </a>
            <form action="" method="get">
                <button class="bluebutton" name="rimuoviavviso" value="<?php echo $avviso['idprodotto']?>">Rimuovi</button>
            </form>
            
        </li>
    </ul>
    <?php else:?>
        <p>Non hai ancora inserito nessun prodotto per il quale vuoi essere avvisato.</p>
    <?php endif;?>
</section>