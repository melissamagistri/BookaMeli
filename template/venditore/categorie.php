<section>
    <h1 class="padding20">Scegli quale azione vuoi eseguire: </h1>

<div class="padding20 displayflexcenter gap2">
    <button class="bluebutton" id="eliminacategoria">Elimina Categoria</button>
    <button class="bluebutton" id="aggiungicategoria">Aggiungi nuova Categoria</button>
</div>

<div class="aggiungicategoria categoria gap2 displayflexcenter ">
    <input class="input" id='categoria' type="text">
    <button class="bluebutton" id='aggiungi' >Aggiungi</button>
</div>
<div class="eliminacategoria categoria gap2 displayflexcenter ">
<?php if(count($templateParams['categorie']) > 0):?>

    <select class="select selectdim" name="" id="">
    <?php foreach($templateParams['categorie'] as $categoria):?>
        <option value="<?php echo $categoria['nomecategoria']?>"><?php echo $categoria['nomecategoria']?></option>
    <?php endforeach;?>
    </select>
    <button class="bluebutton" id='elimina'>Elimina</button>

<?php else:?>
<p>Non hai ancora inserito nessuna categoria</p>
<?php endif; ?>
</div>

</section>