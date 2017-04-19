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

			<!-- donations welcome box -->
			<div class="box bg-red-active box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><strong>Make Donations</strong></h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus text-white"></i></button>
					</div>
				</div>
				<div class="box-body">
					<li> Here you can make select the package you want!</li>
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

			<!-- donations info box -->
			<div class="box bg-red box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><strong>Quick Tips</strong></h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus text-white"></i></button>
					</div>
				</div>
				<div class="box-body">
					<li>Make sure you have the amount you wish to donate at hand.</li>
					<li>Select the amount you want. </li>
					<li>Confirm the option from the modal dialogue</li>
					<li>Wait for our pairing engine to find you a partner. </li>
					<li>After you have paid, you upload the details of your payment your paired partner. </li>
					<li>When your payment is confirmed, you willl automatically be in line to receive your bonus after the required duration.</li>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- donation packages box -->
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
					<div class="col-md-3 col-sm-6">
						<div class="box box-<?php echo $packages_selectable[$x]['class']; ?> box-solid">
							<div class="box-header with-border text-center show-block">
								<h3 class="box-title"><?php echo strtoupper($packages_selectable[$x]['type']); ?></h3>
							</div>
							<div class="box-body text-center">
								<h4 class="text-muted"> PAY </h4> <h3> N<?php echo number_format($packages_selectable[$x]['amount']); ?> </h3> <h4 class='text-muted'> RECEIVE </h2> <h1>  N<?php echo number_format($packages_selectable[$x]['amount'] * 2); ?> </h1>
							</div>
							<div class="box-footer text-center">
								<a href="<?php echo site_url("frontoffice/donation/make/".$packages_selectable[$x]['id']); ?>" class="btn btn-primary btn-flat">Select Package</a>
							</div>
						</div>
					</div>

					<?php } ?>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div> <!-- #ajax_holder -->
</div>
<!-- /.content-wrapper -->

<script>
	jQuery(document).ready(function($) {
		$("ul.sidebar-menu li > a[href='<?php echo site_url("frontoffice/donation/make"); ?>']").parent().addClass("active");
	});
</script>