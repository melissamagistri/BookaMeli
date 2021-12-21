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
                        <li>Instagram</li>
                        <li>Facebook</li>
                        <li>Youtube</li>
                    </ul>
                </div></li>

            </ul>
        </div>
        <div>
            <ul>
                <li><h3>Informazioni</h3></li>
                <li><p>Chi siamo</p></li>
            </ul>
        </div>
    </footer>
</body>
</html>