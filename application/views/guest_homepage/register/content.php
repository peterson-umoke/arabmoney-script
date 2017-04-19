<br>
<div id="content">
    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li>Create new account</li>
            </ul>

        </div>

        <div class="col-md-8 col-md-push-2">
            <div class="box">
                <h1>New account</h1>

                <p class="lead">Not our registered customer yet?</p>
                <p>With registration with us new world of opportunies and much more opens to you! The whole process will not take you more than a minute!</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="<?php echo site_url("contact"); ?>">contact us</a>, our customer service center is working for you 24/7.</p>

                <hr>

                <form action="<?php echo site_url("guest_homepage/register_new_user"); ?>" method="post" id="registration_form">
                <div class="alert alert-success btn-flat register_success" style="display: none;"></div>
                <div class="alert alert-danger btn-flat register_fail" style="display: none;"></div>
                <h3 class="page-header"> Personal Information </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control btn-flat" id="fname" name="fname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control btn-flat" id="lname" name="lname">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile_number">Mobile Phone</label>
                        <input type="text" maxlength="11" class="form-control btn-flat" id="mobile_number" name="mobile">
                    </div>

                    <h3 class="page-header"> Account Information </h3>
                    <div class="form-group">
                        <label for="email">Email (<small class="text-muted"> cant be changed again </small>)</label>
                        <input type="text" class="form-control btn-flat" id="email" name="email">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control btn-flat" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="repeat_password">Repeat Password</label>
                                <input type="password" class="form-control btn-flat" id="repeat_password" name="repeat_password">
                            </div>
                        </div>
                    </div>

                    <h3 class="page-header"> Banking Information </h3>
                    <div class="form-group">
                        <label for="bank_name">Bank Name</label>
                        <?php echo form_dropdown('bank_name', $bank_name_options, (!empty($bank_name)) ? $bank_name : set_value("bank_name"),"class=\"form-control btn-flat bank_name\" style=\"width: 100%;\" id='bank_name'"); ?>
                    </div>
                    <div class="form-group">
                        <label for="account_name">Account Name</label>
                        <input type="text" maxlength="100" class="form-control btn-flat" id="account_name" name="account_name">
                    </div>
                    <div class="form-group">
                        <label for="account_number">Account Number</label>
                        <input type="text" maxlength="10" class="form-control btn-flat" id="account_number" name="account_number">
                    </div>
                    <div class="form-group">
                        <label for="Iistruction" class="control-label">Payment Instruction</label>
                        <input type="text" disabled="disabled" class="form-control btn-flat" value="Please alert me before, on and after payment!.">
                        
                    </div>

                    <div class="alert alert-success btn-flat register_success" style="display: none;"></div>
                    <div class="alert alert-danger btn-flat register_fail" style="display: none;"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-user"></i> Register</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->

<script>
    jQuery(document).ready(function($) {
            // $(".bank_name").select2({
                // placeholder: "Select a Bank",
            // });
    });
</script>