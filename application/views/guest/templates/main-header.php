<!-- header -->
<div class="agileits_header">
<div class="container">
	<div class="w3l_offers">
		<p><?=$ins_message; ?>. <a href="<?php echo site_url("register"); ?>">Join NOW</a></p>
	</div>
	<div class="agile-login pull-right">
		<ul class="text-right">
			<?php foreach($navigation_menu['special_links'] as $name => $url): ?>
			<li><a href="<?=$url; ?>"> <?php echo ucwords($name); ?> </a></li> 
			<?php endforeach; ?>
			
		</ul>
	</div>
<!-- <div class="product_list_header">  
	<form action="#" method="post" class="last"> 
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="display" value="1">
		<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-user" aria-hidden="true"></i></button>
	</form>  
</div> -->
	<div class="clearfix"> </div>
</div>
</div>

<div class="logo_products">
<div class="container">
<div class="w3ls_logo_products_left1">
		<ul class="phone_email">
			<li><i class="fa fa-phone" aria-hidden="true"></i>Have a complain, call us : (+0123) 234 567</li>
			
		</ul>
	</div>
	<div class="w3ls_logo_products_left">
		<h1><a href="<?php echo site_url(); ?>"><?=$site_name; ?></a></h1>
	</div>
<div class="w3l_search">
	<form action="#" method="post">
		<input type="search" name="Search" placeholder="Search for a Product..." required="">
		<button type="submit" class="btn btn-default search" aria-label="Left Align">
			<i class="fa fa-search" aria-hidden="true"> </i>
		</button>
		<div class="clearfix"></div>
	</form>
</div>
	
	<div class="clearfix"> </div>
</div>
</div>
<!-- //header -->

<!-- navigation -->
<div class="navigation-agileits">
	<div class="container">
	<nav class="navbar navbar-default">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header nav_2">
		<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div> 
	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		<ul class="nav navbar-nav">
			<li class="active"><a href="<?php echo site_url(); ?>" class="act">Home</a></li>	
			<!-- Mega Menu -->
			<?php foreach($navigation_menu['primary_links'] as $name => $url): ?>
	<li><a href="<?=$url; ?>" class="scroll"> <?php echo ucwords($name); ?> </a></li> 
	<?php endforeach; ?>
		</ul>
	</div>
	</nav>
	</div>
</div>
<!-- //navigation -->