<h2>Crea Account</h2>
<form action="#" method="POST">
        
            
    <ul>
                <li>
                    <?php if(isset($templateParams["errorelogin"])): ?>
                    <p><?php echo $templateParams["errorelogin"]; ?></p>
                    <?php endif; ?>
                </li>
                <li>
                    <label for="nome">Nome:</label>
                    <input type="text"  name="nome" id="nome" required/>
                </li>
                <li>
                    <label for="cognome">Cognome:</label>
                    <input type="text"  name="cognome" id="cognome" required/>
                </li>

                <li>
                    <label for="email">Email:</label>
                    <input type="text"  name="email" id="email"required/>
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password"  name="password" id="password" required/>
                </li>

                <li>
                    <label for="confermapassword">Conferma Password:</label>
                    <input type="password"  name="confermapassword" id="confermapassword" required/>
                </li>
                <li class="text-center">
                    <label for="submit" hidden>Registrati</label>
                    <input type="submit" name="submit" id="submit" value="Invia" />
                </li>
            </ul>
        </form>