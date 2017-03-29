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
	              <span class="label label-warning">1</span>
	            </a>
	            <ul class="dropdown-menu">
	              <li>
	                <!-- inner menu: contains the actual data -->
	                <ul class="menu">
	                  <li>
	                    <a href="#">
	                      <i class="fa fa-users text-danger"></i> You are yet to complete your profile
	                    </a>
	                  </li>
	                </ul>
	              </li>
	              <!-- <li class="footer"><a href="#">View all</a></li> -->
	            </ul>
	          </li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo isset($single_user['profile_pic']) ? $single_user['profile_pic'] : get_image_url()."/avatar04.png"; ?>" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo $single_user['first_name'] . " " . $single_user['last_name']; ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?php echo isset($single_user['profile_pic']) ? $single_user['profile_pic'] : get_image_url()."/avatar04.png"; ?>" class="img-circle" alt="User Image">

							<p>
								<?php echo $single_user['first_name'] . " " . $single_user['last_name']; ?> - <?php echo $single_user['email']; ?>
								<small>Joined on <?php echo  date( 'j F, Y', $single_user['created_on'] ) ?> </small>
							</p>
						</li>
						<!-- Menu Body -->
						<li class="user-body">
							<div class="row">
								<div class="col-xs-4 text-center">
									<a href="<?php echo site_url("frontoffice/dashboard/settings"); ?>">Settings</a>
								</div>

								<div class="col-xs-8 text-center">
									<a href="<?php echo site_url("frontoffice/transactions/history"); ?>">Transaction History</a>
								</div>
							</div>
							<!-- /.row -->
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo site_url("frontoffice/account/edit/{$single_user['id']}"); ?>" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
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

