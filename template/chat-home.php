<section class="displayflexcenter">
    
    <div id="container" class="chatwidth">
	
		<div class='divheader'>
			<img src="<?php echo UPLOAD_DIR.'user.png'?>" alt="user" class='imgdatichat'>
			<div>
				<p>Chat con il venditore</p>
			</div>
		</div>
		<ul id="chat">
			<?php if(count($templateParams['messaggi']) == 0):?>
				<li>Non sono ancora presenti messaggi.</li>
			<?php else: ?>
			<?php foreach($templateParams['messaggi'] as $messaggio):?>
				<li class="<?php echo ($messaggio['venditore'] == 0) ? 'me' : 'you'?>">
					<div class="entete">
						<p class='chatElement'><?php echo ($messaggio['venditore'] == 0) ? 'Tu' : 'Venditore'?></p>
						<p class='chatElement'><?php echo $messaggio['datamessaggio']?></p>
					</div>
					<div class="message">
						<p><?php echo $messaggio['testo']?></p>
					</div>
				</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
		<div class='writeMessage'>
			<form class="width100" action="" id='messageform' method='post'>
				<label for="messaggio" hidden>Messaggio</label>
				<textarea class="textareachat" name='messaggio'placeholder="Type your message" id="messaggio"></textarea>
				<button class='bluebutton minibutton'><img class="img25"src="<?php echo UPLOAD_DIR."send.png"; ?>" alt="invio messaggio"></button>
			</form>	
		</div>
		
		
	</div>

</section>