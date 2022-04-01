<div class="wrap">
   <div class="search">
     <form action="">
        <label for="Cosa stai cercando?"></label>
        <input type="search" class="searchTerm" placeholder="Che cosa stai cercando?" size="50">
        <button type="submit" class="searchButton">
          <img class="imgsearch" src="<?php echo UPLOAD_DIR."loupe.png"; ?>" alt="">
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

          <p><?php echo $templateParams['prodottinuovi'][$i]['prezzo'].'€'?></p>

          <?php if($templateParams['prodottinuovi'][$i]['sconto']!=0): ?>
                <p><?php echo round($templateParams['prodottinuovi'][$i]['prezzo'] - ($templateParams['prodottinuovi'][$i]['prezzo']*$templateParams['prodottinuovi'][$i]['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>

          <?php endif; ?>
          <div>
          <?php if($templateParams['prodottinuovi'][$i]['quantità']==0):?> 
            <button class="bluebutton" href="">Notificami della disponibilita</button>
        <?php else:?> 
          <button class="bluebutton" href="<?php echo isUserLoggedIn() ? '?carrello='.$templateParams['prodottinuovi'][$i]['idprodotto'] : 'login.php'?>">Aggiungi al carrello</button>
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
        <a style="    display: flex;
          flex-direction: column;
            align-items: center;"
            href="prodotto.php?foto=<?php echo $templateParams['prodottipopolari'][$i]['foto']?> ">
          <img class="imghome <?php echo $templateParams['prodottipopolari'][$i]['quantità']==0 ? 'imgGray' : ''?>" src="<?php echo UPLOAD_DIR.$templateParams['prodottipopolari'][$i]['foto']?>" alt="<?php echo UPLOAD_DIR.$templateParams['prodottipopolari'][$i]['nome']?>">
          <div style="width:100%"><?php echo $templateParams['prodottipopolari'][$i]['nome']?></div>
        </a>
          <p><?php echo $templateParams['prodottipopolari'][$i]['prezzo'].'€'?></p>
        <?php if($templateParams['prodottipopolari'][$i]['sconto']!=0): ?>
                <p><?php echo round($templateParams['prodottipopolari'][$i]['prezzo'] - ($templateParams['prodottipopolari'][$i]['prezzo']*$templateParams['prodottipopolari'][$i]['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p>
          <?php endif; ?>
          <div>
          <?php
            if($templateParams['prodottipopolari'][$i]['quantità']==0):
        ?> 
          <button class="bluebutton" href="">Notificami della disponibilita</button>
  
        <?php
            else:
        ?> 
          <button class="bluebutton" href="<?php echo isUserLoggedIn() ? '?carrello='.$templateParams['prodottipopolari'][$i]['idprodotto'] : 'login.php'?>">Aggiungi al carrello</button>

        <?php
            endif;
        ?> 
          </div>
        </li>
        <?php endfor;?>
      </ul>

  </div>
  
</section>
<?php endif;?>
</section>