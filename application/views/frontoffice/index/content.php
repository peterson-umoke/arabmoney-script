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

			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Title</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					Start creating your amazing application!
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					Footer
				</div>
				<!-- /.box-footer-->
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div> <!-- #ajax_holder -->
</div>
<!-- /.content-wrapper -->