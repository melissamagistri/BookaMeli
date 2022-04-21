<section class="displayflexcenter">

<div class="custom-select">

    <select name="" id="">
        <option value="">Ordini</option>
        <option value="">Prodotti</option>
    </select>
    <ul>
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