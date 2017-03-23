<?php 

defined('BASEPATH') or die("NO DIRECT SCRIPT CALL IS ALLOWED");

class Dashboard extends CI_Controller {
    
    // the data array elements
    public $data;

    public function __construct() {
        parent::__construct();

        // initiate the data attribute
        $this->data = array();
    }

    public function index() {

    }

    public function welcome() {
        echo "welcome to the admin backend";
        echo "\n ".$this->session->userdata("account_type");
    }

    public function __destruct() {
        
    }

}