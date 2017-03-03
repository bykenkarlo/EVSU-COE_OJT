<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm extends CI_Controller {
	public function account($spv_id) {
		$data['spv_id'] = $spv_id;
		$_SESSION['spv_id'] = $data['spv_id']; 
		$this->load->model('Login_user_model');
		$this->load->view('assets/header');
		$this->load->view('User/evsu_confirmLast', $data);
		$this->load->view('assets/footer');

		// if (!empty($_GET['spv_id'])) {
		// 	$spv_id = $_GET['spv_id'];
		// 	// $status = $_GET['status'];
		// 	$data = array('status' => $status);
		// 	$this->Login_user_model->updateConfirm($spv_id,$data);
		// 	$this->message('message','danger' ,'Account confirmed!');
		// 	redirect('/Control/forgotPassword');		
			
		// }
		// else
		// 	$this->message('message','danger' ,'Error! something is not right!');
		// 	redirect('/');
	}
	public function message($message, $alert, $parag)
	{
		$this->session->set_flashdata($message, "<div class='alert alert-".$alert." alert-dismissable fade in'>
			<span class='glyphicon glyphicon-exclamation-sign' area-hiden='true'></span>&nbsp;".$parag.'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.
		"</div>" );
	}
	public function clickConfirmed() {
		$this->load->model('Login_user_model');
		$spv_id = $this->input->post('spv_id');
		$_SESSION['spv_id'] = $spv_id;
		$where = array('spv_id'=>$spv_id);
		
		$check = $this->Login_user_model->checkspv($where);
		$status = 'active';
		$data = array('status'=> $status);
		$this->Login_user_model->updateToconfirmed($data, $spv_id);
		$this->message('message','info' ,'Account Confirmed!');

		redirect('/Login/supervisorSettings');

	}



}