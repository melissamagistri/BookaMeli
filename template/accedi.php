<h1>Accedi</h1>
<form action="#" method="POST">
            
    <ul class="no-padding">
        <li>
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
        </li>
        <li class="display-block">
            <label class="label" for="email">Email:</label>
            <input type="text"  name="email" id="email" required/>
        </li>
        <li>
            <label class="label" for="password">Password:</label>
            <input  type="password"  name="password" id="password" required/>
        </li>
         <li class="text-center">
            <input type="submit" name="submit" value="Accedi" id="tasto accedi"/>
        </li>
         <li class="text-center">
            <a href="">Password dimenticata?</a>
        </li>
        <li class="text-center">
            <a href="registrati.php">Non hai un account? Registrati!</a>
        </li>
    </ul>
</form>
