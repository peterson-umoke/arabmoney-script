<?php  defined("BASEPATH") or die("No direct script call is allowed");

public class Navigation_menu_model extends CI_Model {

	// the main navigation attribute
	public $menu = array();

	public function __construct() {
		parent::__construct();
	}

	public function spit_menu($menu = array()) {
		$this->menu[] = $menu;

		return $menu;
	}
}