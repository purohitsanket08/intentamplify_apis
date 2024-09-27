<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model','user_model');
		$this->load->library('Jwt_auth');
		if (!class_exists('Jwt_auth')) {
			die('Jwt_auth library not loaded');
		}
	}

	//ALL Pages
	public function index(){
		$data['title'] = 'Login';
		$this->load->view('auth/login',$data);
	}

	public function register(){
		$data['title'] = 'Register';
		$this->load->view('auth/register', $data);
	}
	//ALL APIS

	public function login_api(){
		header('Content-Type: application/json');
		$json_data_request = json_decode(file_get_contents("php://input"), true);
		$_POST['email'] = $json_data_request['email'];
		$_POST['password'] = $json_data_request['password'];

		extract($_POST);

		if(empty($email) && empty($password)){
			echo json_encode(array(
				'status' => false,
				'message' => 'Email and Password field is required.!',
				'result' => []
			));
			return ;
		}
		try {
			$user = $this->user_model->check_user_by_email($email);
			if ($user && password_verify($password, $user['password'])) {
				$this->load->library('Jwt_auth');
				$token = $this->jwt_auth->generate_jwt($user);
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

	public function register_api(){
		header('Content-Type: application/json');
		$json_data_request = json_decode(file_get_contents("php://input"), true);
		$_POST['first_name'] = $json_data_request['first_name'];
		$_POST['last_name'] = $json_data_request['last_name'];
		$_POST['mobile'] = $json_data_request['mobile'];
		$_POST['password'] = $json_data_request['password'];
		$_POST['email'] = $json_data_request['email'];

		extract($_POST);

		$existingUser = $this->user_model->check_user_exist($email);
		if ($existingUser) {
			echo json_encode(array(
				'status' => false,
				'message' => 'Email already exists. Please use a different email.',
				'result' => []
			));
			return;
		}

		$userData = array(
			'email' => $email,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'mobile' => $mobile,
			'password' => password_hash($password, PASSWORD_BCRYPT),
			'status' => 1
		);

		$response = $this->user_model->insert_user($userData);
		try {
			if (!empty($response)) {
				echo json_encode(array(
					'status' => true,
					'message' => 'Registration successful.',
					'result' => array(
						'email' => $email,
						'first_name' => $first_name,
						'last_name' => $last_name,
						'mobile' => $mobile,
					)
				));
			} else {
				echo json_encode(array(
					'status' => false,
					'message' => 'Registration Un-successful.',
					'result' => ''
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

	public function change_password_api(){
		header('Content-Type: application/json');
		$json_data_request = json_decode(file_get_contents("php://input"), true);
		$_POST['id'] = $json_data_request['id'];
		$_POST['old_password'] = $json_data_request['old_password'];
		$_POST['new_password'] = $json_data_request['new_password'];

		extract($_POST);

		if(empty($new_password) && empty($old_password)){
			echo json_encode(array(
				'status' => false,
				'message' => 'Old Password and New Password field is required.!',
				'result' => []
			));
			return ;
		}
		try {
			$user = $this->user_model->get_user_info($id);
			if ($user && password_verify($old_password, $user['password'])) {
				$data = array(
					'password' => password_hash($new_password, PASSWORD_BCRYPT)
				);

				$this->user_model->update_password($id,$data);

				echo json_encode(array(
					'status' => true,
					'message' => 'Password Updated successful.',
					'result' => []
				));
			} else {
				echo json_encode(array(
					'status' => false,
					'message' => 'User Not Not existed..',
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

?>
