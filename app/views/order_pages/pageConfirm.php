<?php

	$dex = $_SESSION['index_price'];

	$total_mini = intval($_SESSION['order']['quantity_mini']) * MINI_PRICE;
	$total_basic = intval($_SESSION['order']['quantity_basic']) * BASIC_PRICE;

	$itemPriceMini = round(MINI_PRICE/$dex, 4);
	$itemPriceBasic = round(BASIC_PRICE/$dex, 4);

	$subTotalMini = round(MINI_PRICE/$dex * $_SESSION['order']['quantity_mini'], 4);
	$subTotalBasic = round(BASIC_PRICE/$dex * $_SESSION['order']['quantity_basic'], 4);

	$purchaseTotal = round($total_mini/$dex, 4) + round($total_basic/$dex, 4);

	$address = $_SESSION['order']['btcaddress'];

?>

<section class="container order-page">
	<p><small>
		<a href="/" alt="Home" class="breadcrumb">Home</a> / 
		<a href="shipping" alt="" class="breadcrumb">Shipping Details</a> / 
		<span class="breadcrumb"><b>Confirm Details</b></span> / 
		<span class="breadcrumb">Payment</span></small></p>
	<div class="" style="">

	  	<div class="col-xs-12 col-md-6">
		  	
		  	<h3>SHIPPING DETAILS<a href="shipping" class="btn node-btn3 col-xs-1 pull-right" style="padding-right:50px;"><i class="fa fa-pencil"></i> Edit</a></h3>
		  	<hr>

			<p class="confirm-name"><?= $_SESSION['order']['name']; ?></p>

			<p class="confirm-address"><?= $_SESSION['order']['street']; ?><br>
				<?php if(!empty($_SESSION['order']['street2'])) { // if they have a second line for street
					echo $_SESSION['order']['street2'] .'<br>'; 
				} ?>
				<?= $_SESSION['order']['city'] .' '. $_SESSION['order']['state'] .' '. $_SESSION['order']['zip']; ?><br>
				<?= $_SESSION['order']['country']; ?></p>
			<p class="confirm-address"><?= $_SESSION['order']['email']; ?></p>
		</div>

		<div class="col-xs-12 col-md-6">

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
										.$_SESSION['order']['quantity_basic']*BASIC_PRICE.
									'</td>
									<td class="col-xs-3">'
										.$subTotalBasic.
									'</td>
								</tr>';

						}
					?>

					<?php // include shipping fee if outside the US
						if(!empty($_SESSION['order']['shipping'])) { ?>

							<tr>
								<td class="col-xs-3">
									Intl Shipping
								</td>
								<td class="col-xs-3">
									
								</td>
								<td id="order-total" class="col-xs-3">
									<?= '$'. $_SESSION['order']['shipping']; // shipping cost ?>
								</td>
								<td id="shipping" class="col-xs-3">
									<?php // calc new total and echo that in bold
										$shipping_total = intval($_SESSION['order']['shipping']);
										echo round($shipping_total/$dex, 4);
									?>
								</td>
							</tr>

							<tr>
								<td colspan="3" class="text-right">Total</td>
								<td id="total_and_shipping" class="col-xs-3"><b>
									<?php // calc new total with shipping and echo that in bold
										$purchaseTotal = $purchaseTotal + round(intval($_SESSION['order']['shipping'])/$dex, 4);
										echo $purchaseTotal;
									?>
								</b></td>
							</tr>

					<?php } else {
						echo '<tr style="border-top:1px solid #222;">
								<td colspan="3" class="text-right">Total</td>
								<td id="total_and_shipping"><b>' .$purchaseTotal. '</b></td>
							</tr>';
						} ?>

				</tbody>
			</table>

		</div>

		<div class="col-xs-12" style="margin:40px 0;">

			<!-- Confirm your info -->
			<a id="correct" class="btn ghost-btn-white col-xs-12 col-md-6">All my information is correct</a>

			<a id="payment-button" class="btn ghost-btn-white col-xs-12 col-md-6 hidden" 
				data-toggle="modal" data-target="#paymentModal">
				<i class="fa fa-btc"></i> Proceed to Payment
			</a>
			

		</div>
	</div>
</section>

<!-- Modal -->
<?php include 'modalPayment.php'; ?>

<script type="text/javascript">
$(document).ready(function () {

	$('#mynavbar').addClass('blue-header');

    var add = $('#payment-address').text();
    if($('#total_and_shipping').text() !== '') {
    	var cost = $('#total_and_shipping').text();
    } else {
    	var cost = $('#total').text();
    }

    // check the blockchain for a transaction that matches ours
	function updater(){
		$.getJSON('https://blockchain.info/q/addressbalance/'+add, function(data){

			// if it finds a transaction matching ours
			if(data >= cost){

				// hide the payment stuff
                $('#where-to-send').fadeOut('slow', function() {
                    $(this).addClass('hidden');
                });

				// Show thank you
        		$('#successful-purchase').fadeIn('slow', function() {
                    $(this).removeClass('hidden');
                });
	       		
	       		// redirect after 4 secs
	       		window.setTimeout(function(){
			        document.location.href = '<?=HOME_PATH;?>/complete';  
			    }, 4000);
				
			}
		});  // ends the getJSON
	} // ends updater function

	

	// watch the correct information button
	$("a#correct").click(function() {
		// hide the payment stuff
        $('a#correct').fadeOut('slow', function() {
            $(this).addClass('hidden');
        });

		// Show thank you
		$('#payment-button').fadeIn('slow', function() {
            $(this).removeClass('hidden');
        });
    });

	// check the blockchain every 10sec
    updater();
	setInterval(function () {updater();}, 10000);
}); // end doc ready

</script>