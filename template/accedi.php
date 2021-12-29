<form action="#" method="POST">
            <h1>Accedi</h1>
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
                    <input type="submit" name="submit" value="Accedi" />
                </li>
                <li>
                    <a href="">Password dimenticata?</a>
                </li>
                <li>
                    <a href="registrati.php">Non hai un account? Registrati!</a>
                </li>
            </ul>
        </form>
