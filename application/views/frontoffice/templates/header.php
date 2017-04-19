<header class="main-header">
	<!-- Logo -->
	<a href="<?php echo site_url("frontoffice/dashboard/"); ?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>A</b>.<span class="text-red">N </span> </span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Arab</b>Money</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- Notifications: style can be found in dropdown.less -->
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i>
						<span class="label label-warning">10</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">You have 10 notifications</li>
						<li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
								<li>
									<a href="#">
										<i class="fa fa-users text-aqua"></i> 5 new members joined today
									</a>
								</li>
							</ul>
						</li>
						<li class="footer"><a href="<?php echo site_url("frontoffice/notifications"); ?>">View all</a></li>
					</ul>
				</li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo isset($single_user['profile_picture']) ? $single_user['profile_picture'] : get_image_url()."/avatar04.png"; ?>" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo $single_user['first_name'] . " " . $single_user['last_name']; ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?php echo isset($single_user['profile_picture']) ? $single_user['profile_picture'] : get_image_url()."/avatar04.png"; ?>" class="img-circle" alt="User Image">

							<p>
								<?php echo $single_user['first_name'] . " " . $single_user['last_name']; ?>
								<br>
								<?php echo $single_user['email']; ?>
								<small>Joined on <?php echo  date( 'j F, Y', $single_user['created_on'] ) ?> </small>
							</p>
						</li>
						<!-- Menu Body -->
						<li class="user-body">
							<div class="list-group" style="margin-bottom:0;">
								<a href="<?php echo site_url("frontoffice/account"); ?>" class="list-group-item">View Profile</a>
								<a href="<?php echo site_url("frontoffice/account/edit_profile"); ?>" class="list-group-item">Edit Profile</a>
								<a href="<?php echo site_url("frontoffice/account/change_password"); ?>" class="list-group-item">Change Password</a>
							</div>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="center-block text-center">
								<a href="<?php echo site_url("frontoffice/account/logout"); ?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>

<!-- =============================================== -->

