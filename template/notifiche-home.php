<section class="displayflexcenter">

<div class="custom-select">
    <ul>
        <?php if(count($templateParams['notifiche']) > 0):?>
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
        <?php else:?>
            <li><p>Non hai ancora nessuna notifica.</p></li>
        <?php endif;?>
    </ul>
</div>


</section>