<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="robots" content="all,follow">
<meta name="googlebot" content="index,follow,snippet,archive">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo isset($title) ? $title . " | ". $site_name : $site_name; ?></title>
<meta name="description" content="<?php echo isset($seo_description) ? $seo_description : ""; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" href="<?php echo site_url(); ?>/apple-touch-icon.png">
<link rel="shortcut icon" href="<?php echo site_url(); ?>/favicon.ico">

<?php
        if($necessary_stylesheet_files):
            echo "<!-- #necessary-stylesheet files -->".PHP_EOL;
            foreach($necessary_stylesheet_files as $id => $url) :
                echo "<!-- import {$id}-css into the html file -->".PHP_EOL;
                echo "<link  id='{$id}-css' type='text/css' rel='stylesheet' href='{$url}' />".PHP_EOL;
            endforeach;
        endif;

        // import css files
        if($stylesheet):
            foreach($stylesheet as $id => $url) :
                echo "<!-- import {$id}-css into the html file -->".PHP_EOL;
                echo "<link  id='{$id}-css' type='text/css' rel='stylesheet' href='{$url}' />".PHP_EOL;
            endforeach;
        endif;?>

<?php // this is done to input line breaks in the html output
        if($necessary_javascript_files):
            echo "<!-- #necessary-javascript files, jquery, jquery-migrate, modernizr -->".PHP_EOL;
            foreach($necessary_javascript_files as $id => $url) :
                echo "<!-- import {$id}-js into the html file -->".PHP_EOL;
                echo "<script src=\"{$url}\"></script>".PHP_EOL;
            endforeach;
        endif;
?>

</head>
<body>

<noscript> YOU NEED JAVASCRIPT TO USE THIS SITE PROPERLY </noscript>

<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->