<?php 

if($userauth == TRUE) {
	$url = site_url('backoffice/account/login?redirect_page='.urlencode($redirect_page).'&&userauth=1');
} else {
	$url = uri_string();
} ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title> <?php echo isset($title) ? "ArabNaira " . "| ".$title : "Login into ArabNaira"; ?> </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="apple-touch-icon" href="<?php echo site_url('apple-touch-icon.png'); ?>">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo bootstrap_css_url(); ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo admin_dashboard_css_url(); ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo get_plugins_url(); ?>/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <script src="<?php echo get_script_url(); ?>/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>		
</head>
<body class="hold-transition login-page">
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo site_url("/backoffice"); ?>">The <b>Back</b>Office</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">
			<?php

			if(empty($message_to_user) || !isset($message_to_user)){
				echo "Sign in to start your session".PHP_EOL;
			} else {
				echo $message_to_user;	
			}

			?>
		</p>

		<?php echo form_open($url,"class='login_form_backoffice'"); ?>
			<div class="form-group has-feedback <?php echo (null != form_error('identity')) ? "has-error" : ""; ?>">
				<input type="text" class="form-control" name="identity" placeholder="Email Address" value="<?php echo set_value('identity'); ?>">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<?php echo form_error('identity', '<span id="helpBlock" class="help-block">', '</span>'); ?>
			</div>
			<div class="form-group has-feedback <?php echo (null != form_error('password')) ? "has-error" : ""; ?>">
				<input type="text" class="form-control" name="password" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<?php echo form_error('password', '<span id="helpBlock" class="help-block">', '</span>'); ?>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
						    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
							Remember Me
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
				</div>
				<!-- /.col -->
			</div>
		<?php echo form_close();?>

		<a href="forgot_password" class="">Forgot your password ?</a><br>

	</div>
	<!-- /.login-box-body -->

	<hr>

	<footer class="text-center">
	<p> &copy; Arabnaira <?php echo date("Y"); ?>. All rights reserved. </p>
	</footer>
</div>
<!-- /.login-box -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_script_url(); ?>/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="<?php echo get_script_url(); ?>/vendor/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo get_plugins_url(); ?>/iCheck/icheck.min.js"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
</script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>
