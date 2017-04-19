<?php defined("BASEPATH") or die("No direct script call is allowed");

class Proof_payment_model extends CI_Model {

	public $table = "proof_of_payment";

	public function __construct() {
		parent::__construct();
	}

	public function insert_pp($t_num = NULL, $b_paid_to = NULL, $b_branch = NULL, $t_type = NULL, $p_description = NULL, $acc_name_used = NULL,$a_paid = NULL, $p_of_p_picture = NULL) {
		$q = array(
			"teller_num" => $t_num,
			"bank_paid_to" => $b_paid_to,
			"bank_branch" => $b_branch,
			"transaction_type" => $t_type,
			"payment_description" => $p_description,
			"account_name_used" => $acc_name_used,
			"amount_paid" => $a_paid,
			"proof_of_payment_picture" => $p_of_p_picture,
		);

		// insert the query
		$this->db->insert($this->table,$q);

		// get the last id row inserted
		$id = $this->db->insert_id();

		// return $id
		return ($id) ? $id : FALSE;
	}

	public function get_pp($id = NULL) {
		return $this->db->get_where($this->table,array('id' => $id),1);
	}

	public function check_if_empty($id = NULL) {
		/**
		 * this var is used to get the proof_of_payment
		 * @var $p
		 */
		$p = $this->get_pp($id);
		$q = $p->row();

		if($p->num_rows()):
			if(empty($q->teller_num) && empty($q->bank_paid_to) && empty($q->bank_branch) && empty($q->transaction_type) && empty($q->payment_description) && empty($q->account_name_used) && empty($q->amount_paid) || empty($q->proof_of_payment_picture)) {
				return false;
			} else {
				return true;
			}
		else:
			throw new Exception(ucwords("the inserted id:".$id.", doesn't exist in the database, please try again!"), 1);
		endif;
	}

	public function update_pp($id = NULL,$data = array()) {
		return $this->db->update($this->table, $data, array('id' => $id));
	}
}