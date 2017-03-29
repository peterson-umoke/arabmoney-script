<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function get_assets_url() {
	return site_url()."public_assets";
}

function get_image_url() {
	return get_assets_url().'/img';
}

function get_script_url() {
	return get_assets_url().'/js';
}

function get_js_url() {
	return get_assets_url().'/js';
}

function get_uploads_url() {
	return get_assets_url().'/uploads';
}

function get_stylesheet_url() {
	return get_assets_url().'/css';
}

function get_css_url() {
	return get_assets_url().'/css';
}

function get_plugins_url() {
	return get_assets_url().'/plugins';
}

function bootstrap_css_url() {
	return get_css_url().'/bootstrap.min.css';
}

function bootstrap_theme_css_url() {
	return get_css_url().'/bootstrap-theme.min.css';
}

function bootstrap_js_url() {
	return get_script_url().'/bootstrap.min.js';
}

function jquery_js_url() {
	return get_script_url().'/vendor/jquery-1.11.2.min.js';
}

function jquery_migrate_js_url() {
	return get_script_url().'/vendor/jquery-migrate.min.js';
}

function modernizr_js_url() {
	return get_script_url().'/vendor/modernizr-2.8.3-respond-1.4.2.min.js';
}

function admin_dashboard_css_url() {
	return get_css_url().'/AdminLTE.min.css';
}

// spit the function out
function assets_url() {
	return get_assets_url();
}