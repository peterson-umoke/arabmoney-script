<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo site_url("/frontoffice"); ?>"><?php echo strtoupper($site_name); ?></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<?php if(isset($message_to_user)) { ?>
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="fa fa-info-circle"></i> Alert!</h4>
                <?php echo $message_to_user; ?>
			</div>
		<?php } else { ?>
			<p class="login-box-msg">Fill the form below to Change your password</p>
		<?php }	?>

		<?php echo form_open(site_url(uri_string()),"name='change_password_form' class='change_password_form'"); ?>
			<div class="form-group has-feedback">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" value="<?php echo isset($single_user['email']) ? $single_user['email'] : ""; ?>" class="form-control" placeholder="Email" readonly disabled>
				<span class="fa fa-envelope form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<label for="old_password">Current Password:</label>
				<input type="password" name="old_password" id="old_password" class="form-control" placeholder="Current Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<label for="new_password">New Password:</label>
				<input type="password"  name="new_password" id="new_password" class="form-control" placeholder="New Password">
				<span class="fa fa-key form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<label for="password_two">Repeat new Password:</label>
				<input type="password" name="password_two" id="password_two" class="form-control" placeholder="Repeat new Password">
				<span class="fa fa-repeat form-control-feedback"></span>
			</div>

			<button type="submit" class="btn btn-primary btn-block btn-flat">Change Password</button>
		<?php echo form_close(); ?>

		<div class="center-block text-center" style="margin-top:20px;">
			<a href="<?php echo site_url('/frontoffice'); ?>" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>  Go Back to the Frontoffice</a>
		</div>

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<style>
	.sidebar-toggle {
		display:none;
	}

	div.login-logo a {
		/*color:white;*/
	}

	.login-page {
		background-color: #222d32;
	}
</style>