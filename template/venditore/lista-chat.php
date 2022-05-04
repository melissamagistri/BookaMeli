<section class="displayflexcenter">
    <ul class="custom-select">
    <?php if(count($templateParams['chats']) >0):?>
    <?php foreach($templateParams['chats'] as $chat):?>
        <li class="border-radius maringbottom">
            <a class="textcenter black" href="chats-venditore.php?idchat=<?php echo $chat['idchat']?>">
                <p><?php echo 'IDChat: '.$chat['idchat']?></p>
                <p><?php echo 'Nome user: '.$chat['nome'].' '.$chat['cognome'];?></p>
                <p><?php echo $chat['datamessaggio'] ?></p>
                <p><?php echo ($chat['venditore'] == 0) ? $chat['nome'].': '.$chat['testo'] : 'Tu'.': '.$chat['testo'];?></p>
            </a>
        </li>
        <?php endforeach;?>
    <?php else:?>
        <p>Non hai ancora nessuna chat.</p>
    <?php endif; ?>
    </ul>
</section>