<section>
<h1>Dati Personali</h1>

<div class="textcenter">
    
    <p class="p-padding">Nome: <?php echo $templateParams['info'][0]['nome'];?></p>
    
    <p class="p-padding">Cognome: <?php echo $templateParams['info'][0]['cognome'];?></p>
 
    <p class="p-padding">Email: <?php echo $templateParams['info'][0]['email'];?></p>
    
    <form action="conferma-password.php">
        <button class="bluebutton">Cambia Password</button>
    </form>
    

</div>


</section>