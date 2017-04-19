<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_homepage_model extends CI_model {

	public $scripts;
	public $styles;
	public $nav_menu;


	public function __construct() {
		parent::__construct();

		// default all
		$this->script = array();
		$this->styles = array();
		$this->nav_menu = array();
	}

	public function primary_navigation() {
		$nav_menu = array(
			"Blog" => site_url("view-blog"),
			"about us" => site_url('about'),
			"FAQ" => site_url("faq"),
			"Contact Us" => site_url("contact"),
		);

		return $this->nav_menu = $nav_menu;
	}

	public function login_navigation() {
		$nav_menu = array(
			"login" => site_url('frontoffice/account/login'),
			"register" => site_url("frontoffice/account/register"),
			"contact us" => site_url('contact-us'),
		);

		return $this->nav_menu = $nav_menu;
	}

	public function footer_primary_navigation() {
		$nav_menu = array(
				"about us" => site_url('about-us'),
				"privacy policies" => site_url("privacy-policies"),
				"FAQ" => site_url("#faq"),
			);

		return $this->nav_menu = $nav_menu;
	}

	public function footer_secondary_navigation() {
		$nav_menu =array(
				"login" => site_url('login'),
				"register" => site_url("register"),
				"terms and conditions" => site_url('terms-and-conditions'),
				"the backOffice" => site_url("backoffice"),
		);

		return $this->nav_menu = $nav_menu;
	}
}