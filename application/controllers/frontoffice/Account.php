<?php defined("BASEPATH") or die("No direct script call is allowed");

class Account extends CI_Controller {

	// data elements
	public $data = array();

	public function __construct() {
		parent::__construct();

		// loaders
		$this->load->helper("string");
		$this->load->config("assets");
		$this->form_validation->set_error_delimiters("<li>","</li>");

		// initiate the data attribute
		$this->data = array();
		$this->data['necessary_javascript_files'] = array();
		$this->data['necessary_styesheet_files'] = array();
		$this->data['stylesheet'] = array();
		$this->data['javascript'] = array();
		$this->data['body_extra_classes'] = ""; // list of classes to be added to the body tag

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
	}

	// this simply shows the current user account details
	public function index() {
		// redirect the user is the user is not logged in
		if(!$this->officekey->is_frontoffice_user()) {
			redirect('frontoffice/account/login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url(uri_string())).'&&userauth=1', 'refresh');
		}

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

	public function login() {
		//data
		$this->data['body_extra_classes'] = "login-page";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['title'] = "Login Now";
		$this->data['seo_description'] = "Here you can choose which package buy into";

		// $_GET data
    	$this->data['redirect_page'] = $this->input->get("redirect_page");
    	$this->data['userauth'] = $this->input->get("userauth");


		// form validation rules
		$this->form_validation->set_rules('identity', 'Email','required|max_length[30]|valid_email|trim|min_length[8]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[30]|min_length[8]');

        if(!$this->officekey->logged_in()):
	        if ($this->form_validation->run() == TRUE) {

	        	// try to log the user in
	        	if($this->officekey->login($this->input->post('identity'), $this->input->post('password'))) {
	        		if(isset($this->data['redirect_page']) && !empty($this->data['redirect_page'])) {
						$link = urldecode($this->data['redirect_page']);
						echo "logging you in... if you are not redirected in 5secs.. please ".anchor($link,"click here");
						redirect($link,"refresh");
					} elseif($this->officekey->is_backoffice_user()) {
						$link = "backoffice/dashboard/welcome";
						echo "logging you in... if you are not redirected in 5secs.. please ".anchor($link,"click here");
						redirect($link,"refresh");
					} elseif($this->officekey->is_frontoffice_user()) {
						$link = "frontoffice/dashboard/welcome";
						echo "logging you in... if you are not redirected in 5secs.. please ".anchor($link,"click here");
						redirect($link,"refresh");
					} else {
						redirect("/","refresh");
					}
	        	} else {
	        		$this->data['message'] = $this->session->set_flashdata('information_message',"Your Login Has Failed");
	        		if(isset($this->data['redirect_page'])) {
						redirect('frontoffice/account/login?redirect_page='.urldecode($this->data['redirect_page']).'&&userauth=1', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
					} else {
						redirect("frontoffice/account/login");
					}
	        	}
	        } else {
		        $this->data['message_to_user'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('information_message');
					// load the view needed
				$this->_show_page("templates/top-header",$this->data);
				$this->_show_page("login/content",$this->data);
				$this->_show_page("templates/bottom-footer",$this->data);
	        }
        else:
			if($this->officekey->is_backoffice_user()) {
                return show_error(ucwords("only frontoffice users are allowed here. ").simple_btn("Login Here Instead","backoffice/account/login"));
            } elseif($this->officekey->is_frontoffice_user()) {
                if(isset($this->data['redirect_page']) && !empty($this->data['redirect_page'])) {
                    $link = urldecode($this->data['redirect_page']);
                    echo "logging you in... if you are not redirected in 5secs.. please ".anchor($link,"click here");
                    redirect($link,"refresh");
                } else {
                    $link = "backoffice/dashboard/welcome";
                    echo "logging you in... if you are not redirected in 5secs.. please ".anchor($link,"click here");
                    redirect($link,"refresh");
                }
            } else {
                redirect("/backoffice","refresh");
            }
        endif;
	}

	// this simply logs the user out
	public function logout() {
		if($this->officekey->logged_in()) :
			$this->officekey->logout(); 
		endif;

		echo "<em> logging you out. please wait ... </em>";
		$this->session->set_flashdata("information_message","You have been successfully logged out!");

		redirect("/frontoffice/account/login","refresh");
	}

	public function change_password() {

		// redirect the user is the user is not logged in
		if(!$this->officekey->is_frontoffice_user()) {
			redirect('frontoffice/account/login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url(uri_string())).'&&userauth=1', 'refresh');
		}

		//data
		$this->data['body_extra_classes'] = "login-page";
		$this->data['single_user'] = $this->officekey->user();
		$this->data['title'] = "Change Password";
		$this->data['seo_description'] = "here you can change your password";

		// form validation rules
		$this->form_validation->set_rules('old_password', 'Password','required|max_length[30]|alpha_numeric_spaces|min_length[8]');
		$this->form_validation->set_rules('new_password', 'New Password','required|max_length[30]|alpha_numeric_spaces|min_length[8]');
        $this->form_validation->set_rules('password_two', 'Repeat Password', 'matches[new_password]|required|max_length[30]|alpha_numeric_spaces|min_length[8]');


		if ($this->form_validation->run() == TRUE) {
			$current_user_id = $this->session->userdata("user_id");
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');

			if($this->officekey->change_password($current_user_id,$old_password,$new_password)){
				$this->session->set_flashdata("information_message","Your Password has been changed successfully");
				$this->session->set_flashdata("information_message","You have been successfully logged out!");
				if($this->officekey->logged_in()) :
					$this->officekey->logout(); 
				endif;
				redirect("frontoffice/account/login?redirect_page=".urlencode(site_url("/frontoffice/account/edit_profile"))."&&userauth=1","refresh");
			} else {
				$this->session->set_flashdata("information_message",$this->session->flashdata("change_password_messages"));
				redirect(uri_string(),"refresh");
			}
			
		} else {
			$this->data['message_to_user'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('information_message');
			// load the view needed
			$this->_show_page("templates/top-header",$this->data);
			$this->_show_page("templates/header",$this->data);
			$this->_show_page("change_password/content",$this->data);
			$this->_show_page("templates/bottom-footer",$this->data);
		}
	}

	public function edit_profile($save_type = null) {
		// redirect the user is the user is not logged in
		if(!$this->officekey->is_frontoffice_user()) {
			redirect('frontoffice/account/login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url(uri_string())).'&&userauth=1', 'refresh');
		}

		// assets specific for this method
		$this->data['stylesheet']['select2'] = 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css';
		$this->data['javascript']['select2'] = 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js';

		//data
		$this->data['single_user'] = $this->officekey->user();
		$current_user_id = $this->session->userdata("user_id");
		$this->data['title'] = "Edit Profile";
		$this->data['seo_description'] = "Here you can edit your profile and change basic details";
		$this->data['page_title'] = "<i class='fa fa-edit'></i> Edit Profile";
		$this->data['description'] = "Here you can edit your profile and change basic details";
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


        switch ($save_type) {
        	case 'personal_information':
				$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[30]|trim');
		        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]|max_length[30]|trim');
		        $this->form_validation->set_rules('mobile', 'Phone Number', 'required|min_length[11]|max_length[11]|numeric|trim');

		        // get db data
				$update_personal_sql['first_name'] = $this->input->post("first_name");
				$update_personal_sql['last_name'] = $this->input->post("last_name");
				$update_personal_sql['mobile'] = $this->input->post("mobile");
        		
				if ($this->form_validation->run() == TRUE) {
					// form values

					// send the changes to the server
					if ($this->officekey->update_frontoffice_user($current_user_id,$update_personal_sql))
					{
						// if the udpation is successful
						$this->session->set_flashdata('success_message', "Successfully updated your personal information");
						redirect(uri_string());
					}
					else
					{
						// if the udpation is un-successful
						$this->session->set_flashdata('error_message', "Unable to Update Personal Information");
						redirect(uri_string());
					}
					
				}

        		break;
        	case 'banking_information':
				
				// form validation rules
		        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required|alpha_numeric_spaces');
		        $this->form_validation->set_rules('account_name', 'Account Name', 'required');
		        $this->form_validation->set_rules('account_number', 'Account Number', 'required|max_length[10]|numeric');

		        // post data
				$update_banking_sql['bank_name'] = $this->input->post("bank_name");
				$update_banking_sql['account_name'] = $this->input->post("account_name");
				$update_banking_sql['account_number'] = $this->input->post("account_number");

				if ($this->form_validation->run() == TRUE) {

					// send the changes to the server
					if ($this->officekey->update_frontoffice_user($current_user_id,$update_banking_sql))
					{
						// if the updation is successful
						$this->session->set_flashdata('success_message', "Successfully updated your Banking information");
						redirect(uri_string());
					}
					else
					{
						// if the updation is un-successful
						$this->session->set_flashdata('error_message', "Unable to Update Banking Information");
						redirect(uri_string());
					}
					
				}
        		
        		break;
        	case 'profile_picture':

				// data settings
        		$config['upload_path']          = "public_assets/uploads/";
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 9999999999999999999999;
                $config['max_height']           = 1000;
                $config['encrypt_name']           = TRUE;

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload("userfile")) {
                	$this->session->set_flashdata("image_errors_now",$this->upload->display_errors());
                } else {
                	$this->session->set_flashdata('information_message',$this->upload->data());
                	$image_name = $this->upload->data("file_name");
                	$image_url = get_uploads_url()."/{$image_name}";

                	if($this->officekey->update_frontoffice_user($current_user_id,array("profile_picture" => $image_url))) {
	                	$this->session->set_flashdata("success_message","sucessfully uploaded profile picture");
	                	redirect(uri_string(),"refresh");
                	} else {
	                	$this->session->set_flashdata("error_message","unable to upload profile picture successfully");
                	}
                }
        		
        		break;

        	default:
        		// there is no default action to take here
        		break;
        }

		$this->data['validation_errors'] = (validation_errors()) ? validation_errors() : "";
		$this->data['image_errors'] = $this->session->flashdata("image_errors_now") ? $this->session->flashdata("image_errors_now") : "";
		$this->data['form_success'] = ($this->session->flashdata("success_message")) ? $this->session->flashdata('success_message') : "";
		$this->data['form_fail'] = ($this->session->flashdata("error_message")) ? $this->session->flashdata('error_message') : "";
		// load the view needed
		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("templates/header",$this->data);
		$this->_show_page("templates/nav",$this->data);
		$this->_show_page("edit_profile/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	
	}

	public function forgot_password() {
		$this->data['body_extra_classes'] = "login-page";
		$this->data['title'] = "Edit Profile";
		$this->data['seo_description'] = "Here you can edit your profile and change basic details";

		$this->_show_page("templates/top-header",$this->data);
		$this->_show_page("forgot_password/content",$this->data);
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