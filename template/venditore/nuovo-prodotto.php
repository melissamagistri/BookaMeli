<section class="paddinglati">
    
        <div>
            <label for="img">Seleziona immagine:</label>
            <input class="datiprodotto" type="file" id="img" name="img" accept="image">
        </div>

        <ul class="ulprod">
        <li class="displayprod space-between"> 
            <label for="">Titolo:</label>
            <input class="datiprodotto" type="text">
        </li>

        <li class="displayprod space-between"> 
            <label for="">Prezzo:</label>
            <input class="datiprodotto" type="text">
        </li>

        <li class="displayprod space-between"> 
            <label for="">Descrizione:</label>
            <textarea class="datiprodotto" type="text"> </textarea>
        </li>

        <li class="displayprod space-between"> 
            <label for="">Sconto:</label>
            <input class="datiprodotto" type="text">
        </li>

        <li class="displayprod space-between"> 
            <label for="">Quantità:</label>
            <input class="datiprodotto" type="text">
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

        <li class="displayflexcenter">
            <button class="bluebutton">Salva</button>
        </li>
    </ul>
</section>