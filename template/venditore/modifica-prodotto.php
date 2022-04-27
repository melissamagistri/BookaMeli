<section class="paddinglati">
    <form action="azioni-modifica-prodotto.php" method="POST" enctype="multipart/form-data">
        <ul class="ulprod">
        <li>
            <img class="imgcarrello" src="<?php echo UPLOAD_DIR.$templateParams['infoProdotto']['foto']?>" alt="">
            <label for="img">Modifica immagine:</label>
            <input type="file" id="img" name="img">
        </li>
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
            <button class="bluebutton" name='azione' value = 1>Elimina prodotto</button>
            <button class="bluebutton" name='azione' value = 0>Salva Modifiche</button>
        </li>
    </ul>
    <input name="idprodotto" type="hidden" value="<?php echo $templateParams['infoProdotto']['idprodotto']?>" />
    </form>
</section>