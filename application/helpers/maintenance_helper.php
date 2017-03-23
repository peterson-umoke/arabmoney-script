<?php defined("BASEPATH") or die("No direct script call is allowed"); 

function page_under_maintenance() {
	return show_error("This page is under maintenance. Please check back later, ".simple_btn("Go home"));
	// show_404();
}