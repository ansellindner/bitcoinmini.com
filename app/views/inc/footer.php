		<div class="push"></div>    
	
	<footer class="footer">
		<div class="container">
			<div class="col-xs-6 col-sm-4"><img src="<?= ASSET_PATH; ?>img/Bitcoin_Mini_Logo.png" class="node-logo">
				<ul>
					<li><a href="<?=HOME_PATH;?>/" class="footer-link">HOME</a></li>
					<li><a href="contact" class="footer-link">CONTACT</a></li>
					<li><a href="blog" class="footer-link">BLOG</a></li>
				</ul>
			</div>
			<div class="col-xs-6 col-sm-3 col-sm-offset-2 footer-right" style="text-align:right;">Our Software
				<ul>
					<li><a href="" class="footer-link">Gorilla v0.2.0</a></li>
					<li><a href="" class="footer-link">Asimos v0.1.0</a></li>
					<li><a href="" class="footer-link">slack.internaut.me</a></li>
				</ul>
			</div>
			<div class="col-xs-6 col-sm-3 footer-right" style="text-align:right;">Learn Bitcoin
				<ul>
					<li><a href="" class="footer-link">bitcoin.org</a></li>
					<li><a href="" class="footer-link">bitcoin Wiki</a></li>
					<li><a href="" class="footer-link">slack.bitcoincore.org</a></li>
				</ul>
			</div>
			
			<div class="col-xs-12 copyright" style="">&copy; MINI COMPUTING 2016 &nbsp;&nbsp;<em>Decentralize all the things</em></div>
		</div>        
	
	</footer><!-- /.footer -->
	</div>
	<!-- Bootstrap Core JavaScript -->    
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>    
	<!-- Tabs -->    
	<script type="text/javascript">
		$(document).ready(function () {        
			$(function () {            
				$('ul.nav > li').click(function (e) {                
					$('ul.nav > li').removeClass('active');               
					$(this).addClass('active');            
				});        
			});    
		});    

		$('#mytabs a').click(function (e) {        
			e.preventDefault();        
			$(this).tab('show');    
		});    

		$('#myTabs a[href="#specs"]').tab('show');    
		$('#myTabs a[href="#included"]').tab('show');     
		$('#myTabs a[href="#interface"]').tab('show');    

		$(function(){        
			$("#large-image img:eq(0)").nextAll().hide();        
			$(".small-images img").click(function(e){            
				var index = $(this).index();            
				$("#large-image img").eq(index).show().siblings().hide();        
			});    
		});    

		$('a[href*=#]:not([href=#])').click(function() {        
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {   

				var target = $(this.hash);            
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');               

				if (target.length) {                    
					$('html,body').animate({                        
						scrollTop: target.offset().top                    
					}, 1000);                    
				return false;                
			}        
		}    
	});    
	</script>    
	<script type="text/javascript" src="<?=ASSET_PATH;?>js/validator.js"></script>
</body>
</html>