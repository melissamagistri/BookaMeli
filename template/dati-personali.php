<section>
<h1>Dati Personali</h1>

<div>
    <ul>
        <li>
            <label class="label" for="nome">Nome:</label>
            <input type="text"  name="nome" id="nome" placeholder="<?php echo $templateParams['info'][0]['nome'];?>"/>
        </li>
        <li>
            <label class="label" for="cognome">Cognome:</label>
            <input  type="text"  name="cognome" id="cognome" placeholder="<?php echo $templateParams['info'][0]['cognome'];?>"/>
         </li>
         <li>
            <label class="label" for="email">Email:</label>
            <input  type="text"  name="email" id="email" placeholder="<?php echo $templateParams['info'][0]['email'];?>"/>
         </li>
         <li>
            <label class="label" for="password">Password:</label>
            <input  type="password"  name="password" id="password"/>
         </li>
         <li>
            <label class="label" for="nuova-password">Nuova Password:</label>
            <input  type="password"  name="nuova password" id="nuova-password"/>
         </li>
         <li>
            <input type="submit" name="submit" value="Salva" id="tasto salva"/>
         </li>
       
    </ul>
</div>


</section>