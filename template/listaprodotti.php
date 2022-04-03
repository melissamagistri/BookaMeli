<section>
    <div class="custom-select">
        <p>Prodotti visualizzati: <label for="">num prodotti</label></p>
        <select> 
            <option value="0"><a href="">Rilevanza</a></option>
                <option value="1"><a href="">Dalla A alla Z</a></option>
                <option value="2"><a href="">Dal piu recente</a></option>
        </select>
    <?php var_dump($templateParams['prodotti']); ?>
        <ul>
            <li>
            <a href="">
                <img class="imghome"src="<?php echo UPLOAD_DIR.'onepiece1.png'?>" alt="one piece 1">
                <p>Titotlo</p>
            </a>
            <p>prezzo</p>
            <button href="" class="bluebutton">Aggiugi al carrello</button>
            </li>
        </ul>
    </div>
</section>