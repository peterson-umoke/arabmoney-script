<?php defined("BASEPATH") or die("No direct script call is allowed");

class Testimonies extends CI_controller {

	public $data = array();

	public function __construct() {
		parent::__construct();

		// loaders
		$this->load->helper("string");
		$this->load->config("assets");
		$this->load->model("testimonial_model");

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

		// javascript
		$this->data['javascript']['bootstrap'] = get_js_url().'/vendor/bootstrap.min.js';
		$this->data['javascript']['fastclick'] = get_plugins_url().'/fastclick/fastclick.js';
		$this->data['javascript']['slimscroll'] = get_plugins_url().'/slimScroll/jquery.slimscroll.min.js';
		$this->data['javascript']['pace'] = get_plugins_url().'/pace/pace.min.js';
		$this->data['javascript']['app'] = get_js_url().'/app.min.js';
		$this->data['javascript']['main'] = get_js_url().'/main.js';

		// redirect the user is the user is not logged in
		if(!$this->officekey->is_frontoffice_user()) {
			redirect('frontoffice/account/login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url(uri_string())).'&&userauth=1', 'refresh');
		}
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

	public function index() {
		$this->data['stylesheet']['select2'] = get_plugins_url().'/datatables/dataTables.bootstrap.css';
		$this->data['javascript']['jquery-dataTable'] = get_plugins_url().'/datatables/jquery.dataTables.min.js';
		$this->data['javascript']['bootstrap-dataTable'] = get_plugins_url().'/datatables/dataTables.bootstrap.min.js';
		//data
		$this->data['title'] = "Testimonies";
		$this->data['page_title'] = "<i class='fa fa-home'></i> Testimonies";
		$this->data['seo_description'] = "The Testimonies Page";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['description'] = "The Testimonies Page";
		$this->data['all_testimonials'] = $this->testimonial_model->get_all_testimonials()->result_array();

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("testimonies/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	public function add_new_testimonial() {
		$current_user_id = $this->session->userdata("user_id");
		$time = time();
		// form validation rules
		$this->form_validation->set_rules('title', 'Title of testimony','required|max_length[100]|trim|min_length[3]');
        $this->form_validation->set_rules('description', 'Explain what happened to you!', 'trim|required|max_length[300]|min_length[8]');

        if ($this->form_validation->run() == TRUE) {

        	if($this->testimonial_model->add_new_testimonial($this->input->post("title"),$this->input->post("description"),$current_user_id)):
	        	$this->session->set_flashdata('success_information_message', 'Your Testimonial has been added successfully. '.anchor('frontoffice/testimonies', 'See it here', 'class="alert-link"'));
	        	redirect(uri_string());
        	else:
        		$this->session->set_flashdata('error_information_message', 'Your Testimonial couldnt be added');
    		endif;
        };

		//data
    	$this->data['error_messages'] = validation_errors() ? validation_errors() : $this->session->flashdata("error_information_message");
    	$this->data['success_messages'] = $this->session->flashdata("success_information_message") ? $this->session->flashdata("success_information_message") : "";
		$this->data['title'] = "Testimonies";
		$this->data['page_title'] = "<i class='fa fa-home'></i> Testimonies";
		$this->data['seo_description'] = "The Testimonies Page";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['description'] = "The Testimonies Page";
		$this->data['all_testimonials'] = $this->testimonial_model->get_all_testimonials()->result_array();

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("add_new_testimonial/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}
}