<div class="modal fade" id="miniModal" tabindex="-1" role="dialog" aria-labelledby="MiniModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="MiniModal">Your Order</h4>
			</div>
			<div class="modal-body">

				<form class="form-horizontal" action="<?=HOME_PATH;?>/quantity" method="POST">
					<div class="form-group">
						<label for="number-mini" class="col-xs-9 control-label">How Many Minis - $<?=MINI_PRICE;?></label>
						<div class="col-xs-3">
							<select class="form-control" id="number-mini" name="number-mini">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
					</div>

					<div class="form-group" style="margin-top:50px;">
						<label for="number-basic" class="col-xs-9 control-label" style="text-align:right!important;"><small>Add Basic To Order - $<?=BASIC_PRICE;?></small></label>
						<div class="col-xs-3">
							<select class="form-control" id="number-basic" name="number-basic">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
					</div>

					<hr>

					<div class="form-group" style="padding:0 15px;">
						<span class="control-label">Total</span>
						<span id="modal-total-mini" class="pull-right"></span>
					</div>
					
					<div class="form-group" style="padding:0 15px;">
						<button type="submit" class="btn ghost-btn-white col-xs-12">Proceed to Checkout</button>
					</div>

					<div class="form-group" style="padding:0 15px;">
						<span class="pull-right"><small>* Shipping charges may apply</small></span>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>