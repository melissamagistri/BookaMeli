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
        <button class="bluebutton">Notificami della disponibilita</button>
        <?php
            else:
        ?> 
        <button class="bluebutton">Aggiungi al carrello</button>

        <?php
            endif;
        ?> 
       
    </div>
</section>