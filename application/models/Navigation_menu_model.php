<?php  defined("BASEPATH") or die("No direct script call is allowed");

public class Navigation_menu_model extends CI_Model {

	// the main navigation attribute
	public $menu = array();

	public $nav =  array(
				array(
						"site_icon" => "fa fa-dashboard",
						"url" => "frontoffice/dashboard/welcome",
						"title" => "frontoffice/dashboard",
						"name" => "dashboard",
						"has_children" => false,
						"children_items" => array(),
					),
				array(
						"site_icon" => "fa fa-users",
						"url" => "frontoffice/account",
						"title" => "",
						"name" => "Your Account",
						"has_children" => false,
						"children_items" => array(),
					),
				array(
						"site_icon" => "fa fa-money",
						"url" => "frontoffice/transactions",
						"title" => "",
						"name" => "Transactions",
						"has_children" => false,
						"children_items" => array(),
					),
				array(
						"site_icon" => "fa fa-cog",
						"url" => "frontoffice/settings",
						"title" => "",
						"name" => "Settings",
						"has_children" => false,
						"children_items" => array(),
					),
			);

	public function __construct() {
		parent::__construct();
	}

	public function spit_menu($menu = array()) {
		$this->menu[] = $menu;

		return $menu;
	}
}