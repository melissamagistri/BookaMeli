<h1>Attiva Account</h1>
<form action="#" method="POST">
            
            
            <ul>
                <li>
                <?php if(isset($templateParams["errorelogin"])): ?>
                <p><?php echo $templateParams["errorelogin"]; ?></p>
                <?php endif; ?>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="text"  name="email" required/>
                </li>
                <li>
                    <label for="email">Password:</label>
                    <input type="password"  name="password" required/>
                </li>
                <li class="text-center">
                    <label for="tasto accedi"></label>
                    <input type="submit" name="submit" value="Accedi" />
                </li>
            </ul>
        </form>