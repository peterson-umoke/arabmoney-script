<?php defined("BASEPATH") or die("No direct script call is allowed");

class Central_accounts_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_central_account_id() {
		$sql = $this->db->select()
			->order_by('count', 'asc')
			->limit(1)
			->get("central_accounts");

		$result = $sql->row_array();
		$updated_count = $result['count'] + 1;

		// update the central account count
		$this->update_central_account_count($result['id'],$updated_count);

		return $result['id'];
	}

	public function update_central_account_count($user_id,$count) {
		$sql = array("count" => $count);
		$this->db->where("id",$user_id);
		$this->db->update("central_accounts",$sql);
	}

	public function get_single_account($id = null) {
		if($id) {
			return $this->db->get_where("central_accounts",array("id" => $id),1);
		}
	}
}