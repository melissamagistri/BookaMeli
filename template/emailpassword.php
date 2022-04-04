<section>
    <?php if(isset($templateParams['conferma'])):?>
        <p><?php echo $templateParams['conferma']?></p>
    <?php else:?>
        <p>Inserisci il tuo indirizzo di posta elettronica, ti invieremo una mail con un link per reimpostare la password.</p>
        <form action="" method='POST'>
            <label for="mail"></label>
            <input type="text" name='mail' id='mail'>
            <button type='submit' class='bluebutton'>Invia</button>
        </form>
    <?php endif;?>
</section>