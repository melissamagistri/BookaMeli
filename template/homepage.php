<div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="Che cosa stai cercando?">
      <button type="submit" class="searchButton">
        <span class="fa fa-search"></span>
     </button>
   </div>
</div>
<div class="divimg">
  <?php
    if(isset($templateParams["immaginihome"]) && isset($templateParams["linkimmagine"]) && isset($templateParams["altimmagine"]) && (count($templateParams["immaginihome"]) == count($templateParams["linkimmagine"])) && (count($templateParams["immaginihome"]) == count($templateParams["altimmagine"]))):
      for($i=0;$i<count($templateParams["linkimmagine"]);$i++):
  ?>
  <div>
    <a href="<?php echo $templateParams["linkimmagine"][$i]; ?>">
      <img class="imghomescroll" src="<?php echo $templateParams["immaginihome"][$i]; ?>" alt="<?php echo $templateParams["altimmagine"][$i]; ?>">
    </a>
  </div>
      
  <?php
      endfor;
    endif;
  ?>
</div>
<div  class="dotdiv">
<?php 
  if(isset($templateParams["immaginihome"]) && isset($templateParams["linkimmagine"]) && isset($templateParams["altimmagine"]) && (count($templateParams["immaginihome"]) == count($templateParams["linkimmagine"])) && (count($templateParams["immaginihome"]) == count($templateParams["altimmagine"]))):
    for($i=0;$i<count($templateParams["linkimmagine"]);$i++):
?>
    <span class="dot"></span>
  <?php
    endfor;
  endif;
?>

</div>

<section>
  <h2>Novità</h2>
  <div>
      <ul>
        <li><img class="imghome" src="<?php echo UPLOAD_DIR.'onepiece1.png'?>" alt="one-piece-vol-1"></li>
        <li><a href="prodotto.php">Titolo</a></li>
        <li><p>Prezzo</p></li>
        <li>
          <div>
          <a class="bluebutton" href="">Aggiungi al carrello</a>
          </div>
        </li>
      </ul>

  </div>
</section>

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