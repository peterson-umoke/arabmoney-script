<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>




<?php

    if($javascript):
        echo "<!-- #javascript-files -->".PHP_EOL;
        foreach($javascript as $id => $url) :
            echo "<!-- import {$id}-js into the html file -->".PHP_EOL;
            echo "<script src=\"{$url}\"></script>".PHP_EOL;
        endforeach;
    endif;
?>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>