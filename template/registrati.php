<form action="#" method="POST">
            <h1>Crea Account</h1>
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <input type="text"  name="nome" placeholder="Nome" required/>
                </li>
                <li>
                    <input type="text"  name="cognome" placeholder="Cognome" required/>
                </li>

                <li>
                    <input type="text"  name="email" placeholder="Email" required/>
                </li>
                <li>
                    <input type="password"  name="password" placeholder="Password" required/>
                </li>

                <li>
                    <input type="password"  name="confermapassword" placeholder="Conferma Password" required/>
                </li>
                <li>
                    <input type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>