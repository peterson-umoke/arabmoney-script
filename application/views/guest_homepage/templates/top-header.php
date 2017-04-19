<!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <?php if(isset($ins_message) && !empty($ins_message)): ?>
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <!-- <a href="<?php echo site_url("frontoffice/account/register?promo_code=".md5("none")."&&new_user=1"); ?>" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#"><?php echo $ins_message; ?></a> -->
                <p class="social" style="margin-bottom:0;">
                    <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                    <a href="mailto:info@arabnaira.com" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                </p>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
            <?php else: ?><div class="pull-right" data-animate="fadeInDown">
            <?php endif; ?>
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="<?php echo site_url("frontoffice/account/register"); ?>">Register</a>
                    </li>
                    <li><a href="<?php echo site_url("contact-us"); ?>">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Member Login</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success success_message" style="display: none;">
                            <h4>
                                <i class="fa fa-info-circle"></i> Success
                            </h4>
                            <div class="alert-content"></div>
                        </div>
                        <div class="alert alert-danger error_message" style="display: none;">
                            <h4>
                                <i class="fa fa-info-circle"></i> Alert!
                            </h4>
                            <div class="alert-content"></div>
                        </div>
                        <div class="alert alert-info info_message" style="display: none;">
                            <h4>
                                <i class="fa fa-info-circle"></i> Message
                            </h4>
                            <div class="alert-content"></div>
                        </div>
                        <form action="<?php echo site_url("check-login"); ?>" method="post" class="login_form_home">
                            <div class="form-group">
                                <input type="text" class="form-control" name="identity" id="email-modal" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password-modal" placeholder="Password">
                            </div>

                            <div class="progress login_progress" style="display: none;">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                              </div>
                            </div>
                            
                            <p class="text-center">
                                <button class="btn btn-primary btn-flat"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>


                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="<?php echo site_url("frontoffice/account/register"); ?>"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->