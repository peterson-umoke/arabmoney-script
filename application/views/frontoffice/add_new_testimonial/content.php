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

			<div class="box box-success box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><strong>Special Notice: Preach the <strong><?= $site_name; ?></strong> Gospel</strong></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body bg-info">
					Your testimony will help alot of people realise that <strong> <?= $site_name; ?> </strong> is not a scam and has come to stay to help better the lives of nigerians. Please spread the word, preach the <strong> <?= $site_name; ?> </strong> gospel.
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- Default box -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Add Your Testimony</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>
				</div>
				<form action="<?php echo site_url(uri_string()); ?>" role="testimonial form" method="post">
				<div class="box-body">
						<div class="form-group">
							<label for="title">Title of testimony</label>
							<input type="text" id="title" name="title" class="form-control" value="<?php echo set_value("title"); ?>">
						</div>
						<div class="form-group">
							<label for="description">Explain what happened to you!</label>
							<textarea name="description" id="description" cols="30" rows="10" class="form-control"><?php echo set_value("description"); ?></textarea>
						</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button class="btn btn-success btn-flat btn-md">Submit</button>
				</div>
				<!-- /.box-footer-->
				</form>
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div> <!-- #ajax_holder -->
</div>
<!-- /.content-wrapper -->

<script>
	jQuery(document).ready(function($) {
		$("ul.sidebar-menu li > a[href='<?php echo site_url("frontoffice/testimonies"); ?>']").parent().addClass("active");
	});
</script>