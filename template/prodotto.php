<section>
    <div>
        <img class="imgprodotto" src="<?php echo UPLOAD_DIR.'onepiece1.png'?>" alt="one-piece-vol-1">
    </div>

    <div>
        <ul>
            <li><h1>Titolo</h1></li>
            <li><p>Descrizione</p></li>
            <li><p>Prezzo</p></li>
            <li><p>Prezzo scontato</p></li>
        </ul>
    </div>
    
</section>

<section>
    <div>
        <?php
            if(isset($_SESSION)):
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
</section>