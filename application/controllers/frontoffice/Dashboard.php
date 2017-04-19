<?php defined('BASEPATH') or die("NO DIRECT SCRIPT CALL IS ALLOWED");

class Dashboard extends CI_Controller {
	
	// the data array elements
	public $data;

	public function __construct() {
		parent::__construct();

		// loaders
		$this->load->helper("string");
		$this->load->config("assets");
		$this->load->model("donation_model");
		$this->load->model("central_accounts_model");
		$this->load->model("proof_payment_model");

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
			redirect('frontoffice/account/login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url(uri_string())).'&&userauth=1', 'refresh');
		}
	}

	/**
	 * the welcome method is simply the main landing page for the  homepage
	 * @return void
	 */
	public function index($case = null) {

		//data
		$this->data['error_messages'] = $this->session->flashdata("error_information_message") ? $this->session->flashdata("error_information_message") : "";
    	$this->data['success_messages'] = $this->session->flashdata("success_information_message") ? $this->session->flashdata("success_information_message") : "";
		$this->data['packages_selectable'] = $this->donation_model->donation_packages();

    	// session
		$current_user = $this->session->userdata("user_id");

		// model
		$is_paired = $this->donation_model->check_paired_accounts();

		if($is_paired != 1) {
			$this->data['package_paired'] = FALSE;
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
					redirect(uri_string());
				}
			endif;
		} else {
			$this->data['package_paired'] = TRUE;
			$this->data['get_paired_with'] = $this->donation_model->get_paired_account_with_customer()->row_array();
			$this->data['current_paired_central_account_details'] = $this->central_accounts_model->get_single_account($this->data['get_paired_with']['get_help_id'])->row_array();
			$this->data['proof_of_payment'] = $this->proof_payment_model->check_if_empty($this->data['get_paired_with']['proof_of_payment_id']);
			$this->data['kind_instructions'] = "Please call me before, on and after payment. Thank you!.";
		}

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
		$this->_show_page("dashboard/index/content",$this->data);
		$this->_show_page("templates/footer",$this->data);
		$this->_show_page("templates/bottom-footer",$this->data);
	}

	public function edit_pp($id = null) {

		if(is_null($id)) {
			return show_error(ucwords("this page is reserved, please try again"));
		} else {
			$this->form_validation->set_rules('teller_number', 'Teller Number', 'numeric|trim');
			$this->form_validation->set_rules('bank_paid_to', 'Bank Name', 'trim|alpha_numeric_spaces');
			$this->form_validation->set_rules('bank_branch', 'Bank Branch', 'trim|alpha_numeric_spaces');
			$this->form_validation->set_rules('transaction_type', 'Transaction type', 'trim');
			$this->form_validation->set_rules('account_name_used', 'Account Name', 'trim|alpha_numeric_spaces');
			$this->form_validation->set_rules('amount_paid', 'Amount Paid', 'trim|numeric');
			$this->form_validation->set_rules('payment_description', 'Payment Description', 'trim|alpha_numeric_spaces');
			$this->form_validation->set_rules('pop_picture', 'Proof of Payment Picture', 'trim');

			if($this->form_validation->run() == TRUE) {
				
				$config['upload_path']          = "public_assets/uploads/";
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 9999999999999999999999;
                $config['max_height']           = 1000;
                $config['encrypt_name']           = TRUE;

                $this->load->library('upload', $config);


				if(!$this->upload->do_upload("pop_picture")) { 
					$this->session->set_flashdata("failed_flash",$this->upload->display_errors());
					$q = array(
					"teller_num" => $this->input->post("teller_number"),
					"bank_paid_to" => $this->input->post("bank_paid_to"),
					"bank_branch" => $this->input->post("bank_branch"),
					"transaction_type" => $this->input->post("transaction_type"),
					"payment_description" => $this->input->post("payment_description"),
					"account_name_used" => $this->input->post("account_name_used"),
					"amount_paid" => $this->input->post("amount_paid"),
					);
					if($this->proof_payment_model->update_pp($id,$q)) {
						$this->session->set_flashdata('success_flash', 'Updated your payment details');
					}
				} else {
					$image_name = $this->upload->data("file_name");
                	$image_url = get_uploads_url()."/{$image_name}";
                	$q = array(
					"teller_num" => $this->input->post("teller_number"),
					"bank_paid_to" => $this->input->post("bank_paid_to"),
					"bank_branch" => $this->input->post("bank_branch"),
					"transaction_type" => $this->input->post("transaction_type"),
					"payment_description" => $this->input->post("payment_description"),
					"account_name_used" => $this->input->post("account_name_used"),
					"amount_paid" => $this->input->post("amount_paid"),
					"proof_of_payment_picture" => $image_url,
					);
					if($this->proof_payment_model->update_pp($id,$q)) {
						$this->session->set_flashdata('success_flash', 'Done!');
					}
				}
			} else {
				$this->data['failed_messages'] = (validation_errors()) ? validation_errors() : "";
			}

			//data
			$this->data['success_messages'] = $this->session->flashdata('success_flash') ? $this->session->flashdata('success_flash') : "";
			$this->data['failed_messages'] = $this->session->flashdata('failed_flash') ? $this->session->flashdata('failed_flash') : "";
			$this->data['get_paired_with'] = $this->donation_model->get_paired_account_with_customer()->row_array();
			$this->data['pop_bool'] = $this->proof_payment_model->check_if_empty($this->data['get_paired_with']['proof_of_payment_id']);
			$this->data['pop'] = $this->proof_payment_model->get_pp($this->data['get_paired_with']['proof_of_payment_id'])->row_array();

			// title
			if($this->data['pop_bool']) {
				$this->data['title'] = "Upload Proof of Payment";
				$this->data['page_title'] = "<i class='fa fa-money'></i> Upload Proof of Payment";
			} else {
				$this->data['title'] = "Update Proof of Payment";
				$this->data['page_title'] = "<i class='fa fa-money'></i> Update Proof of Payment";
			}
			$this->data['seo_description'] = "The Proof of payment page";
			$this->data['single_user'] = $this->officekey->user();

			// load the view needed
			$this->_show_page("templates/top-header",$this->data);
			$this->_show_page("templates/header",$this->data);
			$this->_show_page("templates/nav",$this->data);
			$this->_show_page("dashboard/edit_pp/content",$this->data);
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