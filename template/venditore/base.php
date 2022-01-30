<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <?php
    if(isset($templateParams["link"])):
        foreach($templateParams["link"] as $link):
    ?>
        <link href="<?php echo $link;?>" rel="stylesheet">
    <?php
        endforeach;
    endif;
    ?>
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
            <div><img src="<?php echo UPLOAD_DIR.'logo1.png'?>" alt="BookaMeli"></div>
        </nav> 
        
        <div class="sidenav">
            <ul>
                <li><img src="<?php echo UPLOAD_DIR.'chiusura.png'?>" alt="chiusura"></li>
                <li><a href="">Aggiungi prodotto</a></li>
                <li><a href="">Elimina Prodotto</a></li>
                <li><a href="">Modifica prodotto</a></li>
                <li><a href="">Il tuo Account</a></li>
                <li><a href="">Chat e Notifiche</a></li>
            </ul>
        </div>

        
    </header>
    <main>
    <?php
    if(isset($templateParams["nome"])){
        require($templateParams["nome"]);
    }
    ?>
    </main>
    <footer>
        <div>
            <ul>
                <li><img src="<?php echo UPLOAD_DIR.'logo1.png'?>" alt="BookaMeli"></li>
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
            <li><a href="listaprodotti.php?cat=news">Novità</a></li>
            <li><a href="listaprodotti.php?cat=manga">Manga</a></li>
            <li><a href="listaprodotti.php?cat=actionFigure">Action Figure</a></li>
          </ul>
        </div>
        <div>
          <ul>
             <li><h3>Informazioni</h3></li>
             <li><a href="informazioni.php">Chi siamo</a></li>
             <li><a href="regole.php"> Cookies policy</a></li>
             <li><a href="regole.php">Spedizioni e resi</a></li>
             <li><a href="regole.php">Termini e condizioni </a></li>
         </ul>
        </div>
    </footer>
   </body>
</html>