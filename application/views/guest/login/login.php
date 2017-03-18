<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo site_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page to the FrontOffice</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>The FrontOffice</h2>
					
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<?php echo validation_errors(); ?>
				<?php echo form_open(uri_string(),"id='loginForm' class='login_form'"); ?>
					<input type="text" placeholder="Email Address" name="identity">
					<input type="password" placeholder="Password" name="password">
					<div class="forgot">
						<a href="#">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="<?php echo site_url("register"); ?>">Register Here</a> (Or) go back to <a href="<?php echo site_url(); ?>">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->