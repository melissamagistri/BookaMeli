<?php if(isset($templateParams['errore'])): ?>
    <p class="textcenter"> <?php echo $templateParams['errore'] ?></p>
<?php endif; ?>

<section class="blocksection padding10 border sectioncheckout">
    
    <div class="checkoutdivstyle">
        <div class="padding-bottom30">
            <h2 class="h1checkout">1.Informazioni Personali</h2>
        </div>

        <div class="inline-block padding-bottom30">               
            <p>Nome:  <?php echo $templateParams["userinfo"][0]["nome"]; ?> </p>
            <p>Cognome: <?php echo $templateParams["userinfo"][0]["cognome"]; ?></p>
            <p>Email: <?php echo $templateParams["userinfo"][0]["email"]; ?> </p>
        </div>
        
        
    </div>
            
    <div class="checkoutdivstyle">
        <div class="maringbottom">
            <h2 class="h1checkout">2.Pagamento</h2>
        </div>

        <div class="textcenter no-padding inline-block checkout80">
        <form class="form" action="#" method="POST">
        <fieldset>
            <legend class="legend">Scegli un metodo di pagamento</legend>
            <div class="base-list-style flexcolumn flex">
                <div class="inlineflex">
                    <input class="inputradio" type="radio" id="contanti" name="metodo_pagamento" value="Contanti">
                    <label for="contanti">Contanti</label>
                </div>
                
                <div class="inlineflex">
                    <input class="inputradio" type="radio" id="carta" name="metodo_pagamento" value="Carta di credito">
                    <label for="carta">Carta di credito</label>
                </div>
                
            </div>

            
            <div class="checkoutdiv initial-align">
            <h3>Inserisci i dati della tua carta</h3>
                <div>
                    <label for="numerocarta">Numero Carta:</label>
                    <input type="text" id="numerocarta" name="datiNumero" class='datiNumero'placeholder="Numero">
                </div>

                <div>
                    <label for="nomeproprietario">Nome proprietario:</label>
                    <input type="text" id="nomeproprietario" name="datiNome" class='datiNome' placeholder="Proprietario">
                </div>
            
            </div>
        </fieldset>

        <div class="grid">
            <button class="checkoutbutton bluebutton submit">Continua</button>
        </div>
        </form>


        </div>

        
    </div>
  
</section>