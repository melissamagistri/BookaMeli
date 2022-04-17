<section class="displayflexcenter">

<div class="custom-select">
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