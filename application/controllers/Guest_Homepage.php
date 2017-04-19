<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_Homepage extends CI_Controller {

	public $data;

	public function __construct() {
		// since we are inherit from a parent class, we need to pull in all the resource that the parent has
		parent::__construct();

		// load
		$this->load->library("officekey");
		$this->load->config("assets");
		$this->load->model("guest_homepage_model");
		$this->form_validation->set_error_delimiters("<li>","</li>");

		// load default for assets
		$this->data['necessary_javascript_files'] = array();
		$this->data['stylesheet'] = array(); // default javascript files
		$this->data['necessary_styesheet_files'] = array();
		$this->data['javascript'] = array(); // default javascript files

		// base values for settings
		$site_lockdown = $this->config->item("full_site_lockdown");
		$site_maintenance = $this->config->item("maintenance_mode");

		// checks
		if($site_lockdown == TRUE) { // checks if the site lockdown mode is on
			site_lockdown_activate();
		} elseif($site_maintenance == TRUE) { // checks if the site maintenance mode is on
			site_maintenance_activate();
		}

		// default data to be passed to every method in this controller
		$this->data[] = "";
		$this->data['ins_message'] = "Get 300% flat interest rate on new registrations now!";
		$this->data['site_name'] = ucwords($this->config->item("site_name"));

		//assets
		$this->data['necessary_stylesheet_files'] = $this->config->item("necessary_stylesheet_files");
		$this->data['necessary_javascript_files']['jquery'] = get_plugins_url().'/jQuery/jQuery-2.2.3.min.js';
		$this->data['necessary_javascript_files']['jquery-migrate'] = jquery_migrate_js_url();
		$this->data['necessary_javascript_files']['modernizr_js_url'] = modernizr_js_url();
		$this->data['necessary_javascript_files']['respond'] = get_js_url().'/respond.min.js';
		
		$this->data['stylesheet']['animate'] = get_css_url().'/animate.min.css';
		$this->data['stylesheet']['theme_style'] = get_css_url().'/style.default.css';

		$this->data['javascript']['bootstrap'] = get_js_url().'/vendor/bootstrap.min.js';
		$this->data['javascript']['jquery-cookie'] = get_js_url().'/jquery.cookie.js';
		$this->data['javascript']['waypoints'] = get_js_url().'/waypoints.min.js';
		$this->data['javascript']['bootstrap-hover-dropdown'] = get_js_url().'/bootstrap-hover-dropdown.js';
		$this->data['javascript']['owl-carousel'] = get_js_url().'/owl.carousel.min.js';
		$this->data['javascript']['plugins'] = get_js_url().'/plugins.js';
		$this->data['javascript']['front'] = get_js_url().'/front.js';
		$this->data['javascript']['custom'] = get_js_url().'/custom.js';
	}

	public function welcome() {

		//load 
		$this->load->model("testimonial_model");

		// assets
		$this->data['stylesheet']['owl-carousel'] = get_css_url().'/owl.carousel.css';
		$this->data['stylesheet']['owl-carousel-theme'] = get_css_url().'/owl.theme.css';
		$this->data['stylesheet']['custom'] = get_css_url().'/custom.css';

		// data
		$this->data['title'] = "Welcome";
		$this->data['primary_navigation'] = $this->guest_homepage_model->primary_navigation();
		$this->data['testimonials'] = $this->testimonial_model->get_main_testimonials()->result_array();

		$this->_load_page("templates/header",$this->data);
		$this->_load_page("templates/top-header",$this->data);
		$this->_load_page("templates/navigation",$this->data);
		$this->_load_page("templates/begin_all",$this->data);
		$this->_load_page("welcome/content",$this->data);
		$this->_load_page("templates/end_all",$this->data);
		$this->_load_page("templates/top-footer",$this->data);
		$this->_load_page("templates/bottom-footer",$this->data);
		$this->_load_page("templates/footer",$this->data);
	}

	public function register() {
		// assets
		$this->data['stylesheet']['owl-carousel'] = get_css_url().'/owl.carousel.css';
		$this->data['stylesheet']['owl-carousel-theme'] = get_css_url().'/owl.theme.css';
		$this->data['stylesheet']['custom'] = get_css_url().'/custom.css';
		$this->data['stylesheet']['select2'] = 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css';
		$this->data['javascript']['select2'] = 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js';

		// data
		$this->data['title'] = "Register";
		$this->data['primary_navigation'] = $this->guest_homepage_model->primary_navigation();
		$this->data['bank_name_options'] = array(
					"Access Bank" => "Access Bank",
					"Citi Bank" => "Citi Bank",
					"Diamond Bank" => "Diamond Bank",
					"Ecobank" => "Ecobank",
					"Fedility Bank" => "Fedility Bank",
					"First Bank" => "First Bank",
					"FCMB" => "First City Monument Bank(FCMB)",
					"Guarantee Trust Bank(GT-Bank)" => "Guarantee Trust Bank(GT-Bank)",
					"Heritage Bank" => "Heritage Bank",
					"Keystone Bank" => "Keystone Bank",
					"Skye Bank" => "Skye Bank",
					"Stanbic IBTC Bank" => "Stanbic IBTC Bank",
					"Standard Chartered Bank" => "Standard Chartered Bank",
					"Sterling Bank" => "Sterling Bank",
					"Union Bank" => "Union Bank",
					"UBA" => "United Bank for Africa(UBA)",
					"Unity Bank" => "Unity Bank",
					"Wema Bank" => "Wema Bank",
					"Zenith Bank" => "Zenith Bank",
				);

		$this->_load_page("templates/header",$this->data);
		$this->_load_page("templates/top-header",$this->data);
		$this->_load_page("templates/navigation",$this->data);
		$this->_load_page("templates/begin_all",$this->data);
		$this->_load_page("register/content",$this->data);
		$this->_load_page("templates/end_all",$this->data);
		$this->_load_page("templates/top-footer",$this->data);
		$this->_load_page("templates/bottom-footer",$this->data);
		$this->_load_page("templates/footer",$this->data);
	}

	public function faq() {
		// data
		$this->data['title'] = "FAQ";
		$this->data['primary_navigation'] = $this->guest_homepage_model->primary_navigation();

		$this->_load_page("templates/header",$this->data);
		$this->_load_page("templates/top-header",$this->data);
		$this->_load_page("templates/navigation",$this->data);
		$this->_load_page("templates/begin_all",$this->data);
		$this->_load_page("faq/content",$this->data);
		$this->_load_page("templates/end_all",$this->data);
		$this->_load_page("templates/top-footer",$this->data);
		$this->_load_page("templates/bottom-footer",$this->data);
		$this->_load_page("templates/footer",$this->data);	
	}

	public function contact() {
		// data
		$this->data['title'] = "Contact Us";
		$this->data['primary_navigation'] = $this->guest_homepage_model->primary_navigation();

		$this->_load_page("templates/header",$this->data);
		$this->_load_page("templates/top-header",$this->data);
		$this->_load_page("templates/navigation",$this->data);
		$this->_load_page("templates/begin_all",$this->data);
		$this->_load_page("contact/content",$this->data);
		$this->_load_page("templates/end_all",$this->data);
		$this->_load_page("templates/top-footer",$this->data);
		$this->_load_page("templates/bottom-footer",$this->data);
		$this->_load_page("templates/footer",$this->data);	
	}

	public function about() {
		// data
		$this->data['title'] = "About Us";
		$this->data['primary_navigation'] = $this->guest_homepage_model->primary_navigation();

		$this->_load_page("templates/header",$this->data);
		$this->_load_page("templates/top-header",$this->data);
		$this->_load_page("templates/navigation",$this->data);
		$this->_load_page("templates/begin_all",$this->data);
		$this->_load_page("about-us/content",$this->data);
		$this->_load_page("templates/end_all",$this->data);
		$this->_load_page("templates/top-footer",$this->data);
		$this->_load_page("templates/bottom-footer",$this->data);
		$this->_load_page("templates/footer",$this->data);	
	}

	// this method is mainly just for ajax 
	public function check_login() {

		$data = array();
		$id = $this->input->post("identity");
		$pwd = $this->input->post("password");

		// form validation rules
		$this->form_validation->set_rules('identity', 'Email','required|max_length[30]|valid_email|trim|min_length[8]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[30]|min_length[8]');

        if ($this->form_validation->run() == FALSE) {
        	$data = array(
        		"form_error" => validation_errors(),
        		);
        } else {
        	if($this->officekey->login($id,$pwd)) {
        		$data = array(
        		"form_success" => "Your login is successful, redirecting you in a few seconds",
        		"newLocation" => site_url("frontoffice"),
        		);
        	}
        	else {
        		$data = array(
        			"form_error" => ucwords("Your login has failed. the <b> email </b>or <b> password</b> is incorrect!."),
        			);
        	}
        }

		echo json_encode($data);
	}

	// ajax methods
	public function register_new_user() {
		// setup data
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[20]',array(
			'required' => 'You must provide a %s.')
			);
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[20]',
                        array('required' => 'You must provide a %s.')
            );
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email',array(
			'required' => 'You must provide an %s. you must use it to log in')
			);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]',
                        array('required' => 'You must provide a %s, it is very necessary')
            );
		$this->form_validation->set_rules('repeat_password', 'Password Confirmation', 'trim|required|min_length[8]|matches[password]',
                        array('required' => 'The %s field doesn\'t match the one in the Password field.')
            );
		 $this->form_validation->set_rules('mobile', 'Phone Number', 'required|min_length[11]|max_length[11]|numeric|trim');
		 $this->form_validation->set_rules('bank_name', 'Bank Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('account_name', 'Account Name', 'required|min_length[5]|trim');
        $this->form_validation->set_rules('account_number', 'Account Number', 'required|max_length[10]|trim|numeric');

		if($this->form_validation->run() == FALSE) {
			echo json_encode(array(
					"register_error" => validation_errors(),
				));
		} else {
			if($this->officekey->check_if_user_exist($this->input->post("email"))) {
				echo json_encode(array(
					"register_error" => "This email is already registered, please <a href='#' class='alert-link text-capitalize'>log in now! </a>",
				));
			} else {
				$fname = $this->input->post("fname");
				$lname = $this->input->post("lname");
				$email = $this->input->post("email");
				$password = $this->input->post("password");
				$mobile = $this->input->post("mobile");
				$bank_name = $this->input->post("bank_name");
				$account_name = $this->input->post("account_name");
				$account_number = $this->input->post("account_number");
				if($this->officekey->create_frontoffice_user($fname, $lname, $email, $password,$mobile, array(
						"bank_name" => $bank_name,
						"account_name" => $account_name,
						"account_number" => $account_number,
					))) {
					echo json_encode(array(
						"register_success" => "Your account has been created successfully.",
						"newLocation" => site_url('frontoffice/account/login?userauth=1&&newuser=1'),
					));

					$this->session->set_flashdata('information_message', 'Your account has been created, please log in now');
				} else {
					echo json_encode(array(
						"register_error" => "This email is already registered, please <a href='#' class='alert-link text-capitalize'>log in now! </a>",
					));
				}
			}
		}
	}

	public function view_blog() {
		redirect("http://blog.arabnaira.com");
	}

	/**
	 * _show_page() method is a shorthand replacement for the view method in the parent controller
	 * @param  string $src  the source document to be required
	 * @param  array  $args the additional data to be passed to the view
	 * @return void 
	 */
	public function _load_page($src = "",$args = array(),$bool = FALSE) {
		return $this->load->view("guest_homepage/".$src,$args,$bool);
	}
}