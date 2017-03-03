<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword extends CI_Controller {

	public function reset($id) {
		$data['admin_id'] = $id;
		$this->load->view('assets/header');
		$this->load->model('Login_user_model');
		$this->load->model('Stud_user_model');
		$this->load->view('User/evsu_resetpass',$data);
		$this->load->view('assets/footer');
	}
}