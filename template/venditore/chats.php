<section id="container" class="displayflexcenter">
	<div class="chatwidth">
	
		<div class='divheader'>
			<img src="<?php echo UPLOAD_DIR.'user.png'?>" alt="user" class='imgdatichat'>
			<div>
				<p>Chat con il cliente</p>
			</div>
		</div>
		<ul id="chat">
		<?php if(count($templateParams['messaggi']) == 0):?>
				<li>Non sono ancora presenti messaggi.</li>
			<?php else: ?>
			<?php foreach($templateParams['messaggi'] as $messaggio):?>
				<li class="<?php echo ($messaggio['venditore'] == 1) ? 'me' : 'you'?>">
					<div class="entete">
						<p class='chatElement'><?php echo ($messaggio['venditore'] == 1) ? 'Tu' : 'Cliente'?></p>
						<p class='chatElement'><?php echo $messaggio['datamessaggio']?></p>
					</div>
					<div class="message">
						<p><?php echo $messaggio['testo']?></p>
					</div>
				</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
		<div class='writeMessage divsendmess'>
			<form action="" onsubmit='return false' class="width100">
				<textarea class="textareachat" id='messaggio' placeholder="Type your message"></textarea>
				<button id='invia' class='bluebutton minibutton'><img class="img25" src="<?php echo UPLOAD_DIR."send.png"; ?>" alt="invio messaggio"></button>
			</form>	
		</div>
		
		
	</div>

</section>