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
				<?php for ($i=0; $i < count($navigation_menu); $i++) { ?>
					<li class="treeview">
						
						<a href="<?php echo !empty($navigation_menu[$i]['url']) ? site_url($navigation_menu[$i]['url']) : "#"; ?>" title="<?php echo isset($navigation_menu[$i]['title']) ? $navigation_menu[$i]['title'] : ""; ?>">
							<i class="<?php echo isset($navigation_menu[$i]['site_icon']) ? $navigation_menu[$i]['site_icon'] : "fa fa-circle-o text-red"; ?>"></i> <span> <?php echo ucwords($navigation_menu[$i]['name']); ?> </span>
							<?php if(isset($navigation_menu[$i]['has_children']) && $navigation_menu[$i]['has_children'] == true): ?>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							<?php endif; ?>
						</a>
						<?php if(isset($navigation_menu[$i]['has_children']) && $navigation_menu[$i]['has_children'] == true && is_array($navigation_menu[$i]['children_items']) ): ?>
							<?php if(is_array($navigation_menu[$i]['children_items'])): ?>
								<ul class="treeview-menu">
									<?php for($j = 0; $j < count($navigation_menu[$i]['children_items']); $j++ ) { ?>
										<li><a href="<?php echo isset($navigation_menu[$i]['children_items'][$j]['url']) ? $navigation_menu[$i]['children_items'][$j]['url'] : "#"; ?>">
										<i class="<?php echo isset($navigation_menu[$i]['children_items'][$j]['site_icon']) ? $navigation_menu[$i]['children_items'][$j]['site_icon'] : "fa fa-circle-o text-danger"; ?>"></i> 
										<?php echo isset($navigation_menu[$i]['children_items'][$j]['name']) ? ucwords($navigation_menu[$i]['children_items'][$j]['name']) : ""; ?> </a></li>
									<?php } ?>
								</ul>
							<?php else: 
								throw new Exception("the children item must be an array item", 1);
							endif; ?>									
						<?php endif; ?>
					</li>
				<?php } ?>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- =============================================== -->