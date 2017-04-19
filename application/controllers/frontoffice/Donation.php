<?php defined('BASEPATH') or die("NO DIRECT SCRIPT CALL IS ALLOWED");

class Donation extends CI_Controller {

	// the data array elements
	public $data = array();

	public function __construct() {
		parent::__construct();

		// loaders
		$this->load->helper("string");
		$this->load->config("assets");
		$this->load->model("donation_model");

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
		// $this->data['javascript']['main'] = get_js_url().'/ajax_pacesetting.js';

		// redirect the user is the user is not logged in
		if(!$this->officekey->is_frontoffice_user()) {
			redirect('login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url(uri_string())).'&&userauth=1', 'refresh');
		}
	}

	public function make($case = null) {

		//data
		$this->data['error_messages'] = $this->session->flashdata("error_information_message") ? $this->session->flashdata("error_information_message") : "";
    	$this->data['success_messages'] = $this->session->flashdata("success_information_message") ? $this->session->flashdata("success_information_message") : "";

    	// session
		$current_user = $this->session->userdata("user_id");

		$this->data['packages_selectable'] = $this->donation_model->donation_packages();
		$this->data['title'] = "Make Donations";
		$this->data['page_title'] = "<i class='fa fa-tripadvisor'></i> Make Payment";
		$this->data['description'] = "Here you can choose which package buy into";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['seo_description'] = "Here you can choose which package buy into";

		// model
		$is_paired = $this->donation_model->check_paired_accounts();

		if($is_paired != 1) {
			switch($case) {
				case 1:
					$package = $this->data['packages_selectable'][0]['amount'];
					break;
				case 2:
					$package = $this->data['packages_selectable'][1]['amount'];
					break;
				case 3:
					$package = $this->data['packages_selectable'][2]['amount'];
					break;
				case 4:
					$package = $this->data['packages_selectable'][3]['amount'];
					break;
				default:
					$package = null;
					break;

			}
			if(!is_null($package)):
				if($this->donation_model->make_donation($current_user,$package)){
					$this->session->set_flashdata('success_information_message', 'you have currently selected the N'.number_format($package)." package");
				}
			endif;
		} else {
			$this->session->set_flashdata("success_information_message","you are currently paired, see all the related information on your <a href='".site_url("frontoffice")."' class='alert-link'> dashboard </a>");
		}

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("make_donation/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	public function request_history() {
		//data
		$this->data['title'] = "Make Donations";
		$this->data['page_title'] = "<i class='fa fa-tripadvisor'></i> Make Payment";
		$this->data['description'] = "Here you can choose which package buy into";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['seo_description'] = "Here you can choose which package buy into";

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("request_history/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	public function make_history() {
		//data
		$this->data['title'] = "Make Donations";
		$this->data['page_title'] = "<i class='fa fa-tripadvisor'></i> Make Payment";
		$this->data['description'] = "Here you can choose which package buy into";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['seo_description'] = "Here you can choose which package buy into";

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("make_history/content",$this->data);
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

	/**
	 * the _debug method used to print array in the right format for the admin to use
	 * @param  array  $x the argument for the print_r function
	 * @return array 
	 */
	public function _debug($x = array()) {
		echo "<pre>";
		print_r($x);
		echo "</pre>";
	}
}