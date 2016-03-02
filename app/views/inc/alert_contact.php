
<?php

if( isset($_SESSION['contact'])) { ?>
	<div class="container">
		<div class="alert alert-success alert-dismissible" role="alert">
		  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  	Thanks for the message. We'll reply soon. You can also find us 
		  	<a href="https://www.twitter.com/BitcoinMini" class="alert-link">@BitcoinMini</a> or 
		  	<a href="https://www.reddit.com/r/BitcoinMini" class="alert-link">r/BitcoinMini</a>.
		</div>
	</div>

<?php unset($_SESSION['contact']); } ?>