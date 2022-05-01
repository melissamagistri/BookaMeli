<section class="displayflexcenter">
    <p><?php var_dump( $templateParams['info']);?></p>
    <ul class="custom-select">
    <?php for($i=0;$i<count($templateParams['info']);$i++):?>
        <?php for($i=0;$i<count($templateParams['messaggi']);$i++):?>
        <li class="border-radius">
            <a href="chats-venditore.php?">
                <p><?php echo $templateParams['info'][$i]['nome'];?></p>
                <p><?php echo $templateParams['info'][$i]['cognome'];?></p>
                <p><?php echo $templateParams['messaggi'][$i]['testo'];?></p>
            </a>
        </li>
        <?php endfor;?>
    <?php endfor;?>
    </ul>
</section>