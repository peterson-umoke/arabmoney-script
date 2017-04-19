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
			<br>
		</section>

		<!-- Main content -->
		<section class="content">

		<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><strong>Special Notice: Do you have a testimony ?</strong></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body bg-info">
					In case if you have a testimonial to add, please click <a href="<?php echo site_url("frontoffice/testimonial/add_new_testimonial"); ?>" class="btn btn-default"> Here </a> or send a mail to support@arabnaira.com
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<div class="box box-solid overide-box">
				<a href="<?php echo site_url("frontoffice/testimonial/add_new_testimonial"); ?>" class="btn btn-primary btn-flat">Add testimony</a>
				<a href="<?php echo site_url("frontoffice/feedbacks/add"); ?>" class="btn btn-danger btn-flat">Report a fake testimony</a>
			</div>

			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">All <?=$title; ?></h3>

					<div class="box-tools pull-right">
						<a href="<?php echo site_url("frontoffice/testimonial/add_new_testimonial"); ?>" class="btn btn-box-tool" data-widget="add new testimony" data-toggle="tooltip" title="Add New Testimony"><i class="fa fa-edit"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					 <table id="testimonial_table" class="table table-bordered table-hover table-striped table-condensed" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>As Testified By</th>
                </tr>
                </thead>
                <tbody>
                <?php for($x = 0; $x < count($all_testimonials);$x++) { ?>
	                <tr>
	                  <td><?php echo date('j F, Y',$all_testimonials[$x]['created_on']); ?></td>
	                  <td> <?php echo ucwords($all_testimonials[$x]['title']); ?> </td>
	                  <td><?php echo ucwords($all_testimonials[$x]['description']); ?></td>
	                  <td class="">
	                  	<?php echo $all_testimonials[$x]['first_name'] . " ".$all_testimonials[$x]['last_name']; ?> 
	                  	<img src="<?php echo isset($all_testimonials[$x]['profile_picture']) ? $all_testimonials[$x]['profile_picture'] : get_image_url()."/avatar04.png"; ?>" style="margin-right:20px;height:25px;width:25px;border-radius: 50%;float:left;" alt="User Image"> 
	                  </td>
	                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>As Testified By</th>
                </tr>
                </tfoot>
              </table>
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
		    $('#testimonial_table').DataTable({
		      "paging": true,
		      "lengthChange": true,
		      "searching": true,
		      "order": [[ 0, "desc" ]],
		      "ordering": true,
		      "info": true,
		      "autoWidth": true,
		      "columnDefs": [
		          { "width": "7%", "targets": 0 },
		          { "width": "10%", "targets": 1 },
		          { "width": "20%", "targets": 2 },
		          { "width": "10%", "targets": 3 },
		        ]
		    });
	});
</script>