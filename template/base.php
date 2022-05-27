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
                <li><a href="listaprodotti.php?cat=manga&cerca=">Manga</a></li>
                <li><a href="listaprodotti.php?cat=action+figure&cerca=">Action Figure</a></li>
                <li><a href="informazioni.php">Informazioni</a></li>
                <li><a href="login.php">Il tuo Account</a></li>
                <li><a href="chat-notifiche.php">Chat e Notifiche</a></li>
            </ul>
        </div>

        <div class="sidenavcar" >
            <div>
                <img class="img" src="<?php echo UPLOAD_DIR.'chiusura.png'?>" alt="chiusura">
                <h2>Carrello</h2>
            </div>
            <?php if(isUserLoggedIn()):?>
            <ul>
                <?php if(count($templateParams['prodottiCarrello'])!=0):?>
                    <?php $totale = 0 ?>
                    <?php foreach($templateParams['prodottiCarrello'] as $prodotto):?>
                <li>
                    <span>
                        <img class="imgcarrello" src="<?php echo UPLOAD_DIR.$prodotto['foto']?>" alt="<?php echo $prodotto['foto']?>">
                    </span>
                    <div>
                        <ul>
                            <li class='titolo'><a class="hover" href="prodotto.php?foto=<?php echo $prodotto['foto'] ?>"><?php echo $prodotto['nome']?></a></li>
                            <li> 
                                <label for="selquantita" hidden>Seleziona Quantità prodotto</label>
                            <select name="" id="selquantita">
                                    <?php $quantity = $dbh->getProductQuantity($prodotto['idprodotto'])[0]['quantità']; ?>
                                    <?php $val = $dbh->getProductInCartQuantity($_SESSION['idaccount'][0]['idaccount'], $prodotto['idprodotto'])[0]['quantita'] ?>
                                    <?php for($i=1; $i <= (($quantity > 10) ? 10 : $quantity); $i++):?>
                                        <option <?php echo ($i==$val) ? "selected = 'selected'" : ''?> value=" <?php echo $i?>"><?php echo $i ?> </option>
                                        <?php endfor?>
                            </select>

                            </li>
                            <li>
                                <div class="displayflex">
                                <p class=' <?php echo ($prodotto['sconto'] != 0) ? "textlinethrough" : '';?>'> <?php echo $prodotto['prezzo'].'€'?></p>
                                <?php $totale = $totale + ((float)$prodotto['prezzo'] * (int)$val)?>
                            <?php if($prodotto['sconto'] != 0):?>
                                <p><?php echo round($prodotto['prezzo'] - ($prodotto['prezzo']*$prodotto['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
                                <?php $totale = ($totale - ((float)$prodotto['prezzo'] * (int)$val)) + (round($prodotto['prezzo'] - ($prodotto['prezzo']*$prodotto['sconto']/100),2,PHP_ROUND_HALF_UP) * $val)?>
                            <?php endif; ?> </div>
                            </li>
                            <li>
                                <form action="index.php" method="get">
                                    <button name="rimuovi" value="<?php echo $prodotto['idprodotto']?>" class="bluebutton">Rimuovi</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endforeach;?>
                <li> <p class='totale'>Totale: <?php echo $totale.'€' ?></p></li>
                <li>
                    <form action="checkout.php">
                        <button class="bluebutton">Procedi al checkout</button>
                    </form>
                
                </li>
                <?php else:?>
                    <li><p>Non hai nessun prodotto nel carrello.</p></li>
                <?php endif;?>
            </ul>
            <?php else:?>
                <ul>
                    <li><p>Per visualizzare il carrello devi accedere al tuo account</p></li>
                    <li>
                        <form action="login.php">
                            <button class="bluebutton">Accedi o Registrati</button>
                        </form>
                    </li>
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
            <li><a href="listaprodotti.php?cat=manga&cerca=">Manga</a></li>
            <li><a href="listaprodotti.php?cat=action+figure&cerca=">Action Figure</a></li>
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