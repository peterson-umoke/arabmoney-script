<?php defined("BASEPATH") or die("No direct script call is allowed");

class Donation_model extends CI_Model {

	public $table_name;
	public $donation_packages;

	public function __construct() {
		parent::__construct();

		$this->table_name = array();
		$this->donation_packages = array();
	}

	public function check_paired_accounts() {
		$user_id = $this->session->userdata("user_id");
		$all_paired_customers = $this->db->select()
			->where("provide_help_customer_id",$user_id)
    		->where("status !=",2)
    		->or_where("get_help_customer_id", $user_id)
    		->where("status !=",2)
    		->limit(1)
			->get('paired');

		$all_get_help = $this->db->select()
			->where("customer_id",$user_id)
			->where("status !=",3)
			->limit(1)
			->get("get_help");

		if($all_paired_customers->num_rows() === 1) {
			return "1";
		} elseif($all_get_help->num_rows() === 1) {
			return "2";
		} else {
			return "3";
		}
	}

	public function get_paired_account_with_customer() {
		$user_id = $this->session->userdata("user_id");
		$all_paired_customers = $this->db->select()
			->where("provide_help_customer_id",$user_id)
    		->where("status !=",2)
    		->or_where("get_help_customer_id", $user_id)
    		->where("status !=",2)
    		->limit(1)
			->get('paired');

		if($all_paired_customers->num_rows() === 1) {
			return $all_paired_customers;
		} else {
			return false;
		}
	}

	/**
	 * make_donation method is make a donation to the user
	 * @param  int $user_id the user's id
	 * @param  string $category            the type of amount been sent by the donor, e.g N10,000 ; N5,000
	 * @param  string $receiver            the receiver of the donation
	 * @return array                      
	 */
	public function make_donation($user_id, $category, $receiver = "admin") {
		if($receiver == "admin"):
			// if the receiver is a member of the central accounts
			$this->load->model("central_accounts_model");
			$this->load->model("proof_payment_model");
			$central_account_id = $this->central_accounts_model->get_central_account_id();
			$pp_id = $this->proof_payment_model->insert_pp();

			// get the current time
			$current_time = time();

			// create the query we need
			$sql = array(
					"provide_help_customer_id" => $user_id,
					"get_help_id" => $central_account_id,
					"get_help_customer_id" => $central_account_id,
					"provide_help_confirm" => 0,
					"get_help_confirm" => 0,
					"category" => $category,
					"status" => 1,
					"time" => $current_time,
					"receiver" => "admin",
					"transaction" => "GH",
					"proof_of_payment_id" => $pp_id,
				);

			// insert the data into the required paired table
			$this->db->insert("paired",$sql);
			return true;
		elseif($receiver == "customer"):
			$current_time = time();

			// query
			$sql = $this->db->select()
				->where("status",1)
				->where("time <",$current_time)
				->where("category",$category)
				->limit(1)
				->get("get_help");

			// if you found something
			if($sql->num_rows() === 1) {
				// spit the above query to an array
				$get_help = $sql->row_array();
				$frontoffice_user_help_id = $get_help['id'];

				$customer_need_help_raw = $this->db->get_where("frontoffice_users",array("id" => $frontoffice_user_help_id));

				// convert the above query to an array list if it found any result at all
				if($customer_need_help_raw->num_rows === 1) {
					$customer_need_help = $customer_need_help_raw->row_array();
				} else {
					throw new Exception("No frontoffice user has the id required now");	
				}
				
				$customer_need_help = $customer_need_help['id'];

				// create the query we need
				$sql = array(
						"provide_help_customer_id" => $user_id,
						"get_help_id" => $frontoffice_user_help_id,
						"get_help_customer_id" => $customer_need_help,
						"provide_help_confirm" => 0,
						"get_help_confirm" => 0,
						"category" => $category,
						"status" => 1,
						"time" => $current_time,
						"receiver" => "customer",
					);

				// insert the data into the required paired table
				$this->db->insert("paired",$sql);

				// update the status of the get_help table of the current user
				$this->db->update("get_help",array("status" => 2),"id = {$frontoffice_user_help_id}");

			} else { // if you didnt find anything
				// NO MATCH IN GET HELP, SEND TO ADMIN
				$this->make_donation($this->session->userdata("user_id"),$category,"admin");
			}
		endif;

		return true;
	}

	public function confirm_donation($paired_id = 1,$confirmer = "customer") {
		if($confirmer == "customer") {
			$id = $this->session->userdata("user_id");
			$paired = $this->db->select()
				->where("provide_help_customer_id",$id)
				->where("transaction !=","PH")
				->where("status !=",2)
				->or_where("get_help_customer_id",$id)
				->where("transaction !=","GH")
				->where("status !=",2)
				->get("paired")
				->result_array();

			if($paired['provide_help_customer_id'] == $id && $paired['transaction'] != "PH"){

				$this->db->update("paired",array("provide_help_confirm" => 1),array("id" => $paired['id']));
				if($paired['get_help_confirm'] == 1){
					$this->db->update("paired",array("status" => 2),array("id" => $paired['id']));
					if($paired['receiver'] == "customer"){
						$this->db->update("get_help",array("status" => 3),array("id" => $paired['get_help_id']));
					}
					$this->insert_into_get_help($paired['provide_help_customer_id'],$paired['category']); 
					
				}
			}elseif($paired['get_help_customer_id'] == $id && $paired['transaction'] != "GH"){
				$this->db->update("paired",array("get_help_confirm" => 1,"provide_help_confirm" => 1, "status" => 2),array("id" => $paired['id']));
				$this->db->update("get_help",array("status" => 3),array("id" => $paired['get_help_id']));
				$this->insert_into_get_help($paired['provide_help_customer_id'],$paired['category']);
			}

		} elseif ($confirmer == "admin") {	
			$paired = $this->db->get_where("paired",array("id" => $paired_id));
			if($paired['transaction'] == "GH"){
				$this->db->update("paired",array("get_help_confirm"=>1,"provide_help_confirm" => 1, "status" => 2),array("id" => $paired_id));
				
				$this->insert_into_get_help($paired['provide_help_customer_id'],$paired['category']);
			}elseif($paired['transaction'] == "PH"){
				$this->db->update("paired",array("provide_help_confirm" => 1, "get_help_confirm" => 1, "status" => 2),array("id" => $paired['id']));
				$this->db->update("get_help",array("status" => 3),array("id" => $paired['get_help_id']));
			}
		}
	}

	public function insert_into_get_help($customer_id,$category) {
		$delay_settings = $this->db->get_where("settings",array("name" => "delay"))->row_array();
		$current_time = time() ;
		$valid_date = $current_time + $delay_settings['value']; 
		
		$percentage_settings = $this->db->get_where("settings",array("name" => "percentage"))->row_array();
		$decimal = $percentage_settings['value'] / 100 ;
		
		$new_category = $category * $decimal ;
		$sql = array(
				"customer_id" => $customer_id,
				"category" => $new_category,
				"status" => 1,
				"time" => $valid_date
			);
		$this->db->insert("get_help",$sql);
	}

	//THIS IS TO DIVERT ALL PAYMENTS TO ADMIN ACCOUNTS
	public function divert_payment(){
		$divert = $this->db->get_where("settings",array("name" => "divert"),1)->row_array();
		if($divert['value'] == "YES"){
			return true;
		}else{
			return false;
		}
	}

	public function donation_packages() {
		$this->donation_packages = array(
				array(
						"id" => 1,
						"amount" => 5000,
						"type" => "starter",
						"class" => "primary"
					),
				array(
						"id" => 2,
						"amount" => 10000,
						"type" => "bronze",
						"class" => "danger"
					),
				array(
						"id" => 3,
						"amount" => 50000,
						"type" => "silver",
						"class" => "success"
					),
				array(
						"id" => 4,
						"amount" => 100000,
						"type" => "gold",
						"class" => "info"
					),
				);

		return $this->donation_packages;
	}
}