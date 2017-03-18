<!-- main-slider -->
<ul id="demo1">
	<li>
		<img src="<?php echo get_uploads_url(); ?>/11.jpg" alt="" />
		<!--Slider Description example-->
		<div class="slide-desc">
			<h3><?=$site_name; ?> is an online mutual help community committed to enriching lives .</h3>
			<a href="<?php echo site_url("register"); ?>" class="btn btn-primary btn-lg"> Create an Account </a>
		</div>
	</li>
	<li>
		<img src="<?php echo get_uploads_url(); ?>/11.jpg" alt="" />
		<!--Slider Description example-->
		<div class="slide-desc">
			<h3>IF YOU WOULD BE WEALTHY, THINK OF SAVING AS WELL AS GETTING.</h3>
			<a href="<?php echo site_url("register"); ?>" class="btn btn-primary btn-lg"> Create an Account </a>
		</div>
	</li>
	<li>
		<img src="<?php echo get_uploads_url(); ?>/22.jpg" alt="" />
		  <div class="slide-desc">
			<h3>THROUGH PEER TO PEER DONATIONS, YOU GET 50% OF YOUR INVESTEMENT IN 10 DAYS,</h3>
			<a href="<?php echo site_url("register"); ?>" class="btn btn-danger btn-lg"> Register Now </a>
		</div>
	</li>
	
	<li>
		<img src="<?php echo get_uploads_url(); ?>/44.jpg" alt="" />
		<div class="slide-desc">
			<h3>WE ALSO OFFER LOAN SERVICES, WE ARE ALWAYS A FRIEND TO TALK TO!</h3>
			<a href="<?php echo site_url("contact-us"); ?>" class="btn btn-success btn-lg"> Let's Talk </a>
		</div>
	</li>
</ul>
<!-- //main-slider -->

<!-- slider plugins -->
<script src="<?php echo get_js_url(); ?>/skdslider.min.js"></script>
<script>
	jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
</script>