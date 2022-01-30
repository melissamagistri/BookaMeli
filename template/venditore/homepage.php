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
    if(isset($templateParams["immaginihome"])):
      for($i=0;$i<count($templateParams["immaginihome"]);$i++):
  ?>
  <div>
    <a href="<?php echo removeExtensions($templateParams["immaginihome"][$i]); ?>">
      <img class="imghomescroll" src="<?php echo UPLOAD_DIR.$templateParams["immaginihome"][$i]; ?>" alt="<?php echo getFileName(removeExtensions($templateParams["immaginihome"][$i])); ?>">
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

<section>
  <h2>Piu venduti della settimana</h2>
  <div>
      <ul>
        <li><img class="imghome" src="<?php echo UPLOAD_DIR.'onepiece1.png'?>" alt="one-piece-vol-1"></li>
        <li><a href="prodotto.php">Titolo</a></li>
        <li><p>Prezzo</p></li>
      </ul>

  </div>
</section>

<section>
  <h2>Piu recensiti della settimana</h2>
  <div>
    <ul>
        <li><img class="imghome" src="<?php echo UPLOAD_DIR.'onepiece1.png'?>" alt="one-piece-vol-1"></li>
        <li><a href="">Titolo</a></li>
        <li><p>Prezzo</p></li>
    </ul>
  </div>
</section>