<?php 

defined('BASEPATH') or die("NO DIRECT SCRIPT CALL IS ALLOWED");

class Dashboard extends CI_Controller {
    
    // the data array elements
    public $data;

    public function __construct() {
        parent::__construct();

        // initiate the data attribute
        $this->data = array();

        // load libraries
        $this->load->helper("string");

        // redirect the user is the user is not logged in
        if(!$this->officekey->logged_in()) {
            redirect('login?secret_key='.random_string('alnum',300).'&&redirect_page='.urlencode(site_url('frontoffice/account/login')).'&&userauth=1', 'refresh');
        }
    }

    public function index() {
        // simply redirect the user to the welcome method
        redirect("frontoffice/dashboard/welcome","refresh");
    }

    /**
     * the welcome method is simply the main landing page for the  homepage
     * @return void
     */
    public function welcome() {
        
    }

    public function __destruct() {
        
    }

}