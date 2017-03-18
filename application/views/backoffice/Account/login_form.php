<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title> <?php echo isset($title) ? "ArabNaira " . "| ".$title : "Login into ArabNaira"; ?> </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="apple-touch-icon" href="<?php echo site_url('apple-touch-icon.png'); ?>">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php bootstrap_css_uri(); ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php admin_dashboard_css_uri(); ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo get_plugins_uri(); ?>/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <script src="<?php echo get_script_uri(); ?>/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>		
</head>
<body class="hold-transition login-page">
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo site_url(uri_string()); ?>">The <b>Back</b>Office</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">
			<?php 
				if(isset($_SESSION['error_message_is_all'])):
					echo $_SESSION['error_message_is_all'].PHP_EOL;
				elseif(isset($_GET['pi5']) && !empty($_GET['pi5'])):
					// TODO: troubleshoot this later
					// echo $_SESSION['error_message_is_all'].PHP_EOL;
					echo "Your have been successfully logged out!".PHP_EOL;
				else:
					echo "Sign in to start your session".PHP_EOL;
				endif; 
			?>
		</p>
		<?php $redirect_page = isset($_GET['redirect_page']) ? $_GET['redirect_page'] : ""; ?>
		<?php $is_redirect = isset($_GET['is_redirect']) ? $_GET['is_redirect'] : ""; ?>
		<div id="infoMessage"><?php echo $message;?></div>

		<?php echo form_open(current_url()."?s=".md5("something_is_going_on_in_the_background_that_is false").md5("and but this engine was built by").md5("peterson umoke").md5("and richard nweneri")."&&is_redirect=1&&redirect_page=".$redirect_page);?>
			<div class="form-group has-feedback">
				<?php echo form_input($identity);?>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<?php echo form_input($password);?>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
					    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
						<?php echo lang('login_remember_label', 'remember');?>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
				</div>
				<!-- /.col -->
			</div>
		<?php echo form_close();?>

		<a href="forgot_password" class=""><?php echo lang('login_forgot_password');?></a><br>

	</div>
	<!-- /.login-box-body -->

	<hr>

	<footer class="text-center">
	<p> &copy; Arabnaira <?php echo date("Y"); ?>. All rights reserved. </p>
	</footer>
</div>
<!-- /.login-box -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_script_uri(); ?>/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="<?php echo get_script_uri(); ?>/vendor/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo get_plugins_uri(); ?>/iCheck/icheck.min.js"></script>
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
