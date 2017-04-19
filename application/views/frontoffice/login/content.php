<?php 

if($userauth == TRUE) {
	$url = site_url('frontoffice/account/login?redirect_page='.urlencode($redirect_page).'&&userauth=1');
} else {
	$url = uri_string();
} ?><div class="login-box">
	<div class="login-logo">
		<a href="<?php echo site_url("/"); ?>"><?php echo strtoupper($site_name); ?></a>
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
			<p class="login-box-msg">Sign in to start your session.</p>
		<?php }	?>

		<?php echo form_open($url,"name='change_password_form' class='change_password_form'"); ?>
			<div class="form-group has-feedback">
				<input type="email" name="identity" id="email" value="<?php echo set_value("identity"); ?>" class="form-control" placeholder="Email">
				<span class="fa fa-envelope form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<input type="password" name="password" id="password" class="form-control" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
		<?php echo form_close(); ?>

		<div style="margin-top:20px;">
		<a href="<?php echo site_url("frontoffice/account/register/"); ?>" 	class="text-center btn btn-default btn-flat"><i class="fa fa-user"></i> Create Account</a>
	    <div class="pull-right">
		    <a href="<?php echo site_url("frontoffice/account/forgot_password"); ?>" style="padding-right:0;"  class="text-center btn btn-link text-success">Forgot Password ?</a>
		    <!-- <a href="#" style="padding-right:0;"  class="text-center btn btn-link text-success">Forgot Password ?</a> -->
	    </div>
	    </div>

		<div class="center-block text-center" style="margin-top:20px;">
			<a href="<?php echo site_url('/'); ?>" class="btn btn-default btn-block btn-flat"><i class="fa fa-arrow-left"></i>  Back to Site</a>
		</div>

	</div>
	<!-- /.login-box-body -->

	<div class="copyrights">
		<a href="<?php echo site_url(); ?>"> <?=$site_name; ?> </a>  &copy; <?php echo date("Y"); ?>. All rights reserved.
	</div>
</div>
<!-- /.login-box -->


<style>
	.login-page.skin-red .wrapper {
		background-color: #d2d6de;
	}
	.copyrights {
		margin-top:20px;
		text-align: center;
	}
</style>