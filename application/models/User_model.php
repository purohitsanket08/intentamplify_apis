<?php

	class User_model extends CI_Model{

		public function insert_user($data){
			$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
			$data['status'] = 1;
			return $this->db->insert('users', $data);
		}

		public function check_user_exist($email){
			$this->db->where('email', $email);
			$query = $this->db->get('users');
			return $query->num_rows() > 0;
		}

		public function check_user_by_email($email){
			$this->db->where('email', $email);
			$query = $this->db->get('users');
			return $query->row_array();
		}

	}

?>
