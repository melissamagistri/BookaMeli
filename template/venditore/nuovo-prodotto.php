<section class="paddinglati">
    <?php if(isset($templateParams['errore'])):?>
        <p><?php echo $templateParams['errore']?></p>
    <?php endif;?>
    <form action="azioni-modifica-prodotto.php" method="POST" enctype="multipart/form-data">
        <ul class="ulprod">
        <li>
            <label for="img">Seleziona immagine:</label>
            <input class="datiprodotto" type="file" id="img" name="img">
        </li>
        <li class="displayprod space-between"> 
            <label for="titolo">Titolo:</label>
            <input class="datiprodotto" type="text" name='titolo' id='titolo'>
        </li>

        <li class="displayprod space-between"> 
            <label for="prezzo">Prezzo:</label>
            <input class="datiprodotto" type="text" name = 'prezzo' id='prezzo'>
        </li>

        <li class="displayprod space-between"> 
            <label for="descrizione">Descrizione:</label>
            <textarea class="datiprodotto descriptiontextarea" type="text" name='descrizione' id='descrizione'> </textarea>
        </li>

        <li class="displayprod space-between"> 
            <label for="sconto">Sconto:</label>
            <input class="datiprodotto" type="text" name='sconto' id='sconto'>
        </li>

        <li class="displayprod space-between"> 
            <label for="quantità">Quantità:</label>
            <input class="datiprodotto" type="text" name='quantità' id='quantità'>
        </li>

        <li class="displayprod space-between">
            <label for="categoria">Categoria:</label>
            <select class="selectdim" name="categoria" id="categoria">
            <option value="nessunaCategoria">Nessuna Categoria</option>
                <?php foreach($templateParams['categorie'] as $categoria):?>
                    <option value='<?php echo $categoria['nomecategoria']?>'><?php echo $categoria['nomecategoria']?></option>
                <?php endforeach; ?>
            </select>
        </li>

        <li class="displayflexcenter">
            <button class="bluebutton" id='salva'>Salva</button>
        </li>
        </ul>
        <input name="azione" type="hidden" value="2" />
    </form>
</section>