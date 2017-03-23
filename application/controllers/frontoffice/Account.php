<?php 

defined('BASEPATH') or die("NO DIRECT SCRIPT CALL IS ALLOWED");

class Account extends CI_Controller {
    
    // the data array elements
    public $data;

    public function __construct() {
        parent::__construct();

        // initiate the data attribute
        $this->data = array();
    }

    public function index() {

    }

    public function complete_profile($user_id = NULL) {

    }

    public function __destruct() {
        
    }

}