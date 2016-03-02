<?php

	$dex = $_SESSION['index_price'];

	$total_mini = intval($_SESSION['order']['quantity_mini']) * MINI_PRICE;
	$total_basic = intval($_SESSION['order']['quantity_basic']) * BASIC_PRICE;

	$itemPriceMini = round(MINI_PRICE/$dex, 4);
	$itemPriceBasic = round(BASIC_PRICE/$dex, 4);

	$subTotalMini = round(MINI_PRICE/$dex * $_SESSION['order']['quantity_mini'], 4);
	$subTotalBasic = round(BASIC_PRICE/$dex * $_SESSION['order']['quantity_basic'], 4);

	$purchaseTotal = round($total_mini/$dex, 4) + round($total_basic/$dex, 4);

?>

<section class="container order-page">
	<p><small>
		<a href="<?=HOME_PATH;?>" alt="Home" class="breadcrumb">Home</a> / 
		<span class="breadcrumb"><b>Shipping Details</b></span> / 
		<span class="breadcrumb">Confirm Details</span> / 
		<span class="breadcrumb">Payment</span></small></p>
	<div class="" style="">

	  	<div class="col-xs-12 col-md-8">
		  	
		  	<h3>SHIPPING DETAILS</h3>
		  	<hr>

	      	<form class="form-horizontal" action="<?=HOME_PATH;?>/shipping_details" method="POST" data-toggle="validator">

	        	<div class="form-group">
		          	<label for="name" class="col-xs-4 col-sm-3 control-label">Name</label>
		          	<div class="col-xs-8 col-sm-9">
		            	<input type="text" class="form-control" id="name" name="name" placeholder="Ship to" 
		            		<?php if(isset($_SESSION['order']['name'])) { echo 'value="'. $_SESSION['order']['name'] .'"'; } ?>
		            	required>
		          	</div>
	        	</div>

		        <div class="form-group">
		          	<label for="email" class="col-xs-4 col-sm-3 control-label">Email</label>
		          	<div class="col-xs-8 col-sm-9">
		            	<input type="email" class="form-control" name="email" id="email" placeholder="Email for shipping details." 
		            		<?php if(isset($_SESSION['order']['email'])) { echo 'value="'. $_SESSION['order']['email'] .'"'; } ?>
		            	required>
		          	</div>
		        </div>

	        	<div class="form-group">
	          		<label for="street" class="col-xs-4 col-sm-3 control-label">Address</label>
	          		<div class="col-xs-8 col-sm-9">
	            		<input type="text" class="form-control" id="street" name="street" placeholder="Street address" 
	            			<?php if(isset($_SESSION['order']['street'])) { echo 'value="'. $_SESSION['order']['street'] .'"'; } ?>
	            		required>
	          		</div>
	        	</div>

	        	<div class="form-group">
	          		<label for="street2" class="col-xs-4 col-sm-3 control-label">Address Line 2</label>
	          		<div class="col-xs-8 col-sm-9">
	            		<input type="text" class="form-control" id="street2" name="street2" placeholder="Street continued"
	            			<?php if(isset($_SESSION['order']['street2'])) { echo 'value="'. $_SESSION['order']['street2'] .'"'; } ?>
	            		>
	          		</div>
	        	</div>

	        	<div class="form-group">
	          		<label for="city" class="col-xs-4 col-sm-3 control-label">City</label>
	          		<div class="col-xs-8 col-sm-9">
	            		<input type="text" class="form-control" id="city" name="city" placeholder="City" 
	            			<?php if(isset($_SESSION['order']['city'])) { echo 'value="'. $_SESSION['order']['city'] .'"'; } ?>
	            		required>
	          		</div>
	        	</div>

	        	<div class="form-group">
	          		<label for="state" class="col-xs-4 col-sm-3 control-label">State/Province</label>
	          		<div class="col-xs-8 col-sm-9">
	            		<input type="text" class="form-control" id="state" name="state" placeholder="NY" data-minlength="2" 
	            			<?php if(isset($_SESSION['order']['state'])) { echo 'value="'. $_SESSION['order']['state'] .'"'; } ?>
	            		required>
	          		</div>
	        	</div>

	        	<div class="form-group">
	          		<label for="zip" class="col-xs-4 col-sm-3 control-label">Zip/Postal Code</label>
	          		<div class="col-xs-8 col-sm-9">
	            		<input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" data-minlength="5" 
	            			<?php if(isset($_SESSION['order']['zip'])) { echo 'value="'. $_SESSION['order']['zip'] .'"'; } ?>
	            		required>
	          		</div>
	        	</div>

	        	<div class="form-group">
					<label for="country" class="col-xs-4 col-sm-3 control-label">Country</label>
					<div class="col-xs-8 col-sm-6 col-sm-offset-3">
						<input type="text" class="form-control" id="country" name="country" value="USA">
						<p class="pull-right"><small>Please <a href="contact" alt="contact us">contact us</a> if you live outside the US.</small></p>
					</div>
	        	</div>

				<div class="form-group">
					<div class="col-xs-12 text-left">
						<div class="checkbox">
					      	<label>
					        	<input type="checkbox" id="terms" data-error="You must accept the Terms to continue." required>
					        	I accept the <a href="terms" target="_blank">Terms & Conditions</a>
					      	</label>
					      	<div class="help-block with-errors"></div>
					    </div>
					</div>
				</div>

	        	<div class="form-group">
	          		<div class="col-xs-12 text-left">
	            		<button type="submit" class="btn ghost-btn-white col-xs-12">Proceed to Confirmation</button>
	          		</div>
	        	</div>

	    	</form>
		</div><!-- / form -->

		<!-- Order Table -->
		<div class="col-xs-12 col-md-4">
			
			<h3>ORDER DETAILS<a href="cancel" class="btn node-btn3 pull-right"><i class="fa fa-pencil"></i> Start Over</a></h3>
			<hr>

			<table class="table">
				<thead>
					<tr>
						<th class="col-xs-3">
							Item
						</th>
						<th class="col-xs-3">
							Quantity
						</th>
						<th class="col-xs-3">
							Price
						</th>
						<th class="col-xs-3">
							BTC
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						// Mini row
						if( $_SESSION['order']['quantity_mini'] > 0) {
							echo '<tr>
									<td class="col-xs-3">
										Mini 
									</td>
									<td class="col-xs-3">'
										.$_SESSION['order']['quantity_mini'].
									'</td>
									<td id="order-total" class="col-xs-3">$ '
										.$_SESSION['order']['quantity_mini']*MINI_PRICE.
									'</td>
									<td class="col-xs-3">'
										.$subTotalMini.
									'</td>
								</tr>';
						}

						// Basic row
						if( $_SESSION['order']['quantity_basic'] > 0) {
							echo '<tr>
									<td class="col-xs-3">
										Basic
									</td>
									<td class="col-xs-3">'
										.$_SESSION['order']['quantity_basic'].
									'</td>
									<td id="order-total" class="col-xs-3">$ '
										.$_SESSION['order']['quantity_mini']*BASIC_PRICE.
									'</td>
									<td class="col-xs-3">'
										.$subTotalBasic.
									'</td>
								</tr>';

						}
					?>
					
					<tr style="border-top:1px solid #222;">
						<td colspan="3" class="text-right">Total</td>
						<td><b><?= $purchaseTotal; ?></b></td>
					</tr>
					
				</tbody>
			</table>

		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function () {
		$('#mynavbar').addClass('blue-header');
	});
</script>