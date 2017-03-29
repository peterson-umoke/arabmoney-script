</div> <!-- wrapper -->
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
<script></script>
</body>
</html>