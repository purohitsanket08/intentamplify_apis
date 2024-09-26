<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Contact_model','contact_model');
	}

	public function contact_request(){
		$json_data_request = json_decode(file_get_contents("php://input"), true);
		$_POST['email'] = $json_data_request['email'];
		$_POST['name'] = $json_data_request['name'];
		$_POST['mob'] = $json_data_request['mob'];
		$_POST['company'] = $json_data_request['company'];
		$_POST['details'] = $json_data_request['details'];

		extract($_POST);

		$contact_Data = array(
			'email' => $email,
			'name' => $name,
			'mob' => $mob,
			'company' => $company,
			'details' => $details,
		);

		$response = $this->contact_model->insert_contact_us($contact_Data);
		try {
			if (!empty($response)) {
				echo json_encode(array(
					'status' => true,
					'message' => 'Request successful.',
					'result' => $response
				));
			} else {
				echo json_encode(array(
					'status' => false,
					'message' => 'Request Un-successful.',
					'result' => []
				));
			}
		}catch (Exception $e){
			echo json_encode(array(
				'status' => false,
				'message' => 'Request failed due to.',
				'result' => $e
			));
		}
	}
}
