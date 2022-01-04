<form action="#" method="POST">
            <h1>Attiva Account</h1>
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <input type="text"  name="Password" placeholder="Email" required/>
                </li>
                <li>
                    <input type="password"  name="password" placeholder="Password" required/>
                </li>
                <li>
                    <input type="submit" name="submit" value="Accedi" />
                </li>
            </ul>
        </form>