<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

	public function index()
	{
		$this->load->view('assets/header');
		$this->load->view('Home');
		$this->load->view('assets/footer');
		
		// $this->load->view('assets/footer');

	}

	public function register_form()
	{
		$this->load->view('assets/header');
		$this->load->view('User/evsu_register_user');
		$this->load->view('assets/footer');

	}

	public function contact_form()
	{
		$this->load->view('assets/header');
		$this->load->view('User/evsu_contact');
		$this->load->view('assets/footer');
	}
	
	public function coordinator_lists()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->view('User/evsu_coordinator_list');
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
	public function Trainee()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->view('User/evsu_trainees_list');
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
	
	public function grades($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $id;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_grades_spv', $data);
			$this->load->view('assets/footer');
		}
		else
		{
			echo '  <script>
						var base_url = window.location.origin;
					    alert("You dont have the right to access this page. Please login first!");
					    window.location="base_url"
				    </script>';
		}
		
		
	}	
	public function studentGrades($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $id;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_gradesStudentCdr', $data);
			$this->load->view('assets/footer');
		}
		else
		{
			echo '  <script>
						var base_url = window.location.origin;
					    alert("You dont have the right to access this page. Please login first!");
					    window.location="base_url"
				    </script>';
		}
		
		
	}
	public function attendance($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $id;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_stud_attendance', $data);
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
	public function edit_users($id)
	{
		
		if(isset($_SESSION['username']))
		{
			$data['spv_id'] = $id;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_supervisor_profile_page', $data);
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
	public function check_student()
	{
		$this->load->model('Stud_user_model');
		$reg_stud_num = $this->input->post('reg_stud_num');

		// $where = array('stud_id' => $reg_stud_num);
		$check_exist = $this->Stud_user_model->check_stud_num($reg_stud_num);
		$check_stud = $this->Stud_user_model->check_stud($reg_stud_num);


		if ($check_exist)
		{
			$studentData = $this->Stud_user_model->getThisUser($reg_stud_num);
			$_SESSION['stud_id'] = $studentData['stud_id'];
			$_SESSION['lname'] = $studentData['lname'];
			$_SESSION['fname'] = $studentData['fname'];
			$_SESSION['sex'] = $studentData['sex'];
			$_SESSION['year'] = $studentData['year'];
			$_SESSION['cname'] = $studentData['cname'];
			$_SESSION['course'] = $studentData['course'];
			$_SESSION['section'] = $studentData['section'];
			redirect('/Control/register_form');
			// $this->stud_user_model->insert_user($data);
			// $this->message('message','info' ,'Succes, You can now login');		
		}
		elseif ($check_stud) 
		{
			$this->message('message','danger' ,'Student Already Exist!');
			redirect('/');
		}
		else
		{
			$this->message('message','danger' ,'Student Not Exist! Please Refresh The Page And Try Again.');
		}
		redirect('/');
	}
	public function register_stud_user()
	{
		$this->load->model('Stud_user_model');
		$reg_stud_num = $this->input->post('reg_stud_num');
		$reg_lname = $this->input->post('reg_lname');
		$reg_fname = $this->input->post('reg_fname');
		$reg_sex = $this->input->post('reg_sex');
		$reg_cname = $this->input->post('reg_cname');
		$reg_gender = $this->input->post('reg_gender');
		$reg_course = $this->input->post('reg_course');
		$reg_year = $this->input->post('reg_year');
		$reg_section = $this->input->post('reg_section');
		$reg_username = $this->input->post('reg_username');
		$reg_pass = $this->input->post('reg_pass');


		$where = array('stud_num' => $reg_stud_num, 'username'=> $reg_username, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'course'=>$reg_course, 'year' => $reg_year, 'section'=> $reg_section, 'sex' => $reg_sex, 'password' => $reg_pass);
		$check_exist = $this->Stud_user_model->check_student($where);

		if ($check_exist <= 0)
		{
		$data = array('stud_num' => $reg_stud_num, 'username'=> $reg_username, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'course'=>$reg_course, 'year' => $reg_year, 'section'=> $reg_section, 'sex' => $reg_sex, 'password' => $reg_pass);
		$this->Stud_user_model->insert_user($data);
		$this->message('message','info' ,'Succes, You can now login');	
		redirect('/');

		}

		else
		{
			$this->message('message','danger' ,'User Already Exist');
		}
		redirect('/Control/register_form');
	}
	public function register_official_stud_user()
	{
		$this->load->model('Stud_user_model');
		$reg_stud_num = $this->input->post('reg_stud_num');
		$reg_lname = $this->input->post('reg_lname');
		$reg_fname = $this->input->post('reg_fname');
		$reg_gender = $this->input->post('reg_gender');
		$reg_cname = $this->input->post('reg_cname');
		$reg_course_id = $this->input->post('reg_course_id');
		$reg_year = $this->input->post('reg_year');
		$reg_section = $this->input->post('reg_section');

		$where = array('stud_id' => $reg_stud_num, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'sex'=> $reg_gender, 'cname' => $reg_cname, 'course_id' => $reg_course_id, 'year' => $reg_year, 'section'=> $reg_section);
		
		$check_exist = $this->Stud_user_model->check_official_stud($where);

		if ($check_exist <= 0)
		{
		$data = array('stud_id' => $reg_stud_num, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'sex'=> $reg_gender, 'cname' => $reg_cname, 'course_id' => $reg_course_id, 'year' => $reg_year, 'section'=> $reg_section);
		$this->Stud_user_model->insert_user_official_stud($data);
		$this->message('message','info' ,'Student added');		
		}

		else
		{
			$this->message('message','danger' ,'User Already Exist');
		}
		redirect('/Login/student_list');
	}

	public function register_admin()
	{
		$this->load->model('Stud_user_model');;
		$reg_username = $this->input->post('reg_username');
		$reg_lname = $this->input->post('reg_lname');
		$reg_fname = $this->input->post('reg_fname');
		$reg_sex = $this->input->post('reg_sex');
		$reg_email = $this->input->post('reg_email');
		$reg_pass = $this->input->post('reg_pass');
	

		$where = array('username'=> $reg_username, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'email_add' => $reg_email, 'sex' => $reg_sex, 'password' => $reg_pass);
		$check_exist = $this->Stud_user_model->check_admin($where);

		if ($check_exist <= 0)
		{
		$data = array('username'=> $reg_username, 'lname' => $reg_lname, 'fname' => $reg_fname, 'email_add' => $reg_email, 'password' => $reg_pass);
		$this->Stud_user_model->insert_admin($data);
		
		
		$user = $_SESSION['username'] ;
		$logs = array('user' => $user, 'activity' => 'Added New Admin'.' '.$reg_fname.' '.$reg_lname);
		$this->Stud_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Admin added');		
		}

		else
		{
			$this->message('message','danger' ,'Admin Already Exist');
		}
		redirect('/Login/profile_page');
	}
	
	public function register_coordinator()
	{
		$this->load->model('Stud_user_model');
		$reg_username = $this->input->post('reg_username');
		$reg_lname = $this->input->post('reg_lname');
		$reg_fname = $this->input->post('reg_fname');
		$reg_course_id = $this->input->post('reg_course_id');
		$reg_cname = $this->input->post('reg_cname');
		$reg_pass = $this->input->post('reg_pass');


		$where = array('username'=> $reg_username, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'course_id' => $reg_course_id, 'cname'=>$reg_cname,'password' => $reg_pass);
		$check_exist = $this->Stud_user_model->check_cdr($where);

		if ($check_exist <= 0)
		{
		$data = array('username'=> $reg_username, 'lname' => $reg_lname, 'fname' => $reg_fname, 'course_id' => $reg_course_id, 'cname'=> $reg_cname,'password' => $reg_pass);
		$this->Stud_user_model->insert_cdr($data);

		$user = $_SESSION['username'] ;
		$logs = array('user' => $user, 'activity' => 'Added New Coordinator'.' '.$reg_fname.' '.$reg_lname);
		$this->Stud_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Coordinator added');		
		}

		else
		{
			$this->message('message','danger' ,'Coordinator Already Exist');
		}
		redirect('/Login/coordinator_lists');
	}
	public function register_supervisor()
	{
		$this->load->model('Stud_user_model');
		$reg_username = $this->input->post('reg_username');
		$reg_lname = $this->input->post('reg_lname');
		$reg_fname = $this->input->post('reg_fname');
		$reg_cname = $this->input->post('reg_cname');
		$reg_pass = $this->input->post('reg_pass');


		$where = array('username'=> $reg_username, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'cname' => $reg_cname, 'password' => $reg_pass);
		$check_exist = $this->Stud_user_model->check_spv($where);

		if ($check_exist <= 0)
		{
			$data = array('username'=> $reg_username, 'lname' => $reg_lname, 'fname' => $reg_fname, 'cname' => $reg_cname, 'password' => $reg_pass);
			$this->Stud_user_model->insert_spv($data);
			$this->message('message','info' ,'Succes, Supervisor added');		
		}

		else
		{
			$this->message('message','danger' ,'Supervisor Already Exist');
			redirect('Login/coordinator_profile_page');
		}
		redirect('/Login/coordinator_profile_page');
	}
	public function add_course()
	{
		$this->load->model('Stud_user_model');
		$reg_course_abbrv = $this->input->post('reg_course_abbrv');
		$reg_course_name = $this->input->post('reg_course_name');
		$where = array('course_abbrv'=>$reg_course_abbrv, 'course_name'=>$reg_course_name); 
		$check_exist = $this->Stud_user_model->check_course($where);
		$user = $_SESSION['username'] ;
		if ($check_exist){
			$this->message('message','danger' ,'Course Already Exist');
			redirect('Login/profile_page');
		}

		else
		{		
			$data = array('course_abbrv'=>$reg_course_abbrv, 'course_name'=>$reg_course_name );
			$this->Stud_user_model->insert_course($data);
			$this->message('message','info' ,'Success New Course Added!');	
			$logs = array('user' => $user, 'activity' => 'Added New Course'.' '.$reg_course);
			$this->Stud_user_model->add_activity($logs);
			redirect('Login/others');

		}
	}
	public function add_company()
	{
		$this->load->model('Stud_user_model');
		$reg_cname = $this->input->post('reg_cname');
		$reg_spv = $this->input->post('reg_spv');
		$reg_caddress = $this->input->post('reg_caddress');
		$user = $_SESSION['username'] ;

		$where = array('cname'=>$reg_cname,'agency_spv'=>$reg_spv,'agency_address'=>$reg_caddress); 
		$check_exist = $this->Stud_user_model->check_company($where);

		if ($check_exist){
			$this->message('message','danger' ,'Agency Already Exist');
			redirect('Login/profile_page');
		}

		else
		{		
			$data = array('cname'=>$reg_cname,'agency_spv'=>$reg_spv,'agency_address'=>$reg_caddress); 
			$this->Stud_user_model->insert_company($data);
			$this->message('message','info' ,'Success, Agency Added!');	
			$logs = array('user' => $user, 'activity' => 'Added New Agency'.' '.$reg_cname);
			$this->Stud_user_model->add_activity($logs);
			redirect('/Login/profile_page');

		}
	}
	
	public function message($message, $alert, $parag)
	{
		$this->session->set_flashdata($message, "<div class='alert alert-".$alert." alert-dismissable fade in'>
			<span class='glyphicon glyphicon-exclamation-sign' area-hiden='true'></span>&nbsp;".$parag.'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.
		"</div>" );
	}
	public function logout($user)
	{
		session_unset();
		$_SESSION[] = [];
		unset($_SESSION['user']);
		unset($_SESSION['lname']);
		unset($_SESSION['fname']);
		unset($_SESSION['cname']);
		unset($_SESSION['admin_id']);
		unset($_SESSION['cdr_id']);
		unset($_SESSION['spv_id']);
		

		$this->session->sess_destroy();	
		redirect('/');
	}
	public function delete_admin($id)
	{	
		$this->load->model('Stud_user_model');
		$admin_info = $this->Stud_user_model->get_admin_info($id);
		$name = $admin_info['fname'].' '.$admin_info['lname'];
		$username = $admin_info['username'];

		if($currentUser == $username )
		{
			$this->message('message', 'danger', 'Action is not allowed!');
		}
		else
		{
			$user = $_SESSION['username'] ;
			$logs = array('user' => $user, 'activity' => 'Admin Deleted'.' '.$name);
			$this->Stud_user_model->add_activity($logs);
			$this->Stud_user_model->delete_admin($id);
			$this->message('message', 'danger', 'Admin has been Deleted');
		}
		
		redirect('/Login/profile_page');
	}
	public function delete_logs($id)
	{
		$this->load->model('Stud_user_model');
		$id = $this->input->post('delete_logs');
		
		$this->Stud_user_model->delete_userlogs($id);
		$this->message('message', 'danger', 'Logs Deleted!');
		redirect('/Login/userlogs');
	}
	public function delete_cdr_list($id)
	{
		$this->load->model('Stud_user_model');
		$id = $this->input->post('delete_cdr');
		
		$this->Stud_user_model->delete_cdr_list($id);
		$this->message('message', 'danger', 'Coordinators Deleted!');
		redirect('/Login/coordinator_lists');
	}
	public function delete_spv_list($id)
	{
		$this->load->model('Stud_user_model');
		$id = $this->input->post('delete_spv');
		
		$this->Stud_user_model->delete_spv_list($id);
		$this->message('message', 'danger', 'Supervisors Deleted!');
		redirect('/Login/coordinator_profile_page');
	}
	public function delete_stud_list($id)
	{
		$this->load->model('stud_user_model');
		$id = $this->input->post('delete_stud_list');
		
		$this->Stud_user_model->delete_stud_list($id);
		$this->message('message', 'danger', 'Students Deleted!');
		redirect('/Login/student_list');
	}
	public function delete_coordinator($id)
	{
		$this->load->model('Stud_user_model');
		$cdr_info = $this->Stud_user_model->get_cdr_info($id);
		$name = $cdr_info['fname'].' '.$cdr_info['lname'];
		
		$user = $_SESSION['username'] ;
		$logs = array('user' => $user, 'activity' => 'Coordinator Deleted'.' '.$name);
		$this->Stud_user_model->add_activity($logs);

		
		$this->Stud_user_model->delete_coordinator($id);
		$this->message('message', 'danger', 'Coordinator has been Deleted');
		redirect('/Login/coordinator_lists');
	}
	public function delete_supervisor($id)
	{
		$this->load->model('Stud_user_model');
		$spv_info = $this->Stud_user_model->get_spv_info($id);
		$name = $spv_info['fname'].' '.$spv_info['lname'];

		$user = $_SESSION['username'] ;
		$logs = array('user' => $user, 'activity' => 'Supervisor Deleted'.' '.$name);
		$this->Stud_user_model->add_activity($logs);
			
		$this->Stud_user_model->delete_supervisor($id);
		$this->message('message', 'danger', 'Supervisor has been Deleted');
		redirect('/Login/coordinator_profile_page');
	}
	public function delete_student($id)
	{
		$this->load->model('Stud_user_model');
		$StudentInfo = $this->Stud_user_model->getThisUser($id);
		$name = $StudentInfo['fname'].' '.$StudentInfo['lname'];

		$user = $_SESSION['username'] ;
		$logs = array('user' => $user, 'activity' => 'Student Deleted'.' '.$name);
		$this->Stud_user_model->add_activity($logs);

		$this->Stud_user_model->delete_student($id);
		$this->message('message', 'danger', 'Student has been Deleted');
		redirect('/Login/student_list');
	}
	public function delete_file($id)
	{
		$this->load->model('Stud_user_model');
		$file_info = $this->Stud_user_model->get_file_data($id);
		$cdr_info = $this->Stud_user_model->get_cdr_info($id);
		$name = $cdr_info['fname'].' '.$cdr_info['lname'];
		$user = $_SESSION['username'] ;
		$file = $file_info['pdf_file'];


		$logs = array('user' => $user, 'activity' => 'File Deleted'.' '.$file);
		$this->Stud_user_model->add_activity($logs);
		
		$this->Stud_user_model->delete_file($id);
		$this->message('message', 'danger', 'File Deleted!');
		redirect('/Login/uploads');
	}
	
}