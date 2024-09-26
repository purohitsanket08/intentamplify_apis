<?php

	class Contact_model extends CI_Model{

		public function insert_contact_us($data){
			$data['read_status'] = 1;
			return $this->db->insert('contact_us', $data);
		}
	}

?>
