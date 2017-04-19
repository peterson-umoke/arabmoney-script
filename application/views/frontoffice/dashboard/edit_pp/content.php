<?php extract($pop); ?>

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

			<div class="callout callout-warning">
				Make sure to be detailed when necessary
			</div>

			<!-- Default box -->
			<div class="box box-warning">
				<div class="box-header with-border">
					<h3 class="box-title">Proof of Payment</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<?php if($failed_messages): ?>
						<div class="alert alert-danger">
							<h3>Alert</h3>
							<?php echo $failed_messages; ?>
						</div>
					<?php endif; ?>
					<?php if($success_messages): ?>
						<div class="alert alert-success">
							<h3>Success</h3>
							<?php echo $success_messages; ?>
						</div>
					<?php endif; ?>
					<?php echo form_open_multipart(site_url(uri_string()),"name='edit_pp_form'"); ?>
						<div class="form-horizontal">
		                  <div class="form-group">
		                    <label for="teller_number" class="col-sm-2 control-label">Teller Number</label>

		                    <div class="col-sm-10">
		                      <input autocomplete="off" type="text" maxlength="10" value="<?php echo isset($teller_num) ? $teller_num : set_value('teller_number'); ?>" name="teller_number" class="form-control" id="teller_number" placeholder="Teller Number">
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="bank_paid_to" class="col-sm-2 control-label">Bank Name</label>

		                    <div class="col-sm-10">
		                      <?php echo form_dropdown('bank_paid_to', array(
		                      	" " => " ",
					"Access Bank" => "Access Bank",
					"Citi Bank" => "Citi Bank",
					"Diamond Bank" => "Diamond Bank",
					"Ecobank" => "Ecobank",
					"Fedility Bank" => "Fedility Bank",
					"First Bank" => "First Bank",
					"FCMB" => "First City Monument Bank(FCMB)",
					"Guarantee Trust Bank(GT-Bank)" => "Guarantee Trust Bank(GT-Bank)",
					"Heritage Bank" => "Heritage Bank",
					"Keystone Bank" => "Keystone Bank",
					"Skye Bank" => "Skye Bank",
					"Stanbic IBTC Bank" => "Stanbic IBTC Bank",
					"Standard Chartered Bank" => "Standard Chartered Bank",
					"Sterling Bank" => "Sterling Bank",
					"Union Bank" => "Union Bank",
					"UBA" => "United Bank for Africa(UBA)",
					"Unity Bank" => "Unity Bank",
					"Wema Bank" => "Wema Bank",
					"Zenith Bank" => "Zenith Bank",
				), (!empty($bank_paid_to)) ? $bank_paid_to : set_value("bank_paid_to"),"class=\"form-control bank_paid_to\" style=\"width: 100%;\" id='bank_paid_to'"); ?>
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="bank_branch" class="col-sm-2 control-label">Bank Branch</label>

		                    <div class="col-sm-10">
		                      <input autocomplete="off" type="text" minlength="5" value="<?php echo isset($bank_branch) ? $bank_branch : set_value('bank_branch'); ?>" class="form-control" name="bank_branch" id="bank_branch" placeholder="Bank Branch">
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="transaction_type" class="col-sm-2 control-label">Transaction Type</label>

		                    <div class="col-sm-10">
		                    <?php echo form_dropdown('transaction_type', array(" "=>" ","Transfer"=>"Transfer","Deposit"=>"Deposit","By Cash"=>"By Cash"), (!empty($transaction_type)) ? $transaction_type : set_value("transaction_type"),"class=\"form-control transaction_type\" style=\"width: 100%;\" id='transaction_type'"); ?>
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="account_name_used" class="col-sm-2 control-label">Account Name Used</label>

		                    <div class="col-sm-10">
		                      <input autocomplete="off" type="text" minlength="5" value="<?php echo isset($account_name_used) ? $account_name_used : set_value('account_name_used'); ?>" class="form-control" name="account_name_used" id="account_name_used" placeholder="The Account Name You Used to pay the money">
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="amount_paid" class="col-sm-2 control-label">Amount Paid</label>

		                    <div class="col-sm-10">
			                    <div class="input-group">
								<span class="input-group-addon">N</span>
								<input autocomplete="off" type="text" minlength="5" value="<?php echo isset($amount_paid) ? $amount_paid : set_value('amount_paid'); ?>" class="form-control" name="amount_paid" id="amount_paid" placeholder="Amount Paid">
								</div>
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="payment_description" class="col-sm-2 control-label">Payment Description</label>

		                    <div class="col-sm-10">
		                      <textarea class="form-control" name="payment_description" placeholder="Payment Description" id="payment_description" cols="30" rows="10"><?php echo isset($payment_description) ? $payment_description : set_value('payment_description'); ?></textarea>
		                    </div>
		                  </div>
							<div class="form-group">
							<h4 class="text-center">OR</h4>
							</div>
							<div class="form-group">
							  <label for="pop_picture" class="col-sm-2 control-label">Payment Picture</label>
							  <div class="col-sm-10">
							  		<?php if(isset($proof_of_payment_picture)): ?>
							  		<img src="<?php echo $proof_of_payment_picture; ?>" class="pull-left img-responsive" style="width:50px;height:50px;margin-right:10px;margin-bottom:20px;" alt="proof_of_payment_picture'proof">
							  		<a href="#" class="btn btn-default btn-flat"data-toggle="modal" data-target="#popImage" data-toggle="tooltip" data-placement="right" title="Click on the image to view the larger version" style="margin-top:10px;">View Image</a>
							  			
							  		<!-- Modal -->
									<div class="modal fade" id="popImage" tabindex="-1" role="dialog" aria-labelledby="popImageLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Proof of Payment Picture</h4>
									      </div>
									      <div class="modal-body">
									        <img src="<?php echo $proof_of_payment_picture; ?>" class="img-responsive center-block text-center" alt="proof_of_payment_picture'proof">
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn text-center center-block btn-danger btn-flat" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
									      </div>
									    </div>
									  </div>
									</div>
								  	<?php endif; ?>
								  <?php echo form_upload("pop_picture",null,"class='form-control' id='pop_picture'") ?>

								  <p class="help-block">Proof of payment should be scanned, images accepted are .png, .gif,.jpg.</p>
							  </div>
							</div>
		                  <button class="btn btn-warning btn-flat btn-block">Update Proof of Payment</button>
		                </div><!-- /.form-horizontal -->
						<?php echo form_close(); ?>
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
	$("ul.sidebar-menu li > a[href='<?php echo site_url("frontoffice"); ?>']").parent().addClass("active");	
});

</script>