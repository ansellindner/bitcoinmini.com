<a id="learnmore"></a>
<section class="container-fluid">
	<div class="container product-details">

		<div class="col-xs-12"><h1>A CLOSER LOOK</h1></div>
		
		<div class="col-xs-12 col-md-6 tab-box">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" id="mytabs" role="tablist">
		    	<li role="presentation" class="active"><a href="#hardware" aria-controls="hardware" role="tab" data-toggle="tab">HARDWARE</a></li>
		    	<li role="presentation"><a href="#software" aria-controls="software" role="tab" data-toggle="tab">SOFTWARE</a></li>
		    	<li role="presentation"><a href="#requirements" aria-controls="requirements" role="tab" data-toggle="tab">REQUIREMENTS</a></li>
		  	</ul>
		  	<!-- Tab panes -->
		  	<div class="tab-content text-left">
		    	<div role="tabpanel" class="tab-pane fade in active" id="hardware">
					<!-- Hardware -->
					<ul>
						<li>Raspberry Pi 2 board</li>
						<li>Dimensions: 3.5 x 2.8 x 1 inches</li>
						<li>900MHz quad-core ARM Cortex-A7 CPU</li>
						<li>1GB RAM</li>

						<li>Ethernet port</li>
						<li>4 x USB 2.0</li>
						<li>HDMI video port</li>
						<li>AC adapter</li>
						<li>128GB USB Flash Drive</li>
						<li>8 GB MicroSD card for operating system</li>
					</ul>
				</div>

				<div role="tabpanel" class="tab-pane fade" id="software">
					<!-- Software -->
					<ul>
						<li class="list-label">The Basic</li>
						<li>Arch Linux</li>
						<li>Bitcoin Core with updated blockchain</li>

						<li class="list-label">Standard Mini</li>
						<li>Node.js server</li>
						<li>Extensive bitcoin API</li>
						<li>Gorilla User Interface (GUI)</li>

						<li class="list-label">You Can</li>
						<li>Increase decentralization</li>
						<li>Secure your investment</li>
						<li>Free-up your computer's processor</li>
					</ul>
				</div>

			    <div role="tabpanel" class="tab-pane fade" id="requirements">
					
					<p>There are a few items you'll need before you can get your Mini up and running. If you 
					have these things you'll have your node up and running in about 1 minute.</p>
					<ul>
						<li>Internet access</li>
						<li>Router</li>
						<li>Your router's login information (usually on the router)</li>
					</ul>
				</div>
				<a class="btn ghost-btn-white col-xs-12" style="position:absolute; bottom:20px; left:0;" 
					data-toggle="modal" data-target="#miniModal"><b>Order a Mini</b></a>
				
			</div><!-- / Nav Tabs -->
		</div><!-- / Tab column -->

		<div class="col-xs-12 col-md-6 image-box">
			<!-- Image Galery -->
			<div class="small-images">
				<img src="<?= ASSET_PATH; ?>img/new_mini_2.jpg"/>
				<img src="<?= ASSET_PATH; ?>img/side02.png"/>
				<img src="<?= ASSET_PATH; ?>img/back.png"/>
				<img src="<?= ASSET_PATH; ?>img/front02.png"/>
				<img src="<?= ASSET_PATH; ?>img/main_image.png"/>
			</div>
			<!-- Selected Image -->
			<div id="large-image">
				<img src="<?= ASSET_PATH; ?>img/new_mini_2.jpg"/>
				<img src="<?= ASSET_PATH; ?>img/side02.png"/>
				<img src="<?= ASSET_PATH; ?>img/back.png"/>
				<img src="<?= ASSET_PATH; ?>img/front02.png"/>
				<img src="<?= ASSET_PATH; ?>img/main_image.png"/>
			</div>
		</div><!-- / image box -->
	</div><!-- / container product-card -->
</section>