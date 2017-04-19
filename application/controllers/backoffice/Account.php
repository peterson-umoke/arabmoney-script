<?php 

defined('BASEPATH') or die("NO DIRECT SCRIPT CALL IS ALLOWED");

class Account extends CI_Controller {
    
    // the data array elements
    public $data;

    public function __construct() {
        parent::__construct();

        // initiate the data attribute
        $this->data = array();
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

    public function index() {

    }

    public function login() {
        $this->data['title'] = "Login";
        $this->data['message_to_user'] = "";

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
                        $link = "backoffice/dashboard";
                        echo "logging you in... if you are not redirected in 5secs.. please ".anchor($link,"click here");
                        redirect($link,"refresh");
                    } elseif($this->officekey->is_frontoffice_user()) {
                        return show_error(ucwords("only backoffice users are allowed here. ").simple_btn("Login Here Instead","frontoffice/account/login"));
                    } else {
                        redirect("/","refresh");
                    }
                } else {
                    $this->data['message_to_user'] = $this->session->set_flashdata('information_message',"Your Login Has Failed");
                    if(isset($this->data['redirect_page'])) {
                        redirect('backoffice/account/login?redirect_page='.urldecode($this->data['redirect_page']).'&&userauth=1', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
                    } else {
                        redirect("backoffice/account/login");
                    }
                }
            } else {
                $this->data['message_to_user'] = ($this->session->flashdata('information_message')) ? $this->session->flashdata('information_message') : "";
               
                // load the needed view for the template
                $this->load->view("backoffice/account/login_form",$this->data);
            }
        else:
            if($this->officekey->is_backoffice_user()) {
                if(isset($this->data['redirect_page']) && !empty($this->data['redirect_page'])) {
                    $link = urldecode($this->data['redirect_page']);
                    echo "logging you in... if you are not redirected in 5secs.. please ".anchor($link,"click here");
                    redirect($link,"refresh");
                } else {
                    $link = "backoffice/dashboard";
                    echo "logging you in... if you are not redirected in 5secs.. please ".anchor($link,"click here");
                    redirect($link,"refresh");
                }
            } elseif($this->officekey->is_frontoffice_user()) {
                return show_error(ucwords("only backoffice users are allowed here. ").simple_btn("Login Here Instead","frontoffice/account/login"));
            } else {
                redirect("/backoffice","refresh");
            }
            
        endif;
    }

    public function add_user() {

    }

    public function delete_user() {

    }

    public function change_password() {

    }

    public function your_profile() {

    }

    public function edit_user($id = null) {

    }

    public function reset_password() {
        
    }

    public function logout() {
        if($this->officekey->logged_in()) :
            $this->officekey->logout(); 
        endif;

        echo "<em> logging you out. please wait ... </em>";
        $this->session->set_flashdata("information_message","You have been successfully logged out!");

        redirect("/backoffice/account/login","refresh");
    }

    public function central_accounts() {

    }

    public function add_central_account() {

    }

    public function delete_central_account() {

    }

}