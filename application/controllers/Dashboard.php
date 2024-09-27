<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$data['title'] = 'Dashboard';
		$this->load->view('dashboard/dashboard',$data);
	}

	public function change_password(){
		$data['title'] = 'Change Password';
		$this->load->view('dashboard/change_pass',$data);
	}

	public function product(){
		$data['title'] = 'Product List';
		$this->load->view('dashboard/product',$data);
	}
}
