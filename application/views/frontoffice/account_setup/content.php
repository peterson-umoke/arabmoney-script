<!-- Content Header (Page header) -->
<section class="content-header text-center">
	<h1>
		<?php echo isset($page_title) ? $page_title : $title; ?>
		<div class="clearfix"></div>
		<small><?php echo isset($description) ? $description : "" ?></small>
	</h1>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="col-md-8 col-md-push-2 col-sm-8 col-sm-push-1">
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Update your account details here</h3>
		</div>
		<?php echo form_open(site_url(uri_string()), 'name= "account_update_form" class="account_update_form"'); ?>
		<div class="box-body">

				<div class="row">
					<div class="col-md-12">
						<div class="center-block text-center">
							<img src="<?php echo isset($single_user['profile_pic']) ? $single_user['profile_pic'] : get_image_url()."/avatar04.png"; ?>" alt="<?php echo $single_user['first_name']; ?>'s profile picture" class="img-circle">
						</div>
						<br>

						<div class="form-group text-center">
							<p class="help-block">Update your profile picture here.</p>
							<input type="file" id="profile_pic" class="center-block" style="border:2px solid #ccc;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="firstName">First Name: </label>
						    <input type="type" class="form-control" id="firstName" placeholder="First Name" name="firstName" value="<?php echo isset($single_user['first_name']) ? $single_user['first_name'] : ""; ?>" autocomplete="off">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="lastName">Last Name: </label>
						    <input type="type" class="form-control" id="lastName" placeholder="Last Name" name="lastName" value="<?php echo isset($single_user['last_name']) ? $single_user['last_name'] : ""; ?>" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="emaillAddress">Email Address: </label>
						    <input type="email" class="form-control" id="emaillAddress" placeholder="Email Address" name="emaillAddress" value="<?php echo isset($single_user['email']) ? $single_user['email'] : ""; ?>" disabled>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="mobileNumber">Phone Nummber(for sms alert only): </label>
						    <input type="text" maxlength="11" class="form-control" id="mobileNumber" placeholder="Phone Nummber(for sms alert only)" name="mobileNumber" value="<?php echo isset($single_user['mobile']) ? $single_user['mobile'] : ""; ?>" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<label for="bank_name">Bank Name: </label>
						<select name="bank_name" id="bank_name" class="form-control">
							<option value="null">No Bank Selected</option>
							<option>Access Bank</option>
							<option>Citi Bank</option>
							<option>Diamond Bank</option>
							<option>Ecobank</option>
							<option>Fidelity Bank</option>
							<option>First Bank</option>
							<option>FCMB</option>
							<option>GTB</option>
							<option>Heritage Bank</option>
							<option>Keystone Bank</option>
							<option>Skye Bank</option>
							<option>Stanbic IBTC</option>
							<option>Standard Chartered</option>
							<option>Sterling Bank</option>
							<option>Union Bank</option>
							<option>UBA</option>
							<option>Unity Bank</option>
							<option>Wema Bank</option>
							<option>Zenith Bank</option>
						<select/>
					</div>
				</div>
					<br>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="account_name">Account Name: </label>
						    <input type="text" maxlength="1000" class="form-control" id="account_name" placeholder="Account Name" name="account_name" value="<?php echo isset($single_user['account_name']) ? $single_user['account_name'] : ""; ?>" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="account_number">Account Number: </label>
						    <input type="text" maxlength="10" class="form-control" id="account_number" placeholder="Account Number" name="account_number" value="<?php echo isset($single_user['account_number']) ? $single_user['account_number'] : ""; ?>" autocomplete="off">
						</div>
					</div>
				</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<?php echo form_submit('account_update_btn', 'Update Profile','class="btn btn-block btn-success" id="submitBtn"'); ?>
		</div>
		<!-- /.box-footer-->
		<?php echo form_close(); ?>
	</div>
	<!-- /.box -->
	</div> <!-- .col-md-8 -->
	<div class="clearfix"></div>

</section>
<!-- /.content -->

<script>
	jQuery(document).ready(function($) {
		$("#bank_name").select2();
	});
</script>