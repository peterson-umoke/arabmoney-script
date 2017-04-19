<!-- Content Wrapper. Contains page content -->
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

			<!-- welcome box -->
			<div class="box box-solid box-danger">
				<div class="box-header with-border">
					<h3 class="box-title"><strong>Welcome</strong></h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					Welcome to <?= $site_name; ?>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- custormer support box -->
			<div class="box box-info box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><strong>Special Notice</strong></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body bg-info">
					For complaints, assistance, questions, please send us a message <a href="<?php echo site_url("frontoffice/feedbacks"); ?>" class="btn btn-default"> Here </a> or send a mail to support@arabnaira.com
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<?php if($error_messages): ?>
				<div class="alert alert-danger inner_alert alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>
						<i class="fa fa-info-circle"></i> Alert
					</h4>
					<?php  echo ucwords($error_messages); ?>
				</div>
			<?php endif; ?>

			<?php if($success_messages): ?>
				<div class="alert alert-success inner_alert alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>
						<i class="fa fa-info-circle"></i> Alert
					</h4>
					<?php  echo ucwords($success_messages); ?>
				</div>
			<?php endif; ?>

			<!-- donation packages box -->
			<?php if($package_paired == FALSE): ?>
			<div class="box box-success box-solid">
				<div class="box-header with-border">
					<h3 class="box-title text-center show-block"><strong>Donation Packages</strong></h3>

					<div class="box-tools pull-right text-white">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
				
				<?php $c_b = count($packages_selectable); ?>
				<?php for($x = 0; $x < $c_b; $x++) { ?>
					<?php switch ($c_b) {
						case 1:
							$class = 12;
							break;
						case 2:
							$class = 6;
							break;
						case 4:
							$class = 3;
							break;
						case 3:
							$class = 4;
							break;
						
						default:
							$class= 6;
							break;
					} ?>
					<div class="col-md-<?php echo $class; ?> col-sm-6">
						<div class="box box-<?php echo $packages_selectable[$x]['class']; ?> box-solid">
							<div class="box-header with-border text-center show-block">
								<h3 class="box-title"><?php echo strtoupper($packages_selectable[$x]['type']); ?></h3>
							</div>
							<div class="box-body text-center">
								<h4 class="text-muted"> PAY </h4> <h3> N<?php echo number_format($packages_selectable[$x]['amount']); ?> </h3> <h4 class='text-muted'> RECEIVE </h2> <h1>  N<?php echo number_format($packages_selectable[$x]['amount'] * 2); ?> </h1>
							</div>
							<div class="box-footer text-center">
								<a href="<?php echo site_url("frontoffice/dashboard/".$packages_selectable[$x]['id']); ?>" class="btn btn-primary btn-flat">Select Package</a>
							</div>
						</div>
					</div>

					<?php } ?>
					
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			<?php else: ?>
				<div class="box box-primary box-solid">
					<div class="box-header">
						<h3 class="box-title text-center show-block"><strong>Payment information</strong></h3>

						<div class="box-tools pull-right text-white">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
					<div class="callout callout-warning">
						<h4><i class="fa fa-info-circle"></i> Important Notice</h4>
						You have been paired with another member of this platform, kindly note that only after payment and the transaction has been verified will you be allowed to make another payment.
					</div>
						<div class="col-md-3">
							<div class="image-placeholder text-center center-block">
								<h3 class="page-header">Profile Picture</h3>
								<img src="<?php echo isset($current_paired_central_account_details['profile_picture']) ? $current_paired_central_account_details['profile_picture'] : get_image_url()."/avatar04.png"; ?>" class="img-circle" alt="User Image">
							<br>
							<br>
							<?php if($get_paired_with['proof_of_payment_id']) : ?>
								<a href="<?php echo site_url("frontoffice/dashboard/edit_pp/{$get_paired_with['proof_of_payment_id']}"); ?>" class="btn bg-navy btn-flat">Upload Proof of Payment</a>
							<?php else: ?>
								<a href="<?php echo site_url("frontoffice/dashboard/edit_pp/{$get_paired_with['proof_of_payment_id']}"); ?>" class="btn bg-navy btn-flat">Edit Proof of Payment</a>
							<?php endif; ?>
							</div>
						</div>
						<div class="col-md-9">
							<div class="paired-account-details">
								<h3 class="page-header">Contact Information</h3>
								<table class="table text-muted table-responsive table-striped">
									<tr>
										<td> <strong> First Name </strong> </td>
										<td><?=$current_paired_central_account_details['first_name']; ?></td>
									</tr>
									<tr>
										<td> <strong> Last Name </strong> </td>
										<td><?= $current_paired_central_account_details['last_name']; ?></td>
									</tr>
									<tr>
										<td> <strong> Bank Name </strong> </td>
										<td><?php echo strtoupper($current_paired_central_account_details['bank_name']); ?></td>
									</tr>
									<tr>
										<td> <strong> Account Name </strong> </td>
										<td><?php echo $current_paired_central_account_details['account_name']; ?></td>
									</tr>
									<tr>
										<td> <strong> Account Number </strong> </td>
										<td><?php echo $current_paired_central_account_details['account_number']; ?></td>
									</tr>
									<tr>
										<td> <strong> Phone Number </strong> </td>
										<td><?php $current_paired_central_account_details['mobile']; ?></td>
									</tr>
									<tr>
										<td> <strong> Amount to be Paid </strong> </td>
										<td><?php echo "N".number_format($get_paired_with['category']); ?></td>
									</tr>
									<tr>
										<td> <strong> Return Investment </strong> </td>
										<td><?php echo "N".number_format($get_paired_with['category']*2); ?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
						<br><br>
						<div class="callout callout-info">
							<strong><?= $kind_instructions; ?></strong>
						</div>
					</div>
					<div class="box-footer bg-primary" style="background-color:#337ab7;">
						Time remaining for payment to pay made: 12 hours from now!
					</div>
				</div>
			<?php endif; ?>

		</section>
		<!-- /.content -->
	</div> <!-- #ajax_holder -->
</div>
<!-- /.content-wrapper -->