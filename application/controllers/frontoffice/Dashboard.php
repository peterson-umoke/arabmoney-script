<?php defined('BASEPATH') or die("NO DIRECT SCRIPT CALL IS ALLOWED");

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
		$this->data['stylesheet']['overides'] = get_css_url().'/_overides.css';
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
		$this->data['javascript']['main'] = get_js_url().'/ajax_pacesetting.js';

		// redirect the user is the user is not logged in
		if(!$this->officekey->is_frontoffice_user()) {
			redirect('login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url('frontoffice/account/login')).'&&userauth=1', 'refresh');
		}
	}

	/**
	 * the welcome method is simply the main landing page for the  homepage
	 * @return void
	 */
	public function index() {
		//data
		$this->data['title'] = "Welcome to the FrontOffice";
		$this->data['page_title'] = "<i class='fa fa-home'></i> Dashboard";
		$this->data['seo_description'] = "The FrontOffice Homepage";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['description'] = "The FrontOffice Homepage";

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("dashboard/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	/**
	 * the your_profile method
	 * @return void
	 */
	public function your_profile() {
		//data
		$this->data['title'] = "View Profile";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['description'] = "Here {$this->data['single_user']['first_name']} {$this->data['single_user']['last_name']}, you can view your personal profile";
		$this->data['page_title'] = "<i class='fa fa-user'></i> ".$this->data['single_user']['first_name']."'s Account";
		$this->data['seo_description'] = "Here you can choose which package buy into";

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("your_profile/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
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