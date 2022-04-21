<section>
    <ul>
        <li>
            <img src="" alt="">
            <form action="/action_page.php">
            <label for="img">Seleziona immagine:</label>
            <input type="file" id="img" name="img" accept="image/*">
            </form>
        </li>

        <li>
            <label for="">Titolo:</label>
            <input type="text">
        </li>

        <li>
            <label for="">Descrizione:</label>
            <input type="text">
        </li>

        <li>
            <label for="">Prezzo:</label>
            <input type="text">
        </li>

        <li>
            <label for="">Sconto:</label>
            <input type="text">
        </li>

        <li>
            <label for="">Quantità:</label>
            <input type="text">
        </li>

        <li>
            <label for="">Categoria:</label>
            <select name="" id="">
            <option value="nessunaCategoria">Nessuna Categoria</option>
                <?php foreach($templateParams['categorie'] as $categoria):?>
                    <option value=""><?php echo $categoria['nomecategoria']?></option>
                <?php endforeach; ?>
            </select>
        </li>

        <li>
            <button class="bluebutton">Elimina prodotto</button>
            <button class="bluebutton">Salva Modifiche</button>
        </li>
    </ul>
</section>