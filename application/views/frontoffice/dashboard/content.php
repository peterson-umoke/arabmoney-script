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
					<div class="col-md-3 col-sm-6">
						<div class="box box-primary box-solid">
							<div class="box-header with-border text-center show-block">
								<h3 class="box-title">Starter Package</h3>
							</div>
							<div class="box-body text-center">
								<h4 class="text-muted"> PAY </h4> <h3> N5,000 </h3> <h4 class='text-muted'> RECEIVE </h2> <h1> N10,000 </h1>
							</div>
							<div class="box-footer text-center">
								<a href="#" class="btn btn-primary btn-flat">Select Package</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="box box-danger box-solid">
							<div class="box-header with-border text-center show-block">
								<h3 class="box-title">Bronze Package</h3>
							</div>
							<div class="box-body text-center">
								<h4 class="text-muted"> PAY </h4> <h3> N10,000 </h3> <h4 class='text-muted'> RECEIVE </h2> <h1> N20,000 </h1>
							</div>
							<div class="box-footer text-center">
								<a href="#" class="btn btn-danger btn-flat">Select Package</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="box box-success box-solid">
							<div class="box-header with-border text-center show-block">
								<h3 class="box-title">Silver Package</h3>
							</div>
							<div class="box-body text-center">
								<h4 class="text-muted"> PAY </h4> <h3> N30,000 </h3> <h4 class='text-muted'> RECEIVE </h2> <h1> N60,000 </h1>
							</div>
							<div class="box-footer text-center">
								<a href="#" class="btn btn-success btn-flat">Select Package</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="box box-info box-solid">
							<div class="box-header with-border text-center show-block">
								<h3 class="box-title">
									Gold Package
								</h3>
							</div>
							<div class="box-body text-center">
								<h4 class="text-muted"> PAY </h4> <h3> N50,000 </h3> <h4 class='text-muted'> RECEIVE </h4> <h1> N100,000 </h1>
							</div>
							<div class="box-footer text-center">
								<a href="#" class="btn btn-info btn-flat">Select Package</a>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div> <!-- #ajax_holder -->
</div>
<!-- /.content-wrapper -->