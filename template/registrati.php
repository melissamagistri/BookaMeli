<h1>Crea Account</h1>
<form action="#" method="POST">
        
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <label for="Nome">Nome:</label>
                    <input type="text"  name="nome" required/>
                </li>
                <li>
                    <label for="Cognome">Cognome:</label>
                    <input type="text"  name="cognome"  required/>
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
                    <label for="Conferma password">Conferma Password:</label>
                    <input type="password"  name="confermapassword" required/>
                </li>
                <li class="text-center">
                    <input type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>