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
            <div><img src="<?php echo UPLOAD_DIR.'logo1.png'?>" alt="BookaMeli"></div>
        </nav> 
        
        <div class="sidenav">
            <ul>
                <li><img src="<?php echo UPLOAD_DIR.'chiusura.png'?>" alt="chiusura"></li>
                <li><a href="#">Manga</a></li>
                <li><a href="#">Action Figure</a></li>
                <li><a href="#">Informazioni</a></li>
                <li><a href="login.php">Il tuo Account</a></li>
                <li><a href="#">Chat e Notifiche</a></li>
            </ul>
        </div>

        <div class="sidenavcar" >
            <div>
                <img class="img" src="<?php echo UPLOAD_DIR.'chiusura.png'?>" alt="chiusura">
                <h1>Carrello</h1>
            </div>
            <ul>
                <li>
                    <span>
                        <img class="img" src="<?php echo UPLOAD_DIR.'onepiece1.png'?>" alt="one-piece-vol-1">
                    </span>
                    <div>
                        <ul>
                            <li><a href="">Nome prodotto</a></li>
                            <li> 
                                <div class="quantityButton">-</div>
                                <input type="text">
                                <div class="quantityButton">+</div>
                            </li>
                            <li> <p> prezzo</p></li>
                            <li><button class="button">Rimuovi</button></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="checkout">Procedi al Checkout</a>
                </li>
                
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