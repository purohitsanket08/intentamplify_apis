<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model','user_model');
		$this->load->library('Jwt','jwt');
	}

	public function login(){
		$json_data_request = json_decode(file_get_contents("php://input"), true);
		$_POST['email'] = $json_data_request['email'];
		$_POST['password'] = $json_data_request['password'];

		extract($_POST);

		if(empty($email) && empty($password)){
			echo json_encode(array(
				'status' => 'fail',
				'message' => 'Email and Password field is required.!',
				'result' => []
			));
			return ;
		}
		try {
			$user = $this->user_model->check_user_by_email($email);
			if ($user && password_verify($password, $user['password'])) {
				$token = $this->jwt->generate_jwt($user);
				echo json_encode(array(
					'status' => true,
					'message' => 'Login successful.',
					'result' => ['user' => $user, 'token' => $token]
				));
			} else {
				echo json_encode(array(
					'status' => false,
					'message' => 'Password or email Not existed..',
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

	public function register(){
		$json_data_request = json_decode(file_get_contents("php://input"), true);
		$_POST['first_name'] = $json_data_request['first_name'];
		$_POST['last_name'] = $json_data_request['last_name'];
		$_POST['mobile'] = $json_data_request['mobile'];
		$_POST['password'] = $json_data_request['password'];
		$_POST['email'] = $json_data_request['email'];

		extract($_POST);

		$existingUser = $this->user_model->check_user_exist($data['email']);
		if ($existingUser) {
			echo json_encode(array(
				'status' => 'error',
				'message' => 'Email already exists. Please use a different email.',
				'result' => []
			));
			echo json_encode($response);
			return;
		}

		$userData = array(
			'email' => $email,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'mobile' => $mobile,
			'password' => $password,
		);

		$response = $this->user_model->register_user($userData);
		try {
			if (!empty($response)) {
				echo json_encode(array(
					'status' => true,
					'message' => 'Registration successful.',
					'result' => $response
				));
			} else {
				echo json_encode(array(
					'status' => false,
					'message' => 'Registration Un-successful.',
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

	public function change_password(){

	}
}
