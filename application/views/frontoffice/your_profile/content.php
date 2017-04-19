<?php 
	// extract the current user information
	extract($single_user);
?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Ajax Content Holder -->
	<div id="ajax_holder">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo isset($page_title) ? $page_title : $title; ?>
				<small><?php echo isset($description) ? $description : "" ?></small>
			</h1>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- introduction box -->
			<div class="box bg-navy box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Your Profile Details</h3>
				</div>
			</div>
			<!-- /.box -->

			<div class="row">
				<div class="col-md-4 col-sm-6">
					<!-- Default box -->
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Profile Picture</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="box-body text-center center-block">
							<img src="<?php echo isset($single_user['profile_picture']) ? $single_user['profile_picture'] : get_image_url()."/avatar04.png"; ?>" alt="<?php echo $first_name ."-".$last_name."-profile-picture"; ?>" class="img-circle img-responsive">
							<br><br>
							<a class="btn bg-navy btn-block" href="<?php echo site_url("frontoffice/account/edit_profile"); ?>">Edit Profile</a>
						</div>
					</div>
					<!-- /.box -->
				</div>
				<div class="col-md-8 col-sm-6">
					<!-- Default box -->
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Personal Details</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="box-body">
							<table class="table no-border">
								<tr>
									<td>First name: </td>
									<td><?php echo $first_name; ?></td>
								</tr>
								<tr>
									<td>Last name: </td>
									<td><?= $last_name; ?></td>
								</tr>
								<tr>
									<td>Email: </td>
									<td><?= $email; ?></td>
								</tr>
								<tr>
									<td>Country: </td>
									<td>Nigeria</td>
								</tr>
								<tr>
									<td>Phone Number: </td>
									<td>
										<?php if($mobile != 0) {
											echo $mobile;
										} else {
											$url = site_url("frontoffice/account/edit_profile");
											echo "<em> You do not have a phone number, please </em> <a href='{$url}' class='btn btn-default'> add one </a> <em> now </em>";
										}

										?>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<!-- /.box -->
				</div>
			</div> <!-- /.row -->

			<div class="row">
				<div class="col-md-12">
					<!-- Default box -->
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Banking Details</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="box-body">
							<div class="row col-md-6 col-sm-8 col-xs-12">
							<table class="table no-border">
								<tr>
									<td>Bank Name: </td>
									<td><em>
									<?php if(!empty($bank_name)) {
										echo $bank_name;
									} else {
										$url = site_url("frontoffice/account/edit_profile");
										echo "<em> You do not have an active Bank name, please </em> <a href='{$url}' class='btn btn-default'> add one </a> <em> now </em>";	
									}
									?></em>
									</td>
								</tr>
								<tr>
									<td>Account Name: </td>
									<td><em>
										<?php if(!empty($account_name)) {
										echo $account_name;
									} else {
										$url = site_url("frontoffice/account/edit_profile");
										echo "<em> You do not have an active Account name, please </em> <a href='{$url}' class='btn btn-default'> add one </a> <em> now </em>";	
									}
									?></em>
									</td>
								</tr>
								<tr>
									<td>Account Number: </td>
									<td><em>
										<?php if(!empty($account_number)) {
										echo $account_number;
									} else {
										$url = site_url("frontoffice/account/edit_profile");
										echo "<em> You do not have an active Account Number, please </em> <a href='{$url}' class='btn btn-default'> add one </a> <em> now </em>";	
									}
									?></em>
									</td>
								</tr>
								<tr>
									<td>Account Type: </td>
									<td><em><?php echo strtoupper('Savings'); ?></em></td>
								</tr>
							</table>
							</div>
						</div>
						<div class="box-footer bg-success box-solid">
							<b> N.B: </b> All Accounts registered will be recognized as <EM> <STRONG> SAVINGS ACCOUNT TYPE </STRONG></EM>
						</div>
					</div>
					<!-- /.box -->
				</div>
			</div>

		</section>
		<!-- /.content -->
	</div> <!-- #ajax_holder -->
</div>
<!-- /.content-wrapper -->