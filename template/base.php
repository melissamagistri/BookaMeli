<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <?php 
    if(isset($templateParams["js"])):
        foreach($templateParams["js"] as $script):
    ?>
        <script src="<?php echo $script; ?>"></script>
    <?php
        endforeach;
    endif;
    ?>
</head>
<body>
    <header> 
        <nav>
            <div><img src="<?php echo UPLOAD_DIR.'carrello.png'?>" alt="carrello"></div>
            <div><img src="<?php echo UPLOAD_DIR.'menu.png'?>" alt="menu"></div>
            <div><img src="<?php echo UPLOAD_DIR.'logo.png'?>" alt="BookaMeli"></div>
        </nav> 
        
        <div class="sidenav">
            <ul>
                <li><img src="<?php echo UPLOAD_DIR.'chiusura.png'?>" alt="chiusura"></li>
                <li><a href="#">About</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>

        <div class="sidenavcar" >
            <ul>
                <li><img src="<?php echo UPLOAD_DIR.'chiusura.png'?>" alt="chiusura"></li>
                <li><h3>Carrello</h3></li>
            </ul>

        </div>
    </header>
    <main>
        
    </main>
    <footer>
        <div>
            <ul>
                <li><img src="<?php echo UPLOAD_DIR.'logo.png'?>" alt="BookaMeli"></li>
                <li><h3>I nostri social</h3></li>
                <li><div>
                    <ul>
                        <li><img src="<?php echo UPLOAD_DIR.'youtube.png'?>" alt="youtube"></li>
                        <li><img src="<?php echo UPLOAD_DIR.'instagram.png'?>" alt="instagram"></li>
                        <li><img src="<?php echo UPLOAD_DIR.'facebook.png'?>" alt="facebook"></li>
                    </ul>
                </div></li>

            </ul>
        </div>
        <div>
          <ul>
            <li><h3>Prodotti</h3></li>
            <li><a href="#">Novità</a></li>
            <li><a href="#">Manga</a></li>
            <li><a href="#">Action Figure</a></li>
          </ul>
        </div>
        <div>
          <ul>
             <li><h3>Informazioni</h3></li>
             <li><a href="#">Chi siamo</a></li>
             <li><a href="#"> Cookies policy</a></li>
             <li><a href="#">Spedizioni e resi</a></li>
             <li><a href="#">Termini e condizioni </a></li>
         </ul>
        </div>
    </footer>
</body>
</html>