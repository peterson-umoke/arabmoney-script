<?php extract($single_user); ?><!-- Content Wrapper. Contains page content -->
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

			<div class="alert alert-info">
				<h4>
					<i class="fa fa-info-circle"></i> Save Changes
				</h4>
				Once you are done with your changes kindly click on the update button
			</div>

			<?php if($message_to_user): ?>
				<div class="alert alert-danger inner_alert alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>
						<i class="fa fa-info-circle"></i> Alert
					</h4>
					<?php  echo $message_to_user; ?>
				</div>
			<?php endif; ?>


		<?php echo form_open(site_url("frontoffice/account/edit_profile/"),"name='edit_profile_form'"); ?>
			
			<div class="row">
		        <div class="col-md-3">

		          <!-- Profile Image -->
		          <div class="box box-primary">
		            <div class="box-body box-profile">
		            <img src="<?php echo isset($single_user['profile_pic']) ? $single_user['profile_pic'] : get_image_url()."/avatar04.png"; ?>" alt="<?php echo $first_name ."-".$last_name."-profile-picture"; ?>" class="profile-user-img img-responsive img-circle">

		              <h3 class="profile-username text-center"><?php echo $first_name . " ". $last_name; ?></h3>

		              <p class="text-muted text-center"><?php echo $email; ?></p>

		              <button class="btn btn-primary btn-block">Update Profile</button>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		        </div>
		        <!-- /.col -->

		        <div class="col-md-9">
		          <div class="nav-tabs-custom">
		            <ul class="nav nav-tabs">
		              <li class="active"><a href="#activity" data-toggle="tab">Personal Information</a></li>
		              <li><a href="#settings" data-toggle="tab">Banking Information</a></li>
		            </ul>
		            <div class="tab-content">
		              <div class="active tab-pane" id="activity">
		               <div class="form-horizontal">
		                  <div class="form-group">
		                    <label for="first_name" class="col-sm-2 control-label">First Name</label>

		                    <div class="col-sm-10">
		                      <input type="text" maxlength="10" value="<?php echo isset($first_name) ? $first_name : ""; ?>" name="first_name" class="form-control" id="first_name" placeholder="First Name">
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="last_name" class="col-sm-2 control-label">Last Name</label>

		                    <div class="col-sm-10">
		                      <input type="text" value="<?php echo isset($last_name) ? $last_name : ""; ?>" class="form-control" name="last_name" id="last_name" placeholder="Last Name" maxlength="10">
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="email" class="col-sm-2 control-label">Email Address</label>

		                    <div class="col-sm-10">
		                      <input type="email" minlength="5" value="<?php echo isset($email) ? $email : ""; ?>" class="form-control" name="email" id="email" placeholder="Email Address" disabled>
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="mobile" class="col-sm-2 control-label">Phone Number</label>

		                    <div class="col-sm-10">
		                      <input type="text" maxlength="11" value="<?php echo ($mobile != 0) ? $mobile : set_value("mobile"); ?>" class="form-control" name="mobile" id="mobile" placeholder="Phone Number">
		                    </div>
		                  </div>
		                  <button class="btn btn-primary btn-block">Update Profile</button>
		                </div><!-- /.form-horizontal -->
		              </div>
		              <!-- /.tab-pane -->

		              <div class="tab-pane" id="settings">
		                <div class="form-horizontal">
		                 <div class="form-group">
		                    <label for="bank_name" class="col-sm-2 control-label">Bank Name</label>

		                    <div class="col-sm-10">
		                      <?php echo form_dropdown('bank_name', $bank_name_options, (!empty($bank_name)) ? $bank_name : set_value("bank_name"),"class=\"form-control bank_name\" style=\"width: 100%;\" id='bank_name'"); ?>
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="account_name" class="col-sm-2 control-label">Account Name</label>

		                    <div class="col-sm-10">
		                      <input type="text" value="<?php echo (!empty($account_name)) ? $account_name : set_value("account_name"); ?>" class="form-control" name="account_name" id="account_name" placeholder="Account Name" maxlength="100">
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="account_number" class="col-sm-2 control-label">Account Number</label>

		                    <div class="col-sm-10">
		                      <input type="text" maxlength="10" value="<?php echo (!empty($account_number)) ? $account_number : set_value("account_number"); ?>" name="account_number" class="form-control" id="account_number" placeholder="Account Number">
		                    </div>
		                  </div>
		                  <button class="btn btn-primary btn-block">Update Profile</button>
		                </div> <!-- /.form-horizontal -->
		              </div>
		              <!-- /.tab-pane -->
		            </div>
		            <!-- /.tab-content -->
		          </div>
		          <!-- /.nav-tabs-custom -->
		        </div>
		        <!-- /.col -->
		      </div>
      <!-- /.row -->

      <?php echo form_close(); ?>

		</section>
		<!-- /.content -->
	</div> <!-- #ajax_holder -->
</div>
<!-- /.content-wrapper -->

<script>
	jQuery(document).ready(function($) {
		$(".bank_name").select2();
		$(".inner_alert")
			.find("p")
			.wrap('<li></li>');
	});
</script>

<style>
.select2-container--default .select2-selection--single {
    border-radius: 0 ;
    border-color:#d2d6de;
}
.select2-container .select2-selection--single {
     height: auto ; 
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #555;
}
</style>