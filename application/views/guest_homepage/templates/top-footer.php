<!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="<?php echo site_url(); ?>about-us">About us</a>
                            </li>
                            <li><a href="<?php echo site_url(); ?>faq">FAQ</a>
                            </li>
                            <li><a href="<?php echo site_url(); ?>contact">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4 class="text-capitalize">members section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="<?php echo site_url(); ?>register">Register</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4><?php echo $site_name; ?>'s Core Objective</h4>
                        <p>
                            The wellbeing of the populace are our long-term lead. The commitment of our members sets us stand out from the crowd, while we develop people for the enduring liability in a real-time process.
                        </p>

                        <h4>Top categories</h4>

                        <h5>Frontoffice Users</h5>

                        <ul>
                            <li><a href="<?php echo site_url("frontoffice/account/login"); ?>">Log in to the dashboard now</a>
                        </ul>

                        <h5 class="text-capitalize">Backoffice users</h5>
                        <ul>
                            <li><a href="<?php echo site_url("backoffice/account/login"); ?>">Log in now</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong><?= $site_name; ?>.</strong>
                            <br>13/25 New Avenue
                            <br>New Heaven
                            <br>45Y 73J
                            <br>England
                            <br>
                            <strong>Great Britain</strong>
                        </p>

                        <a href="<?php echo site_url("contact-us"); ?>">Go to contact page</a> or
                        <div class="clearfix"></div>
                        info@arabnaira.com

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Be the first to hear about new promo codes and new things on <?php echo $site_name; ?>. Sign up for our daily newsletter.</p>

                        <form action="<?php echo site_url("newsletter/sign_up"); ?>" method="Post" name="newsletter">
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

                    			    <button class="btn btn-default" type="button">Subscribe!</button>

                    			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="mailto:info@arabnaira.com" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->