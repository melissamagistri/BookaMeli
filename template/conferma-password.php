<?php if(isset($templateParams['email'])):?>
<h2>Conferma Nuovi Dati</h2>
<form action="#" method="POST">  
    <ul>
        <li>
            <label for="email">Email: <?php echo $templateParams['email']?></label>
            <input type="text"  name="email" id="email" value='<?php echo $templateParams['email']?>' hidden/>
                
        </li>
        <li>
            <label for="password">Password:</label>
            <input type="password"  name="password" id="password" required/>
        </li>
        <li>
            <label for="confermaPassword">Ripeti Password:</label>
            <input type="password"  name="confermapassword" id="confermaPassword" required/>
        </li>
        <li class="text-center">
            <label for="submit"></label>
            <input type="submit" name="submit" id="submit" value="Invia" />
        </li>
    </ul>
</form>
<?php else:?>
    <p class="textcenter" >C'è stato un errore di comunicazione, si prega di riprovare più tardi</p>
<?php endif;?>