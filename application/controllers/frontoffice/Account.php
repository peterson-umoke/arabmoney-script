<?php defined("BASEPATH") or die("No direct script call is allowed");

class Account extends CI_Controller {

	// data elements
	public $data = array();

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

	// this simply shows the current user account details
	public function index() {
		//data
		$current_user_id = $this->session->userdata("user_id");
		$this->data['single_user'] = $this->officekey->user();
		$this->data['title'] = "Profile Details";
		$this->data['page_title'] = "<i class='fa fa-user'></i> ".$this->data['single_user']['first_name']."'s Profile Details";
		$this->data['description'] = "View all your profile details here";
		$this->data['seo_description'] = "View all your profile details here";

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("your_profile/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	// this simply logs the user out
	public function logout() {
		if($this->officekey->logged_in()) :
			$this->officekey->logout(); 
		endif;

		echo "<em> logging you out. please wait ... </em>";
		redirect("/login","refresh");
	}

	public function change_password() {
		//data
		$this->data['single_user'] = $this->officekey->user();
		$this->data['title'] = "Make Donations";
		$this->data['page_title'] = "<i class='fa fa-tripadvisor'></i> Make Payment";
		$this->data['description'] = "Here you can choose which package buy into";
		$this->data['seo_description'] = "Here you can choose which package buy into";
		$current_user_id = $this->session->userdata("user_id");

		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("make_donation/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	public function edit_profile() {
		//data
		$this->data['single_user'] = $this->officekey->user();
		$this->data['title'] = "Edit Profile";
		$this->data['page_title'] = "<i class='fa fa-edit'></i> Edit Profile";
		$this->data['description'] = "Here you can edit your profile and change basic details";
		$this->data['seo_description'] = "Here you can edit your profile and change basic details";
		$this->data['bank_name_options'] = array(
				"No Bank"	=> "---",
				"Access Bank" => "Access Bank",
				"Citi Bank" => "Citi Bank",
				"Diamond Bank" => "Diamond Bank",
				"Ecobank" => "Ecobank",
				"Fedility Bank" => "Fedility Bank",
				"First Bank" => "First Bank",
				"First City Monument Bank(FCMB)" => "First City Monument Bank(FCMB)",
				"Guarantee Trust Bank(GT-Bank)" => "Guarantee Trust Bank(GT-Bank)",
				"Heritage Bank" => "Heritage Bank",
				"Keystone Bank" => "Keystone Bank",
				"Skye Bank" => "Skye Bank",
				"Stanbic IBTC Bank" => "Stanbic IBTC Bank",
				"Standard Chartered Bank" => "Standard Chartered Bank",
				"Sterling Bank" => "Sterling Bank",
				"Union Bank" => "Union Bank",
				"United Bank for Africa(UBA)" => "United Bank for Africa(UBA)",
				"Unity Bank" => "Unity Bank",
				"Wema Bank" => "Wema Bank",
				"Zenith Bank" => "Zenith Bank",
			);

		$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('mobile', 'Phone Number', 'required|min_length[11]|max_length[11]|numeric');
        $this->form_validation->set_rules('password', 'Password');
        $this->form_validation->set_rules('password_two', 'Repeat Password', 'matches[password]');
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('account_name', 'Account Name', 'required');
        $this->form_validation->set_rules('account_number', 'Account Number', 'required|max_length[10]|numeric');

		if ($this->form_validation->run() == TRUE) {
			// form values
			$current_user_id = $this->session->userdata("user_id");
			$update_sql['first_name'] = $this->input->post("first_name");
			$update_sql['last_name'] = $this->input->post("last_name");
			$update_sql['email'] = $this->input->post("email");
			$update_sql['mobile'] = $this->input->post("mobile");
			$update_sql['password'] = $this->input->post("password");
			$update_sql['password_two'] = $this->input->post("password_two");
			$update_sql['bank_name'] = $this->input->post("bank_name");
			$update_sql['account_name'] = $this->input->post("account_name");
			$update_sql['account_number'] = $this->input->post("account_number");

			// send the changes to the server
			if ($this->officekey->update_frontoffice_user($current_user_id,$update_sql))
			{
				//if the udpation is successful
				$this->data['message'] = $this->session->set_flashdata('message', "Saved");
			}
			else
			{
				// if the registration was un-successful
				// redirect them back to the register page
				$this->data['message'] = $this->session->set_flashdata('message', "Not saved");
			}
			
		} else {
			$this->data['message_to_user'] = validation_errors();
			echo $this->input->post("bank_name");
			// load the view needed
			$this->_show_page("templates/top-header",$this->data);
			$this->_show_page("templates/header",$this->data);
			$this->_show_page("templates/nav",$this->data);
			$this->_show_page("edit_profile/content",$this->data);
			$this->_show_page("templates/footer",$this->data);
			$this->_show_page("templates/bottom-footer",$this->data);
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
}