<h1>Conferma Nuovi Dati</h1>
<form action="#" method="POST">
            
            
            <ul>
                <li>
                    <?php if(isset($templateParams["errorelogin"])): ?>
                    <p><?php echo $templateParams["errorelogin"]; ?></p>
                    <?php endif; ?>
                </li>
                <li>
                    <label for="Email">Email:</label>
                    <input type="text"  name="email" required/>
                </li>
                <li>
                    <label for="Password">Password:</label>
                    <input type="password"  name="password" required/>
                </li>
                <li>
                    <label for="Ripeti Password">Ripeti Password:</label>
                    <input type="password"  name="confermapassword"  required/>
                </li>
                <li class="text-center">
                    <label for="Invia"></label>
                    <input type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>