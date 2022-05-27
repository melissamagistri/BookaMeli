<section class="displayflexcenter">

<div class="custom-select">

<label for="selettoreNotifiche" hidden>Seleziona filtro notifica</label>
    <select name="selettoreNotifiche" id="selettoreNotifiche">
        <option value="ordini">Ordini</option>
        <option value="prodotti">Prodotti</option>
        <option value="notifiche" selected>Tutte le notifiche</option>
    </select>
    <ul id='listaNotifiche'>
        <?php foreach($templateParams['notifiche'] as $notifica):?>
            <li class="border-radius notifica">
                <div class="">
                    <p><?php echo $notifica['anteprima']?></p>
                    <p><?php echo $notifica['datanotifica']?></p>
                </div>

                <div class="contenutoNotifica">
                    <p><?php echo $notifica['contenuto']?></p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>


</section>