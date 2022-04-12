<div class="wrap">
   <div class="search">
     <form action="listaprodotti.php" method="get">
        <select name="cat" id="cat" class='select'>
          <option value="tutte le categorie">Tutte le categorie</option>
          <?php for($i=0;$i<count($templateParams['categorie']);$i++):?>
            <option value="<?php echo $templateParams['categorie'][$i]['nomecategoria']?>"><?php echo $templateParams['categorie'][$i]['nomecategoria']?></option>
          <?php endfor;?>
        </select>
        <label for="cerca"></label>
        <input type="search" class="searchTerm" placeholder="Che cosa stai cercando?" size="50" id='cerca' name='cerca'>
        <button type="submit" class="searchButton">
          <img class="imgsearch" src="<?php echo UPLOAD_DIR."loupe.png"; ?>" alt="Cerca">
        </button>
     </form>
   </div>
</div>

<div class="divimg">
  <?php
    if(isset($templateParams["immaginihome"])):
      for($i=0;$i<count($templateParams["immaginihome"]);$i++):
  ?>
  <div>
    <a href="<?php echo $templateParams["immaginihome"][$i]; ?>">
      <img class="imghomescroll" src="<?php echo UPLOAD_DIR.$templateParams["immaginihome"][$i]; ?>" alt="<?php echo $templateParams["immaginihome"][$i]; ?>">
    </a>
  </div>
      
  <?php
      endfor;
    endif;
  ?>
</div>
<div  class="dotdiv">
<?php 
  if(isset($templateParams["immaginihome"])):
    for($i=0;$i<count($templateParams["immaginihome"]);$i++):
?>
    <span class="dot"></span>
  <?php
    endfor;
  endif;
?>

</div>

<?php if(count($templateParams['prodottinuovi'])!=0):?>
<section class='novita'>
  <h2>Novità</h2>
  
  <div>
      <ul class="no-padding displayflex">
      <?php for($i=0;$i<count($templateParams['prodottinuovi']);$i++):?>
        <li class="no-margin textcenter">
          <div>
          <a href="prodotto.php?foto=<?php echo $templateParams['prodottinuovi'][$i]['foto']?> ">
            <img class="imghome <?php echo $templateParams['prodottinuovi'][$i]['quantità']==0 ? 'imgGray' : ''?>" src="<?php echo UPLOAD_DIR.$templateParams['prodottinuovi'][$i]['foto']?>" alt="<?php echo UPLOAD_DIR.$templateParams['prodottinuovi'][$i]['nome']?>">
            <div><?php echo $templateParams['prodottinuovi'][$i]['nome']?></div>
          </a>

          <div class="display-inlineflex">
            <p><?php echo $templateParams['prodottinuovi'][$i]['prezzo'].'€'?></p>
                  <?php if($templateParams['prodottinuovi'][$i]['sconto']!=0): ?>
                  <p><?php echo round($templateParams['prodottinuovi'][$i]['prezzo'] - ($templateParams['prodottinuovi'][$i]['prezzo']*$templateParams['prodottinuovi'][$i]['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
                  <?php endif; ?>
          </div>

          
          <div>
          <?php if($templateParams['prodottinuovi'][$i]['quantità']==0):?> 
            
              <button class="bluebutton" onclick="window.location.href='<?php echo isUserLoggedIn() ? '?notifica='.$templateParams['prodottinuovi'][$i]['idprodotto'] : 'login.php'?>';">Notificami della disponibilita</button>
          <?php else:?> 
            
              <button class="bluebutton" onclick="window.location.href='<?php echo isUserLoggedIn() ? '?carrello='.$templateParams['prodottinuovi'][$i]['idprodotto'] : 'login.php'?>';" >Aggiungi al carrello</button>
          <?php endif;?> 
          </div>
          </div>
        </li>
        <?php endfor;?>
      </ul>

  </div>
  
</section>
<?php endif;?>

<section>
<?php if(count($templateParams['prodottipopolari'])!=0):?>
<section class='popolari'>
  <h2>Popolari</h2>
  
  <div>
      <ul class="no-padding displayflex">
      <?php for($i=0;$i<count($templateParams['prodottipopolari']);$i++):?>

        <li class="no-margin textcenter">
        <div>
        <a class="flex-a"
            href="prodotto.php?foto=<?php echo $templateParams['prodottipopolari'][$i]['foto']?> ">
          <img class="imghome <?php echo $templateParams['prodottipopolari'][$i]['quantità']==0 ? 'imgGray' : ''?>" src="<?php echo UPLOAD_DIR.$templateParams['prodottipopolari'][$i]['foto']?>" alt="<?php echo UPLOAD_DIR.$templateParams['prodottipopolari'][$i]['nome']?>">
          <div><?php echo $templateParams['prodottipopolari'][$i]['nome']?></div>
        </a>
        <div class="display-inlineflex">
          <p style='<?php echo ($templateParams['prodottipopolari'][$i]['sconto']!=0) ? 'text-decoration: line-through; font-size:10px' : ''?>'><?php echo $templateParams['prodottipopolari'][$i]['prezzo'].'€'?></p>
          <?php if($templateParams['prodottipopolari'][$i]['sconto']!=0): ?>
                  <p><?php echo round($templateParams['prodottipopolari'][$i]['prezzo'] - ($templateParams['prodottipopolari'][$i]['prezzo']*$templateParams['prodottipopolari'][$i]['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
            <?php endif; ?>
        </div>
          
          <div>
          <?php
            if($templateParams['prodottipopolari'][$i]['quantità']==0):
        ?>
            <button class="bluebutton" onclick="window.location.href='<?php echo isUserLoggedIn() ? '?notifica='.$templateParams['prodottipopolari'][$i]['idprodotto'] : 'login.php'?>';">Notificami della disponibilità</button>
        <?php else:?> 
            <button class="bluebutton" onclick="window.location.href='<?php echo isUserLoggedIn() ? '?carrello='.$templateParams['prodottipopolari'][$i]['idprodotto'] : 'login.php'?>';">Aggiungi al carrello</button>
        <?php endif;?> 
          </div>
        </div>
        </li>
        <?php endfor;?>
      </ul>

  </div>
  
</section>
<?php endif;?>
</section>