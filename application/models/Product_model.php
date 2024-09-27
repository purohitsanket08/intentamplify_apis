<?php

	class Product_model extends CI_Model{

		public function __construct() {
			parent::__construct();
			$this->load->database();
		}

		public function insert_payment_voucher($data) {
			$this->db->insert('payment_voucher', $data);
			return $this->db->insert_id();
		}

	}
?>
