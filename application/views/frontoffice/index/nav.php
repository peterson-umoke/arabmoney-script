<!-- Left side column. contains the sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?php echo isset($single_user['profile_pic']) ? $single_user['profile_pic'] : get_image_url()."/avatar04.png"; ?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo $single_user['first_name'] . " " . $single_user['last_name']; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">MAIN NAVIGATION</li>
				<li class="treeview active">
		          <a href="<?php echo site_url("frontoffice/welcome"); ?>">
		            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		          </a>
		        </li>
		        <li class="treeview ">
		          <a href="<?php echo site_url("frontoffice/account/edit/{$single_user['id']}"); ?>">
		            <i class="fa fa-group"></i> <span>Your Account</span>
		          </a>
		        </li>
		        <li class="treeview">
		          <a href="#">
		            <i class="fa fa-money"></i> <span>Transactions</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li class=""><a href="<?php echo site_url("frontoffice/all-transactions"); ?>"><i class="fa fa-circle-o"></i> All Transactions</a></li>
		          </ul>
		        </li>
		        <li class="treeview">
		          <a href="#">
		            <i class="fa fa-cog"></i> <span>Settings</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li class=""><a href="<?php echo site_url("frontoffice/settings"); ?>"><i class="fa fa-wrench"></i> General</a></li>
		            <li class=""><a href="<?php echo site_url("frontoffice/settings/advanced_settings"); ?>"><i class="fa fa-user-times"></i> Advanced</a></li>
		          </ul>
		        </li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- =============================================== -->