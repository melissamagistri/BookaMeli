<form action="#" method="POST">
            <h1>Conferma Nuovi Dati</h1>
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <input type="text"  name="email" placeholder="Email" required/>
                </li>
                <li>
                    <input type="password"  name="password" placeholder="Password" required/>
                </li>
                <li>
                    <input type="password"  name="confermapassword" placeholder="Ripeti la Password" required/>
                </li>
                <li>
                    <input type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>