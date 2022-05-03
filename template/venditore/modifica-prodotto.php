<section class="paddinglati">
<?php if(isset($templateParams['errore'])):?>
    <p><?php echo $templateParams['errore']?></p>
<?php endif;?>
<img class="imgcarrello" src="<?php echo UPLOAD_DIR.$templateParams['infoProdotto']['foto']?>" alt="">
    <form action="azioni-modifica-prodotto.php" method="POST" enctype="multipart/form-data">
        <ul class="ulprod">
        <li>
            <label for="img">Modifica immagine:</label>
            <input type="file" id="img" name="img">
        </li>
        <li class="displayprod space-between">
            <label for="">Titolo:</label>
            <input class="datiprodotto" type="text" name='titolo' id='titolo' value='<?php echo $templateParams['infoProdotto']['nome']?>'>
        </li>

        <li class="displayprod space-between">
            <label for="">Descrizione:</label>
            <input class="datiprodotto descriptiontextarea" type="text" name='descrizione' id='descrizione' value='<?php echo $templateParams['infoProdotto']['descrizione']?>'>
        </li>

        <li class="displayprod space-between">
            <label for="">Prezzo:</label>
            <input class="datiprodotto" type="text" name='prezzo' id='prezzo' value='<?php echo $templateParams['infoProdotto']['prezzo'].'€'?>'>
        </li>

        <li class="displayprod space-between">
            <label for="">Sconto:</label>
            <input class="datiprodotto" type="text" name='sconto' id='sconto' value='<?php echo $templateParams['infoProdotto']['sconto'].'%'?>'>
        </li>

        <li class="displayprod space-between">
            <label for="">Quantità:</label>
            <input class="datiprodotto" type="text" name='quantità' id='quantità' value='<?php echo $templateParams['infoProdotto']['quantità']?>'>
        </li>
        <li class="displayprod space-between">
            <label for="">Categoria:</label>
            <select class="selectdim" name="categoria" id="">
            <option value="nessunaCategoria">Nessuna Categoria</option>
                <?php foreach($templateParams['categorie'] as $categoria):?>
                    <option value="<?php echo $categoria['nomecategoria']?>" <?php echo ($templateParams['categoriaProdotto']['nomecategoria'] == $categoria['nomecategoria']) ? 'selected' : ''?>><?php echo $categoria['nomecategoria']?></option>
                <?php endforeach; ?>
            </select>
        </li>
        
        <li class="displayflexcenter gap2">
            <button class="bluebutton" name='azione' value = 1>Elimina prodotto</button>
            <button class="bluebutton" name='azione' value = 0>Salva Modifiche</button>
        </li>
    </ul>
    <input name="idprodotto" type="hidden" value="<?php echo $templateParams['infoProdotto']['idprodotto']?>" />
    </form>
</section>