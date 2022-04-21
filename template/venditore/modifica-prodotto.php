<section class="paddinglati">
    
        <div>
            <img class="imgcarrello"
            src="<?php echo UPLOAD_DIR.'onepiece1.png'?>" alt="">
            <form class="padding-bottom"  action="/action_page.php">
            <label for="img">Seleziona immagine:</label>
            <input type="file" id="img" name="img" accept="image/*">
            </form>
        </div>

        <ul class="ulprod">
        <li class="displayprod space-between">
            <label for="">Titolo:</label>
            <input class="datiprodotto" type="text">
        </li>

        <li class="displayprod space-between">
            <label for="">Descrizione:</label>
            <input class="datiprodotto" type="text">
        </li>

        <li class="displayprod space-between">
            <label for="">Prezzo:</label>
            <input class="datiprodotto" type="text">
        </li>

        <li class="displayprod space-between">
            <label for="">Sconto:</label>
            <input class="datiprodotto" type="text">
        </li>

        <li class="displayprod space-between">
            <label for="">Quantità:</label>
            <input class="datiprodotto" type="text">
        </li>

        <li class="displayprod space-between">
            <label for="">Categoria:</label>
            <select class="datiprodotto" name="" id="">
                <option value=""></option>
            </select>
        </li>

        <li class="displayflexcenter gap2">
            <button class="bluebutton">Elimina prodotto</button>
            <button class="bluebutton">Salva Modifiche</button>
        </li>
    </ul>
</section>