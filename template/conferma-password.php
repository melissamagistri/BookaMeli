<h2>Conferma Nuovi Dati</h2>
<form action="#" method="POST">
            
            
            <ul>
                <li>
                    <?php if(isset($templateParams["errorelogin"])): ?>
                    <p><?php echo $templateParams["errorelogin"]; ?></p>
                    <?php endif; ?>
                </li>
                <li>
                    
                    <?php if(isset($templateParams['email'])):?>
                        <label for="email">Email: <?php echo $templateParams['email']?></label>
                            <input type="text"  name="email" id="email" value='<?php echo $templateParams['email']?>' hidden/>
                        <?php else: ?>
                            <label for="email">Email:</label>
                            <input type="text"  name="email" id="email" required/>
                        <?php endif;?>
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