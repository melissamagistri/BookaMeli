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
                <li><a href="listaprodotti.php?cat=manga">Manga</a></li>
                <li><a href="listaprodotti.php?cat=actionFigure">Action Figure</a></li>
                <li><a href="informazioni.php">Informazioni</a></li>
                <li><a href="login.php">Il tuo Account</a></li>
                <li><a href="chat-notifiche.php">Chat e Notifiche</a></li>
            </ul>
        </div>

        <div class="sidenavcar" >
            <div>
                <img class="img" src="<?php echo UPLOAD_DIR.'chiusura.png'?>" alt="chiusura">
                <h1>Carrello</h1>
            </div>
            <?php if(isUserLoggedIn()):?>
            <ul>
                <?php if(count($templateParams['prodottiCarrello'])!=0):?>
                    <?php foreach($templateParams['prodottiCarrello'] as $prodotto):?>
                <li>
                    <span>
                        <img class="imgcarrello" src="<?php echo UPLOAD_DIR.$prodotto['foto']?>" alt="<?php echo $prodotto['foto']?>">
                    </span>
                    <div>
                        <ul>
                            <li><a class="hover" href="prodotto.php?foto=<?php echo $prodotto['foto'] ?>"><?php echo $prodotto['nome']?></a></li>
                            <li> 
                                <div class="quantityButton">
                                    <button class="button">-</button>
                                </div>

                                <label for="quantita prodotto nel carrello"></label>
                                <input class="inputnoborder" type="text" value="<?php echo $prodotto['quantita']?>" name="quantitacarrello" disabled>
                                <div class="quantityButton">
                                    <button class="button">+</button>
                                </div>
                            </li>
                            <li><p style=' <?php echo ($prodotto['sconto'] != 0) ? "text-decoration:line-through;" : '';?>'> <?php echo $prodotto['prezzo']?></p></li>
                            <?php if($prodotto['sconto'] != 0):?>
                                <li><p><?php echo round($prodotto['prezzo'] - ($prodotto['prezzo']*$prodotto['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p></li>
                            <?php endif; ?>
                            <li><button class="bluebutton">Rimuovi</button></li>
                        </ul>
                    </div>
                </li>
                <?php endforeach;?>
                <li>
                <a class="bluebutton" href="checkout.php">Procedi al checkout</a>
                </li>
                <?php else:?>
                    <li><p>Non hai nessun prodotto nel carrello.</p></li>
                <?php endif;?>
            </ul>
            <?php else:?>
                <ul>
                    <li><p>Per visualizzare il carrello devi accedere al tuo account</p></li>
                    <li><a class="bluebutton" href="login.php">Accedi o Registrati</a></li>
                </ul>
            <?php endif; ?>
                
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