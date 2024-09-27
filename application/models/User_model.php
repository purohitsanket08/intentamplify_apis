<?php

	class User_model extends CI_Model{

		public function __construct() {
			parent::__construct();
			$this->load->database();
		}

		public function insert_user($data){
			return $this->db->insert('users', $data);
		}

		public function check_user_exist($email){
			$this->db->where('email', $email);
			$query = $this->db->get('users');
			return $query->num_rows() > 0;
		}

		public function get_user_info($id){
			$this->db->where('id', $id);
			$query = $this->db->get('users');
			return $query->row_array();
		}

		public function check_user_by_email($email){
			$this->db->where('email', $email);
			$query = $this->db->get('users');
			return $query->row_array();
		}

		public function update_password($user_id, $data) {
			$this->db->where('id', $user_id);
			return $this->db->update('users', $data); // Make sure 'users' is your table name
		}

	}

?>
