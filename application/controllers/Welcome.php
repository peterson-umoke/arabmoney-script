<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/** 
	* this data attribute is general purpose
	* @param string
	*/
	public $data;


	/**
	* the main constructor method used to initiate some major changes that will be passed throughout the lifespan of this entire script 
	*/
	public function __construct() {

		// since we are inherit from a parent class, we need to pull in all the resource that the parent has
		parent::__construct();

		// load libraries
		$this->load->library("officekey");

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
		$this->data['site_name'] = ucwords($this->config->item("site_name"));
		$this->data['ins_message'] = "Join Now to enjoy 50% now!";

		// primary navigation menu
		$this->data['navigation_menu']['primary_links'] = array(
			"about us" => site_url('about-us'),
			"privacy policies" => site_url("privacy-policies"),
			"FAQ" => site_url("#faq"),
		);

		// login and register link
		if($this->officekey->logged_in() && $this->officekey->is_frontoffice_user()) {
			$this->data['navigation_menu']['special_links'] = array(
				"your profile" => site_url("account/user_profile"),
				"the frontoffice" => site_url("frontoffice/dashboard/welcome"),
				"logout" => site_url('account/logout'),
			);
		} 
		elseif($this->officekey->logged_in() && $this->officekey->is_backoffice_user()) {
			$this->data['navigation_menu']['special_links'] = array(
				"your profile" => site_url("account/user_profile"),
				"the backoffice" => site_url("backoffice/dashboard/welcome"),
				"logout" => site_url('account/logout'),
			);
		}
		else {
			$this->data['navigation_menu']['special_links'] = array(
				"login" => site_url('login'),
				"register" => site_url("register"),
				"contact us" => site_url('contact-us'),
			);
		}

		// footer links
		$this->data['navigation_menu']['footer_links_one'] = array(
				"about us" => site_url('about-us'),
				"privacy policies" => site_url("privacy-policies"),
				"FAQ" => site_url("#faq"),
			);
		if($this->officekey->logged_in() && $this->officekey->is_frontoffice_user()) {
			$this->data['navigation_menu']['footer_links_two'] = array(
				"logout from the frontoffice" => site_url('account/logout'),
				"Enter the FrontOffice" => site_url("frontoffice/dashboard/welcome"),
			);
		}
		elseif($this->officekey->logged_in() && $this->officekey->is_backoffice_user()) {
			$this->data['navigation_menu']['footer_links_two'] = array(
				"logout from the backoffice" => site_url('account/logout'),
				"Enter the BackOffice" => site_url("backoffice/dashboard/welcome"),
			);
		}
		else {
			$this->data['navigation_menu']['footer_links_two'] = array(
					"login" => site_url('login'),
					"register" => site_url("register"),
					"terms and conditions" => site_url('terms-and-conditions'),
					"the backOffice" => site_url("backoffice"),
			);
		}

		if(!$this->config->item("use_cdn")):
			// scripts to be loaded in the head templates
			$this->data['necessary_javascript_files']['jquery'] = get_js_url().'/vendor/jquery.js';
			$this->data['necessary_javascript_files']['jquery-migrate'] = get_js_url().'/vendor/jquery-migrate.min.js';
			$this->data['necessary_javascript_files']['modernizr'] = get_js_url().'/vendor/modernizr-2.8.3-respond-1.4.2.min.js';
			$this->data['javascript']['bootstrap'] = get_js_url().'/vendor/bootstrap.min.js';

			// stylesheets to be loaded in the head templates
			$this->data['necessary_styesheet_files']['bootstrap'] = get_css_url().'/bootstrap.min.css';
			$this->data['necessary_styesheet_files']['fontawesome'] = get_css_url().'/font-awesome.css';
			$this->data['necessary_styesheet_files']['main'] = get_css_url().'/main.css';
			$this->data['stylesheet']['google_font_1'] = "//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic";
			$this->data['stylesheet']['google_font_2'] = "//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic";
		else:

			// cdn only
			$this->data['necessary_styesheet_files']['cdn_css'] = $this->config->item("cdn_stylesheets");
			$this->data['necessary_javascript_files']['cdn_js'] = $this->config->item("cdn_javscripts");

			// custom css
			$this->data['stylesheet']['skdslider'] = get_css_url().'/skdslider.css';
			$this->data['stylesheet']['main'] = get_css_url().'/main.css';

			// custom js
			$this->data['javascript']['sdkslider'] = get_js_url().'/skdslider.min.js';
			$this->data['javascript']['plugins'] = get_js_url().'/plugins.js';
			$this->data['javascript']['main'] = get_js_url().'/main.js';
		endif;

		// check what the session is spitting out
		// print_r($this->session->userdata());
	}

	/**
	* the homepage
	* the only thing it does is to show a view file 
	*/
	public function index()
	{
		// setup data
		$this->data['title'] = "Welcome to Arabnaira";

		// resources
		$this->data['stylesheet']['skdslider'] = get_css_url().'/skdslider.css';
		$this->data['javascript']['sdkslider'] = get_js_url().'/skdslider.min.js';
		$this->data['javascript']['plugins'] = get_js_url().'/plugins.js';
		$this->data['javascript']['main'] = get_js_url().'/main.js';

		// load views
		$this->load->view("guest/templates/header",$this->data);
		$this->load->view("guest/templates/main-header",$this->data);
		$this->load->view("guest/home/slideshow",$this->data);
		$this->load->view("guest/home/first_content",$this->data);
		$this->load->view("guest/home/second_content",$this->data);
		$this->load->view("guest/templates/main-footer",$this->data);
		$this->load->view("guest/templates/footer",$this->data);
	}

	/**
	* the contact us page
	* the only thing it does is to show a view file 
	*/
	public function contact_us() {
		// setup data
		$this->data['title'] = "Let's Talk Now !";

		// resources
		$this->data['javascript']['plugins'] = get_js_url().'/plugins.js';
		$this->data['javascript']['main'] = get_js_url().'/main.js';

		// load views
		$this->load->view("guest/templates/header",$this->data);
		$this->load->view("guest/templates/main-header",$this->data);
		$this->load->view("guest/contact-us/content",$this->data);
		$this->load->view("guest/templates/main-footer",$this->data);
		$this->load->view("guest/templates/footer",$this->data);
	}

	/** 
	* the about us page
	* the only thing it does is to show a view file 
	*/
	public function about_us() {
		// setup data
		$this->data['title'] = "Get to know who we are!";

		// resources
		$this->data['javascript']['plugins'] = get_js_url().'/plugins.js';
		$this->data['javascript']['main'] = get_js_url().'/main.js';

		// load views
		$this->load->view("guest/templates/header",$this->data);
		$this->load->view("guest/templates/main-header",$this->data);
		$this->load->view("guest/about-us/content",$this->data);
		$this->load->view("guest/templates/main-footer",$this->data);
		$this->load->view("guest/templates/footer",$this->data);
	}

	/**
	* the privacy policies page
	* the only thing it does is to show a view file 
	*/
	public function privacy_policies() {
		$this->load->helper("maintenance");

		// show the page is under maintenance
		page_under_maintenance();
	}

	/**
	* the terms and conditions page
	* the only thing it does is to show a view file 
	*/
	public function terms_and_conditions() {
		$this->load->helper("maintenance");

		// sho
		page_under_maintenance();
	}

	/** 
	* the login page
	* the only thing it does is to show a view file 
	*/
	public function login() {

		$this->form_validation->set_rules('identity', 'Email', 'trim|required|valid_email',array(
			'required' => 'You must provide a valid %s.')
			);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]',
                        array('required' => 'You must provide a %s.')
                );

		// properties
		if(!$this->officekey->logged_in()){
			if ($this->form_validation->run() == true)
			{ 
				// login in the user with the details provided
				if ($this->officekey->login($this->input->post('identity'), $this->input->post('password')))
				{
					//if the login is successful
					//redirect them back to the frontoffice
					$this->data['message'] = $this->session->set_flashdata('message', $this->officekey->message());

					// special instructions to the controller
					$this->data['redirect_page'] = urlencode($this->input->get("redirect_page"));
					$this->data['secret_key'] = $this->input->get("secret_key");
					$this->data['userauth'] = $this->input->get("userauth");
					
					if(isset($this->data['redirect_page'],$this->data['secret_key']) && !empty($this->data['redirect_page'])) {
						$link = urldecode($this->data['redirect_page']);
						echo "please wait... if you are not redirected in 5secs.. please ".anchor($link,"click here");
						redirect($link,"refresh");
					} elseif($this->officekey->is_backoffice_user()) {
						$link = "backoffice/dashboard/welcome";
						echo "please wait... if you are not redirected in 5secs.. please ".anchor($link,"click here");
						redirect($link,"refresh");
					} elseif($this->officekey->is_frontoffice_user()) {
						$link = "frontoffice/dashboard/welcome";
						echo "please wait... if you are not redirected in 5secs.. please ".anchor($link,"click here");
						redirect($link,"refresh");
					} else {
						redirect("/","refresh");
					}
					
				}
				else
				{
					// if the login was un-successful
					// redirect them back to the login page
					$this->data['message'] = $this->session->set_flashdata('message', $this->officekey->message());

					// special instructions to the controller
					$this->data['redirect_page'] = urlencode($this->input->get("redirect_page"));
					$this->data['secret_key'] = $this->input->get("secret_key");
					$this->data['userauth'] = $this->input->get("userauth");

					if(isset($redirect_page,$secret_key)) {
						redirect('login?secret_key='.$this->data['secret_key'].'&&redirect_page='.urldecode($this->data['redirect_page']).'&&userauth=1', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
					} else {
						redirect("login");
					}
				}
			}
			else
			{

				// the user is not logging in so display the login page
				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

							// setup data
				$this->data['title'] = "Login to the FrontOffice";

				// get the details sent from the previous page
				$this->data['redirect_page'] = urlencode($this->input->get("redirect_page"));
				$this->data['secret_key'] = $this->input->get("secret_key");
				$this->data['userauth'] = $this->input->get("userauth");

				// resources
				$this->data['javascript']['plugins'] = get_js_url().'/plugins.js';
				$this->data['javascript']['main'] = get_js_url().'/main.js';

				$this->data['message_to_user'] = "Login now";

				// load views
				$this->load->view("guest/templates/header",$this->data);
				$this->load->view("guest/templates/main-header",$this->data);
				$this->load->view("guest/login/login",$this->data);
				$this->load->view("guest/templates/main-footer",$this->data);
				$this->load->view("guest/templates/footer",$this->data);
			}
		}
		else{
			if($this->officekey->is_frontoffice_user()) {
				$link = "frontoffice/dashboard/welcome";
				echo "please wait... if you are not redirected in 5secs.. please ".anchor($link,"click here");
				redirect($link,"refresh");
			}
			elseif($this->officekey->is_backoffice_user()) {
				$link = "backoffice/dashboard/welcome";
				echo "please wait... if you are not redirected in 5secs.. please ".anchor($link,"click here");
				redirect($link,"refresh");
			} else {
				$link = "/";
				echo "please wait... if you are not redirected in 5secs.. please ".anchor($link,"click here");
				redirect($link,"refresh");
			}
		}

	}

	/**
	* the register page 
	* the only thing it does is to show a view file 
	*/
	public function register() {
		// setup data
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[12]',array(
			'required' => 'You must provide a %s.')
			);
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[12]',
                        array('required' => 'You must provide a %s.')
            );
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email',array(
			'required' => 'You must provide an %s.')
			);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]',
                        array('required' => 'You must provide a %s.')
            );
		$this->form_validation->set_rules('password_check', 'Password Confirmation', 'trim|required|min_length[8]|matches[password]',
                        array('required' => 'You must provide a %s.')
            );
		$this->form_validation->set_rules('terms_and_conditions', 'Terms and conditions', 'trim|required',
                        array('required' => 'The %s must be checked.')
            );

		if ($this->form_validation->run() == true)
		{
			$this->load->helper("string");

			if ($this->officekey->create_frontoffice_user($this->input->post('fname'), $this->input->post('lname'),$this->input->post('email'),$this->input->post("password"),0))
			{
				//if the registration is successful
				//redirect them back to the frontoffice
				$this->data['message'] = $this->session->set_flashdata('message', $this->officekey->message());
				redirect('login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url('frontoffice/account/complete_profile')).'&&userauth=1', 'refresh');
			}
			else
			{
				// if the registration was un-successful
				// redirect them back to the register page
				$this->data['message'] = $this->session->set_flashdata('message', $this->officekey->message());
				redirect('register', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// data to the user
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['title'] = "Register Now !";

			// form data
			$this->data['fname'] = array('name' => 'fname',
				'id'    => 'fname',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('fname'),
				'placeholder' => 'First name: ',
			);
			$this->data['lname'] = array('name' => 'lname',
				'id'    => 'lname',
				'type'  => 'text',
				'placeholder' => 'Last name: ',
				'value' => $this->form_validation->set_value('lname'),
			);
			$this->data['email'] = array('name' => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'placeholder' => 'Email address: ',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
				'placeholder' => 'Password',
			);
			$this->data['password_check'] = array('name' => 'password_check',
				'id'   => 'password_check',
				'type' => 'password',
				'placeholder' => 'Password confirmation ...',
			);


			// resources
			$this->data['javascript']['plugins'] = get_js_url().'/plugins.js';
			$this->data['javascript']['main'] = get_js_url().'/main.js'; 
			$this->data['javascipt']['hello'] = get_js_url().'/hello..js';

			// load views
			$this->load->view("guest/templates/header",$this->data);
			$this->load->view("guest/templates/main-header",$this->data);
			$this->load->view("guest/register/register",$this->data);
			$this->load->view("guest/templates/main-footer",$this->data);
			$this->load->view("guest/templates/footer",$this->data);
		}
	}

	public function logout() {
		if($this->officekey->logged_in()) :
			$this->officekey->logout(); 
		endif;

		echo "please wait ...";
		redirect("/","refresh");
	}

	/**
	* the will load this before it destroys the script's lifespan 
	*/
	public function __destruct() {
		
	}
}