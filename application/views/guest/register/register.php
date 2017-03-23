<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo site_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register into <?=$site_name; ?></li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<?php echo isset($message) ? $message ."<br/>": ""; ?>
				<?php echo form_open(uri_string(),'name="register_form" id="register_form" class="register_form"'); ?>
					<h5>profile information</h5>

					<?php echo form_input($fname); ?>
					<?php echo form_input($lname); ?>
				
					<h6>Login information</h6>
					
					<?php echo form_input($email); ?>
					<?php echo form_input($password); ?>
					<?php echo form_input($password_check); ?>
					<div class="register-check-box">
						<div class="check">
							<label class="" for="checkbox_sign"><?php echo form_checkbox('terms_and_conditions', 'Terms and conditons', TRUE,'id="checkbox_sign"'); ?> <i> </i>I accept the terms and conditions</label>

						</div>
					</div>
					<input type="submit" value="Register">
				</form>
			</div>
			<div class="register-home">
				<a href="<?php echo site_url(); ?>">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->