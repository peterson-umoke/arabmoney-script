<?php defined("BASEPATH") or die("No direct script call is allowed");

class Notifications extends CI_controller {

	public function __construct() {
		parent::__construct();
		
		// redirect the user is the user is not logged in
		if(!$this->officekey->is_frontoffice_user()) {
			redirect('frontoffice/account/login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url(uri_string())).'&&userauth=1', 'refresh');
		}
	}

	public function index() {
		echo "notifications is live";
	}
}