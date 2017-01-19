<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

public function logout($user)
	{
		unset($_SESSION['user']);
		unset($_SESSION['lname']);
		unset($_SESSION['fname']);
		unset($_SESSION['cname']);
		unset($_SESSION['stud_id']);
		$_SESSION[] = [];
		$this->session->sess_destroy();	
		redirect('/');
	}
	public function student_profile_page()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_student_profile_page');
			$this->load->view('assets/footer');	
		}
		else
		{
			echo '  <script>
					    alert("You dont have the right to access this page. Please login first!");
					    location.href="/EVSU_OJT/"
				    </script>';

		}
	}
	public function journal()
	{
		if(isset($_SESSION['username']))
		{
		$this->load->model('Login_user_model');
		$this->load->view('assets/header');
		$this->load->view('User/evsu_journal_list');
		$this->load->view('assets/footer');
		}
		else
		{
			echo '  <script>
					    alert("Session have expired. Please login first!");
					    location.href="/EVSU_OJT/"
				    </script>';
		}
	}
	public function grades()
	{
		if(isset($_SESSION['username']))
		{
		$this->load->model('Login_user_model');
		$this->load->view('assets/header');
		$this->load->view('User/evsu_stud_grades');
		$this->load->view('assets/footer');
		}
		else
		{
			echo '  <script>
					    alert("Session have expired. Please login again!");
					    location.href="/EVSU_OJT/"
				    </script>';
		}
	}	
	public function student_chat_message()
	{

		if(isset($_SESSION['username']))
		{
		$this->load->model('Login_user_model');
		$this->load->view('assets/header');
		$this->load->view('User/evsu_stud_chat_page');
		$this->load->view('assets/footer');
		}
		else
		{
			echo '  <script>
					    alert("You dont have the right to access this page. Please login first!");
					    location.href="/EVSU_OJT/"
				    </script>';
		}
	}




}
	






















