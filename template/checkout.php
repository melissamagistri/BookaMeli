<?php if(isset($templateParams['errore'])): ?>
    <p> <?php echo $templateParams['errore'] ?></p>
<?php endif; ?>

<section class="border sectioncheckout">
    
            <h1 class="h1checkout">1.Informazioni Personali</h1>
            <div class="inline-block">
                <p>Nome:  <?php echo $templateParams["userinfo"][0]["nome"]; ?> </p>
                <p>Cognome: <?php echo $templateParams["userinfo"][0]["cognome"]; ?></p>
                <p>Email: <?php echo $templateParams["userinfo"][0]["email"]; ?> </p>
            </div>
    
</section>

<section class="border displayflexcenter">
    <h1 class="h1checkout">2.Pagamento</h1>
    <div class="textcenter no-padding inline-block">
        <form class="form" action="#" method="POST">
        <div class="base-list-style">
            <input type="radio" id="contanti" name="metodo_pagamento" value="Contanti">
            <label for="contanti">Contanti</label>
        
            <input type="radio" id="carta" name="metodo_pagamento" value="Carta di credito">
            <label for="carta">Carta di credito</label>
        </div>

        
        <div class="checkoutdiv">
        <h3>Inserisci i dati della tua carta</h3>
            <div>
                <label for="Numero carta">Numero Carta:</label>
                <input type="text" name="datiNumero" class='datiNumero'placeholder="Numero">
            </div>

            <div>
                <label for="Nome Proprietario">Nome proprietario:</label>
                <input type="text" name="datiNome" class='datiNome' placeholder="Proprietario">
            </div>
           
        </div>

                 
        <div><button class="bluebutton submit">Continua</button></div>
        </form>


    </div>
    
</section>