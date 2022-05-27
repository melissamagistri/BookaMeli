<section>
    <?php if(isset($templateParams['conferma'])):?>
        <p><?php echo $templateParams['conferma']?></p>
    <?php else:?>
        <p class="padding-bottom30">Inserisci il tuo indirizzo di posta elettronica, ti invieremo una mail con un link per reimpostare la password.</p>
        <form action="" method='POST' class="textcenter">
            <label for="mail">Email:</label>
            <input class="inputcat" type="text" name='mail' id='mail'>
            <button type='submit' class='bluebutton'>Invia</button>
        </form>
    <?php endif;?>
</section>