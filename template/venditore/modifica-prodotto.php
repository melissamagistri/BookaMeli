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
            <input class="datiprodotto" type="text" value='<?php echo $templateParams['infoProdotto']['nome']?>'>
        </li>

        <li class="displayprod space-between">
            <label for="">Descrizione:</label>
            <input class="datiprodotto" type="text" value='<?php echo $templateParams['infoProdotto']['descrizione']?>'>
        </li>

        <li class="displayprod space-between">
            <label for="">Prezzo:</label>
            <input class="datiprodotto" type="text" value='<?php echo $templateParams['infoProdotto']['prezzo'].'€'?>'>
        </li>

        <li class="displayprod space-between">
            <label for="">Sconto:</label>
            <input class="datiprodotto" type="text" value='<?php echo $templateParams['infoProdotto']['sconto'].'%'?>'>
        </li>

        <li class="displayprod space-between">
            <label for="">Quantità:</label>
            <input class="datiprodotto" type="text" value='<?php echo $templateParams['infoProdotto']['quantità']?>'>
        </li>
        <li class="displayprod space-between">
            <label for="">Categoria:</label>

            <select name="" id="">
            <option value="nessunaCategoria" <?php echo ($templateParams['categoriaProdotto']['nomecategoria'] == 'Nessuna Categoria') ? 'selected' : ''?>>Nessuna Categoria</option>
                <?php foreach($templateParams['categorie'] as $categoria):?>
                    <option value="" <?php echo ($templateParams['categoriaProdotto']['nomecategoria'] == $categoria['nomecategoria']) ? 'selected' : ''?>><?php echo $categoria['nomecategoria']?></option>
                <?php endforeach; ?>
            </select>
        </li>

        <li class="displayflexcenter gap2">
            <button class="bluebutton">Elimina prodotto</button>
            <button class="bluebutton">Salva Modifiche</button>
        </li>
    </ul>
</section>