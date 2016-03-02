<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Payment</h4>
			</div>
			<div class="modal-body">

				<div class="container-fluid" id="where-to-send">
					<div class="col-xs-12">
						<h5>ORDER DETAILS</h5>
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
								<td id="total_and_shipping" class="col-xs-3">
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
										echo $purchaseTotal;
									?>
								</b></td>
							</tr>

					<?php } else {
						echo '<tr style="border-top:1px solid #222;">
								<td colspan="3" class="text-right">Total</td>
								<td><b>' .$purchaseTotal. '</b></td>
							</tr>';
						} ?>


							</tbody>
						</table>
						
					</div>

					<div class="col-xs-12 col-md-6">
						<h5>PAY WITH BITCOIN</h5>
						<hr>
						<div style="text-align:center;">
							<h4 style="background-color:#B006EF; color:#fff; font-size:11px; padding:10px;" id="payment-address"><?=$address;?></h4>
							<img src="https://minihosting.net/qrgen/?address=<?=$address;?>&amount=<?=$purchaseTotal;?>" style="height:150px;width:150px;" />
						</div>
					</div>
					<div class="col-xs-12 col-md-6">	
						<h5>OR ALTCOINS</h5>
						<hr>
						<div style="text-align:center;">
			            	<script>function shapeshift_click(a,e){e.preventDefault();var link=a.href;window.open(link,'1418115287605','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=0,top=0');return false;}</script>
			            	<a onclick="shapeshift_click(this, event);"
			                	href="https://shapeshift.io/shifty.html?destination=<?=$address;?>&amp;output=BTC&amp;apiKey=02427873d3bd86180d2e4d1a8b713814a417dea691d89b0aac494cd3e3a4bf0f4ca07f9386befc07f276d63e7a0014538d0481ddf39116b3cdd354ab2da6e49d&amp;amount=<?=$purchaseTotal;?>"><img src="https://shapeshift.io/images/shifty/xs_dark_altcoins.png" class="ss-button"></a>
			        	</div>
			        </div>
			        <div class="col-xs-12 text-center">
			        	<h5>AWAITING PAYMENT</h5>
			        	<hr>
			        	<img src="<?=ASSET_PATH;?>img/720.GIF" class="order-image">
			    	</div>
					</div>
				</div>

				<!-- Show after completion -->
			    <div class="container-fluid text-center hidden" id="successful-purchase">
			        <h4>Thank you. Redirecting...</h4>
			        <div class="col-xs-12 text-center">
					    <img src="<?=ASSET_PATH;?>img/720.GIF" class="order-image">
			        </div>
				</div>

			</div>
		</div>
	</div>
</div>