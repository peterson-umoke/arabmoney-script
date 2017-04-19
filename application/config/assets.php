<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The assets configuration file
 */

$config['necessary_javascript_files'] = array(
		"jquery" => get_js_url().'/vendor/jquery.js',
		"jquery-migrate" => get_js_url().'/vendor/jquery-migrate.min.js',
		"modernizr" => get_js_url().'/vendor/modernizr-2.8.3-respond-1.4.2.min.js',
	);

$config['necessary_stylesheet_files'] = array(
		"bootstrap" => get_css_url().'/bootstrap.min.css',
		"fontawesome" => get_css_url().'/font-awesome.css',
		// "google_font_1" => "//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic",
		// "google_font_2" => "//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic",
		"roboto-font" => 'http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100',
	);