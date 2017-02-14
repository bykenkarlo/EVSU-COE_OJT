<?php if (! defined('BASEPATH')) exit('No direct script access allowed!');


	class  Ajax_post_controller extends CI_controller {

		public function index() {
			$this->load->view('views/Ajax_post_view');
		}
		 public function user_data_submit() {
		 	$data = array(
		 		'username' = $this->input->post('username'),
		 		'password' = $this->input->post('password')
		 		);
		 	echo json_encode($data);
		 }


	}
 ?>