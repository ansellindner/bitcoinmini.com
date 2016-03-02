<div class="container">
	<p><small>
		<a href="/" alt="Home" class="breadcrumb">Home</a> / 
		<span class="breadcrumb">Shipping Details</span> / 
		<span class="breadcrumb">Confirm Details</span> / 
		<span class="breadcrumb">Payment</span> / 
		<span class="breadcrumb"><b>Complete</b></span></small></p>
	
	<div class="row text-center">

	<div class="container" style="padding:60px 0;">
		
		<div class="col-xs-12">
			<div class="container-fluid text-center" id="successful-purchase">

		        <div class="col-xs-12 text-center">
				    <img src="<?=ASSET_PATH;?>img/paid2.png" class="order-success">
		        </div>

		        <h4>We see your payment, you will receive an email
		            shortly with your order confirmation.</h4>
		        <h2>Thanks For Your Business</h2>
		        <div class="col-xs-12 text-center" style="margin-top:30px;margin-bottom:20px;">
		            <a href="cancel" class="btn node-btn2"><i class="fa fa-chevron-left"></i> Back to home</a>
		        </div>
			</div>
		</div>
	</div>

	
</div>

<?php session_unset();session_destroy();?>