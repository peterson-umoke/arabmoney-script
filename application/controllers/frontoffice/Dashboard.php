<?php 

defined('BASEPATH') or die("NO DIRECT SCRIPT CALL IS ALLOWED");

class Dashboard extends CI_Controller {
	
	// the data array elements
	public $data;

	public function __construct() {
		parent::__construct();

		// loaders
		$this->load->helper("string");
		$this->load->config("assets");

		// initiate the data attribute
		$this->data = array();
		$this->data['necessary_javascript_files'] = array();
		$this->data['necessary_styesheet_files'] = array();
		$this->data['stylesheet'] = array();
		$this->data['javascript'] = array();

		// load the data attribute
		$this->data['site_name'] = ucwords($this->config->item("site_name"));
		$this->data['necessary_stylesheet_files'] = $this->config->item("necessary_stylesheet_files");
		$this->data['necessary_javascript_files']['jquery'] = get_plugins_url().'/jQuery/jQuery-2.2.3.min.js';
		$this->data['necessary_javascript_files']['jquery-migrate'] = jquery_migrate_js_url();
		$this->data['necessary_javascript_files']['modernizr_js_url'] = modernizr_js_url();

		// stylesheet
		$this->data['stylesheet']['adminlte'] = get_css_url().'/AdminLTE.min.css';
		$this->data['stylesheet']['all_skins'] = get_css_url().'/skins/_all-skins.min.css';
		$this->data['stylesheet']['pace'] = get_plugins_url().'/pace/pace.min.css';
		$this->data['stylesheet']['select2'] = get_plugins_url().'/select2/select2.min.css';

		// javascript
		$this->data['javascript']['bootstrap'] = get_js_url().'/vendor/bootstrap.min.js';
		$this->data['javascript']['fastclick'] = get_plugins_url().'/fastclick/fastclick.js';
		$this->data['javascript']['select2'] = get_plugins_url().'/select2/select2.full.min.js';
		$this->data['javascript']['slimscroll'] = get_plugins_url().'/slimScroll/jquery.slimscroll.min.js';
		$this->data['javascript']['pace'] = get_plugins_url().'/pace/pace.min.js';
		$this->data['javascript']['app'] = get_js_url().'/app.min.js';
		$this->data['javascript']['main'] = get_js_url().'/main.js';

		// redirect the user is the user is not logged in
		if(!$this->officekey->is_frontoffice_user()) {
			redirect('login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url('frontoffice/account/login')).'&&userauth=1', 'refresh');
		}
	}

	public function index() {
		//data
		$this->data['title'] = "The FrontOffice";
		$this->data['seo_description'] = "The FrontOffice Homepage";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['description'] = "The FrontOffice Homepage";

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("index/header",$this->data);
		$this->_show_page("index/nav",$this->data);
		$this->_show_page("index/content",$this->data);
		$this->_show_page("index/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	/**
	 * the welcome method is simply the main landing page for the  homepage
	 * @return void
	 */
	public function welcome() {
		//data
		$this->data['title'] = "The FrontOffice";
		$this->data['seo_description'] = "The FrontOffice Homepage";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['description'] = "The FrontOffice Homepage";

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("welcome/header",$this->data);
		$this->_show_page("welcome/nav",$this->data);
		$this->_show_page("welcome/content",$this->data);
		$this->_show_page("welcome/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	public function account_setup() {
		//data
		$this->data['title'] = ucwords("Account Settings");
		$this->data['page_title'] = "<i class='fa fa-user'></i> Account Settings";
		$this->data['seo_description'] = "The FrontOffice Homepage";
		$this->data['description'] = "Update your account settings here and update your profile picture as well";
		$this->data['single_user'] = $this->officekey->user();

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("account_setup/header",$this->data);
		$this->_show_page("account_setup/nav",$this->data);
		$this->_show_page("account_setup/content",$this->data);
		$this->_show_page("account_setup/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	public function list_transactions() {
		//data
		$this->data['title'] = "All Transaction History";
		$this->data['seo_description'] = "The FrontOffice Homepage";
		$this->data['single_user'] = $this->officekey->user();

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("list_transactions/header",$this->data);
		$this->_show_page("list_transactions/nav",$this->data);
		$this->_show_page("list_transactions/content",$this->data);
		$this->_show_page("list_transactions/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

		public function general_settings() {
		//data
		$this->data['title'] = "General Settings";
		$this->data['page_title'] = "<i class='fa fa-wrench'></i> General Settings";
		$this->data['seo_description'] = "The General Settings for the user";
		$this->data['single_user'] = $this->officekey->user();

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("general_settings/header",$this->data);
		$this->_show_page("general_settings/nav",$this->data);
		$this->_show_page("general_settings/content",$this->data);
		$this->_show_page("general_settings/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	public function advanced_settings() {
		//data
		$this->data['title'] = ucwords("advanced settings");
		$this->data['page_title'] = "<i class='fa fa-user-times'></i> Advanced settings";
		$this->data['seo_description'] = "The advanced settings for the user";
		$this->data['single_user'] = $this->officekey->user();

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("advanced_settings/header",$this->data);
		$this->_show_page("advanced_settings/nav",$this->data);
		$this->_show_page("advanced_settings/content",$this->data);
		$this->_show_page("advanced_settings/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	/**
	 * _show_page() method is a shorthand replacement for the view method in the parent controller
	 * @param  string $src  the source document to be required
	 * @param  array  $args the additional data to be passed to the view
	 * @return void 
	 */
	public function _show_page($src = "",$args = array(),$bool = FALSE) {
		return $this->load->view("frontoffice/".$src,$args,$bool);
	}
}