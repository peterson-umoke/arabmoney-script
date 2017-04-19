<!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="<?php echo base_url(); ?>" data-animate-hover="bounce">
                    <?php if(isset($site_logo)): ?>
                    <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                    <?php else: ?>
                    <h4> <?php echo strtoupper($site_name); ?> </h4>
                    <?php endif; ?>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class=""><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <?php foreach($primary_navigation as $key => $value): ?>
                        <li class=""><a href="<?php echo $value; ?>"><?php echo $key; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->