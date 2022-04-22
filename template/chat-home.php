<section>
    
    <div id="container">
	
		<div class='divheader'>
			<img src="<?php echo UPLOAD_DIR.'user.png'?>" alt="user" class='imgdatichat'>
			<div>
				<p>Chat con il venditore</p>
			</div>
		</div>
		<ul id="chat">
			<li class="you">
				<div class="entete">
					<span class="status green"></span>
					<p class='chatElement'>Vincent</p>
					<p class='chatElement'>10:12AM, Today</p>
				</div>
				<div class="message">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
				</div>
			</li>
			<li class="me">
				<div class="entete">
					<p class='chatElement'>10:12AM, Today</p>
					<p class='chatElement'>Vincent</p>
					<span class="status blue"></span>
				</div>
				<div class="message">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
				</div>
			</li>
			
		<footer style="display: inline-flex">
			<textarea placeholder="Type your message"></textarea>
			<a style="margin-left: 0px;"href="#"><img src="<?php echo UPLOAD_DIR."send.png"; ?>" alt="invio messaggio"></a>
		</footer>
</div>

</section>