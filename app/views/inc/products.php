<section class="container-fluid">
	<div class="container section2-border">
		<div class="section2-container clearfix">

			<div class="col-xs-12"><h1>OUR PRODUCTS</h1></div>

			<!-- FlashDrive -->
			<div class="product-card-small col-xs-12 col-sm-4">
				<h1><i class="fa fa-hdd-o"></i></h1>
				<h4>Mini Drive</h4>
				<p>Our Mini GUI and a current blockchain all on a 128 GB flash drive. This decreases the amount of time you'll need to spend downloading.</p>
				<p><b>$<?=FLASH_PRICE;?> | <i class="fa fa-btc"></i><?= round(FLASH_PRICE / $_SESSION['index_price'],3); ?></b></p>
				<a class="btn ghost-btn-white col-xs-12" data-toggle="modal" data-target="#miniModal">
					<i class="fa fa-shopping-cart"></i>  Get the Drive
				</a>
				
			</div>

			<div class="product-card-small col-xs-12 col-sm-4 favorite">
				<h1><i class="fa fa-desktop"></i></h1>
				<h4>BITCOIN MINI</h4>
				<p>A full stack Bitcoin Mini, with a general open source GUI built on the Asimos OS. Full access to your Pi from a webpage. Get the most out of your node.</p>
				<p><b>$<?=MINI_PRICE;?> / <i class="fa fa-btc"></i><?= round(MINI_PRICE / $_SESSION['index_price'],3); ?></b></p>
				<a class="btn ghost-btn-white col-xs-12" data-toggle="modal" data-target="#miniModal"><i class="fa fa-shopping-cart"></i>  Get the Mini</a>
				
			</div>

			<div class="product-card-small col-xs-12 col-sm-4">
				<h1><i class="fa fa-eye-slash"></i></h1>
				<h4>Mini Basic</h4>
				<p>This is a bare basics Mini with just enough to plug in and have a full node running in your home. No API, basic command line functionality only.</p>
				<p><b>$<?=BASIC_PRICE;?> / <i class="fa fa-btc"></i><?= round(BASIC_PRICE / $_SESSION['index_price'],3); ?></b></p>
				<a class="btn ghost-btn-white col-xs-12" data-toggle="modal" data-target="#basicModal"><i class="fa fa-shopping-cart"></i>  Get the Basic</a>
				
			</div>
		</div>
	</div>
</section>