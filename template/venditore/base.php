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
    <nav class='venditorenav'>
        <ul>
            <li>
            <a href="prodottiVenditore.php">Prodotti</a>
            </li>
            <li>
                <a href="categorie.php">Categorie</a>
            </li>
            <li>
                <a href="ordiniVenditore.php">Ordini</a>
            </li>
            <li>
                <a href="notifiche-venditore.php">Notifiche</a>
            </li>
            <li>
                <a href="lista-chat.php">Chats</a>
            </li>
        </ul>
    </nav>
    </header>
    <main>
    <?php
    if(isset($templateParams["nome"])){
        require($templateParams["nome"]);
    }
    ?>
    </main>
   </body>
</html>