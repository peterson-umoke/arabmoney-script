<?php defined("BASEPATH") or die("No direct script call is allowed");

class Testimonial_model extends CI_Model {

	// the main data
	private $table_name = "testimonials";

	public function __construct() {
		parent::__construct();
	}

	public function get_all_testimonials() {
		$sql = $this->db
				->select()
				->from("testimonials")
				->join("frontoffice_users","frontoffice_users.id = testimonials.user_id")
				// ->order_by("created_on DESC")
				->get();

		return $sql;
	}

	public function get_main_testimonials() {
		$sql = $this->db
				->select()
				->from("testimonials")
				->limit(4)
				->join("frontoffice_users","frontoffice_users.id = testimonials.user_id")
				// ->order_by("created_on DESC")
				->get();

		return $sql;
	}

	public function get_testimonials() {
		$sql = $this->db
				->select()
				->limit(4)
				->from("testimonials")
				->order_by("created_on DESC")
				->get();
		return $sql->result_array();
	}

	public function get_testimony_user($id = null) {
		if(!is_null($id)) {
			return $this->db
					->select("first_name","last_name")
					->limit(1)
					->from("frontoffice_users")
					->get();
		}
	}

	public function get_one_testimonial($id = null) {
		$sql = $this->db->get_where($this->table_name,array("id" => $id));

		return $sql;
	}

	public function add_new_testimonial($title="",$content ="",$user_id = null) {
		$time = time();
		$sql = array(
				"title" => $title,
				"description" => $content,
				"user_id" => $user_id,
				"created_on" => $time,
			);
		$this->db->insert($this->table_name,$sql);

		return true;
	}
}