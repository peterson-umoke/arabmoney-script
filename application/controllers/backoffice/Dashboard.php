<?php 

defined('BASEPATH') or die("NO DIRECT SCRIPT CALL IS ALLOWED");

class Dashboard extends CI_Controller {
    
    // the data array elements
    public $data;

    public function __construct() {
        parent::__construct();

        // initiate the data attribute
        $this->data = array();

        // redirect the user is the user is not logged in
        if(!$this->officekey->is_backoffice_user()) {
            redirect('backoffice/account/login?redirect_page='.urlencode(site_url(uri_string())).'&&userauth=1', 'refresh');
        }
    }

    public function index() {

    }
}