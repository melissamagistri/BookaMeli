<div class="wrap">
   <div class="search">
      <label for="Cosa stai cercando?"></label>
      <input type="text" class="searchTerm" placeholder="Che cosa stai cercando?">
      <button type="submit" class="searchButton">
        <span class="fa fa-search"></span>
     </button>
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
<section>
  <h2>Novità</h2>
  <?php for($i=0;$i<count($templateParams['prodottinuovi']);$i++):?>
  <div>
      <ul>
        <a href="prodotto.php?foto=".<?php echo $templateParams['prodottinuovi'][$i]['foto']?>>
          <li><img class="imghome" src="<?php echo UPLOAD_DIR.$templateParams['prodottinuovi'][$i]['foto']?>" alt="<?php echo UPLOAD_DIR.$templateParams['prodottinuovi'][$i]['nome']?>"></li>
          <li><?php echo UPLOAD_DIR.$templateParams['prodottinuovi'][$i]['nome']?></li>
        </a>
        <li><p><?php echo UPLOAD_DIR.$templateParams['prodottinuovi'][$i]['prezzo']?></p></li>
        <?php if($templateParams['prodottinuovi'][$i]['sconto']!=0): ?>
                <li><p><?php echo round($templateParams['prodottinuovi'][$i]['prezzo'] - ($templateParams['prodottinuovi'][$i]['prezzo']*$templateParams['prodottinuovi'][$i]['sconto']/100),2,PHP_ROUND_HALF_UP).'€'?></p></li>
          <?php endif; ?>
        <li>
          <div>
          <a class="bluebutton" href="">Aggiungi al carrello</a>
          </div>
        </li>
      </ul>

  </div>
  <?php endfor;?>
</section>
<?php endif;?>

<section>
  <h2>Popolari</h2>
  <div>
    <ul>
        <li><img class="imghome" src="<?php echo UPLOAD_DIR.'onepiece1.png'?>" alt="one-piece-vol-1"></li>
        <li><a href="">Titolo</a></li>
        <li><p>Prezzo</p></li>
        <li>
          <div>
              <a class="bluebutton" href="">Aggiungi al carrello</a>
          </div>
        </li>
    </ul>
  </div>
</section>