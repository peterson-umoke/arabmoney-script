<!-- Left side column. contains the sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?php echo isset($single_user['profile_picture']) ? $single_user['profile_picture'] : get_image_url()."/avatar04.png"; ?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo $single_user['first_name'] . " " . $single_user['last_name']; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">MAIN NAVIGATION</li>
				<li class="treeview">
		          <a href="<?php echo site_url("frontoffice"); ?>">
		            <i class="fa fa-home"></i> <span>Dashboard</span>
		          </a>
		        </li>
		        <li class="treeview">
		          <a href="<?php echo site_url("frontoffice/donation/make"); ?>">
		            <i class="fa fa-tripadvisor"></i> <span>Make Donation</span>
		          </a>
		        </li>
		        <li class="treeview">
		          <a href="<?php echo site_url("frontoffice/donation/request_history"); ?>">
		            <i class="fa fa-money"></i> <span>My Wallet</span>
		          </a>
		        </li>
		        <li class="treeview">
		          <a href="<?php echo site_url("frontoffice/donation/make_history"); ?>">
		            <i class="fa fa-line-chart"></i> <span>Donation History</span>
		          </a>
		        </li>
		        <li class="treeview">
		          <a href="<?php echo site_url("frontoffice/notifications"); ?>">
		            <i class="fa fa-bell-o"></i> <span>Notifications</span>
		          </a>
		        </li>
		        <li class="treeview">
		          <a href="<?php echo site_url("frontoffice/testimonies"); ?>">
		            <i class="fa fa-heart-o"></i> <span>Testimonies</span>
		          </a>
		        </li>
		        <li class="treeview ">
		          <a href="<?php echo site_url("frontoffice/account"); ?>">
		            <i class="fa fa-user"></i> <span>Your Profile</span>
		          </a>
		        </li>
		        <li class="treeview">
		          <a href="<?php echo site_url("frontoffice/feedbacks"); ?>">
		            <i class="fa fa-volume-control-phone"></i> <span>Contact Support</span>
		          </a>
		        </li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- =============================================== -->