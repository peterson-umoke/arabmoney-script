<div id="content">

    <div class="top-main-slideshow">
        <div class="main-slideshow-container">
            <div id="main-slider">
                <div class="item">
                    <img src="<?php echo get_uploads_url(); ?>/11.jpg" alt="" class="img-responsive">
                    <div class="slide-desc">
                        <h3><?=$site_name; ?> is an online mutual help community committed to enriching lives .</h3>
                        <a href="<?php echo site_url("register"); ?>" class="btn btn-primary btn-lg btn-flat"> Create an Account </a>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo get_uploads_url(); ?>/22.jpg" alt="">
                    <div class="slide-desc">
                        <h3>IF YOU WOULD BE WEALTHY, THINK OF SAVING AS WELL AS GETTING.</h3>
                        <a href="<?php echo site_url("register"); ?>" class="btn btn-info btn-lg btn-flat"> Create an Account </a>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo get_uploads_url(); ?>/44.jpg" alt="">
                    <div class="slide-desc">
                        <h3>THROUGH PEER TO PEER DONATIONS, YOU GET 50% OF YOUR INVESTEMENT IN 10 DAYS,</h3>
                        <a href="<?php echo site_url("register"); ?>" class="btn btn-danger btn-lg btn-flat"> Register Now </a>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo get_uploads_url(); ?>/22.jpg" alt="">
                    <div class="slide-desc">
                        <h3>WE ALSO OFFER LOAN SERVICES, WE ARE ALWAYS A FRIEND TO TALK TO!</h3>
                        <a href="<?php echo site_url("contact-us"); ?>" class="btn btn-success btn-lg btn-flat"> Let's Talk </a>
                    </div>
                </div>
            </div>
            <!-- /#main-slider -->
        </div>
    </div>

    <!-- *** PRICING TABLE ***
 _________________________________________________________ -->
 <div class="box">
    <div class="container">
        <div class="row">
            <h1 class="text-uppercase text-center page-header">Packages</h1>
        </div>
        <div class="row">
            <div class="col-md-3" data-animate="fadeInDown">
                <div class="panel panel-default btn-flat">
                    <div class="panel-heading">
                        <h4 class="text-center">Starter Package</h4>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead">
                            <h1>N<?php echo number_format(5000); ?></h1>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>2:1 Matrix Auto-Recycle</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Auto Assign</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Cashout anytime</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Strict Auto Recycle </li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Account - Unit Conversion </li>
                        <li class="list-group-item"><i class="fa fa-times pull-right"></i> Austere Measure </li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>N10,000 Return Investment</li>
                    </ul>
                    <div class="panel-footer text-center center-block">
                        <a class="btn btn-flat btn-success" href="<?php echo site_url("frontoffice/donation/1"); ?>">Sign Up Now!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-animate="fadeInUp">
               <div class="panel panel-default btn-flat">
                    <div class="panel-heading">
                        <h4 class="text-center">Bronze Package</h4>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead">
                            <h1>N<?php echo number_format(30000); ?></h1>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>1:1 Matrix Auto-Recycle</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Auto Assign</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Cashout anytime</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Strict Auto Recycle </li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Account - Unit Conversion </li>
                        <li class="list-group-item"><i class="fa fa-times pull-right"></i> Austere Measure </li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>N60,000 Return Investment</li>
                    </ul>
                    <div class="panel-footer text-center center-block">
                        <a class="btn btn-flat btn-success" href="<?php echo site_url("frontoffice/donation/2"); ?>">Sign Up Now!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-animate="fadeInDown">
                <div class="panel panel-danger btn-flat">
                    <div class="panel-heading">
                        <h4 class="text-center text-capitalize">diamond package</h4>
                    </div>
                    <div class="panel-body text-center">
                        <div class="lead">
                            <h1>N<?php echo number_format(50000); ?></h1>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>1:1 Matrix Auto-Recycle</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Auto Assign</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Cashout anytime</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Strict Auto Recycle </li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Account - Unit Conversion </li>
                        <li class="list-group-item"><i class="fa fa-times pull-right"></i> Austere Measure </li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>N100,000 Return Investment</li>
                    </ul>
                    <div class="panel-footer center-block text-center">
                        <a class="btn btn-flat btn-danger" href="<?php echo site_url("frontoffice/donation/3"); ?>">Sign Up Now!</a>
                    </div>
                    <div class="ribbon message danger">
                        <div class="theribbon text-uppercase">Most Preffered</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->
                </div>
            </div>
            <div class="col-md-3" data-animate="fadeInUp">
                <div class="panel panel-default btn-flat">
                    <div class="panel-heading">
                        <h4 class="text-center text-capitalize">Gold package</h4>
                    </div>
                    <div class="panel-body text-center">
                        <div class="lead">
                            <h1>N<?php echo number_format(100000); ?></h1>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>1:1 Matrix Auto-Recycle</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Auto Assign</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Cashout anytime</li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Strict Auto Recycle </li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>Account - Unit Conversion </li>
                        <li class="list-group-item"><i class="fa fa-times pull-right"></i> Austere Measure </li>
                        <li class="list-group-item"><i class="fa fa-check pull-right"></i>N200,000 Return Investment</li>
                    </ul>
                    <div class="panel-footer center-block text-center">
                        <a class="btn btn-flat btn-success" href="<?php echo site_url("frontoffice/donation/4"); ?>">Sign Up Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><!-- /.box -->

<!-- *** PRICING TABLE END *** -->

<!-- *** TESTIMONIAL HOMEPAGE ***
 _________________________________________________________ -->

 <div class="container">
     <div id="testimonials" data-animate="fadeInUp">
        <div class="row">
            <h1 class="page-header text-center">
                Testimonials
            </h1>
        </div>

         <div class="row text-center">
            <?php for($x =0; $x < count($testimonials); $x++): ?>
             <div class="col-sm-3">
                 <div class="simple-box">
                 <img src="<?php echo isset($testimonials[$x]['profile_picture']) ? $testimonials[$x]['profile_picture'] : get_image_url()."/avatar04.png"; ?>" alt="users-picture" class="img-circle img-responsive">
                    <h4><?php echo ucwords($testimonials[$x]['title']); ?></h4>
                    <p class="author-category">By <a href="#"><?php echo ucwords($testimonials[$x]['first_name'] . " ".$testimonials[$x]['last_name']); ?></a> on <time><?php echo date("D, d M, Y",$testimonials[$x]['created_on']); ?></time>
                    </p>
                    <hr>
                    <p class="intro"><?php echo ucwords($testimonials[$x]['description']); ?></p>
                </div>
             </div>
             <?php endfor; ?>
         </div>
     </div>
 </div><!-- .container -->

 <!-- *** TESTIMONIAL HOMEPAGE END *** -->


<!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->
    <div class="box text-center" data-animate="fadeInUp">
        <div class="container">
            <div class="col-md-12">
                <h3 class="text-uppercase">From our blog</h3>

                <p class="lead">What's new in arabnaira? <a href="http://blog.arabnaira.com">Check our blog!</a>
                </p>
            </div>
        </div>
    </div>
    <!-- *** BLOG HOMEPAGE END *** -->

</div>
<!-- /#content -->