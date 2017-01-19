<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

public function logout()
	{
		
		session_destroy();
		$this->session->sess_destroy();	
		redirect('/');
	}
}
	






















