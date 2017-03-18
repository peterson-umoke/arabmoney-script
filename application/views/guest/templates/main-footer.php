<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>Great city of Sudan.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@arabnaira.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<?php foreach($navigation_menu['footer_links_one'] as $name => $url): ?>
							<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a class="scroll" href="<?=$url; ?>"><?php echo ucwords($name); ?> </a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					
				</div>
				<div class="col-md-3 w3_footer_grid">
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				<p>© <?php echo date("Y") ." ".$site_name; ?>. All rights reserved | Theme Designed with <i class="fa fa-heart text-danger"></i> by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">	
					<nav class="">
						<ul class="nav nav-pills">
							<?php foreach($navigation_menu['footer_links_two'] as $name => $url): ?>
								<li> <a href="<?php echo $url; ?>"> <?=ucwords($name); ?> </a> </li>
							<?php endforeach; ?>
						</ul>
					</nav>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->	
