<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

	public function index()
	{
		$this->load->view('assets/header');
		$this->load->model('Login_user_model');
		$this->load->model('Stud_user_model');
		$this->load->view('Home');
		$this->load->view('assets/footer');
		
		// $this->load->view('assets/footer');

	}
	public function mailpage() {
		$this->load->view('assets/header');
		$this->load->model('Login_user_model');
		$this->load->model('Stud_user_model');
		$this->load->view('User/mail');
		$this->load->view('assets/footer');
	}
	public function forgotPassword() {
		$this->load->view('assets/header');
		$this->load->model('Login_user_model');
		$this->load->model('Stud_user_model');
		$this->load->view('User/evsu_forgotpassword_page');
		$this->load->view('assets/footer');
	}
	public function register_form()
	{	
		$this->load->model('Login_user_model');
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
					    location.href="/"
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
					    location.href="/"
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
			$_SESSION['stud_id'] = $data['stud_id'];
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
					    location.href="/"
				    </script>';
		}
		
	}
	public function performance($stud_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $stud_id;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_performance_page', $data);
			$this->load->view('assets/footer');
		}
		else
		{
			echo '  <script>
					    alert("You dont have the right to access this page. Please login first!");
					    location.href="/"
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
					    location.href="/"
				    </script>';
		}
			
	}
	public function sendEmail() {
		$to = $this->input->post('to');
		$subject = $this->input->post('subject');
		$evaluee = $this->input->post('evaluee');

		$message = '

            Hello '.$to.',
                                
            You received this email as your coordinator want to rate you to other trainee in different agency.
            
            Visit the link we provided so you can rate or evaluate your co-trainee here 
            '.base_url().'/Login/PTPgrades?studID='.$evaluee.' 
            
             Or you can copy this link and paste it on your browser url.                
            
            Make sure that you fill all the required field.
            
            Thanks!
            
                                
            Best regards,
          
            OJT Coordinator

                            
		';
		$headers = "From: no-reply@evsu-coe-ojt.ismartbit.net" . "\r\n" .
					"CC: no-reply@evsu-coe-ojt.ismartbit.net";

		$email = mail($to,$subject,$message,$headers);
		if( $email == true ) {
            $this->message('message','info' ,'Message Sent Successfully!');
         }else {
            $this->message('message','danger' ,'Message could not be sent!');
         }
		redirect('/Login/student_grade_list');

	}
	public function resetPassword() {
		$this->load->model('Login_user_model');
		$to = $this->input->post('to');
		$subject = "Reset Password";
		$data = array('email_add'=>$to);
		$checkEmail = $this->Login_user_model->checkEmail($data);
		$fullname = $checkEmail['fname'].' '.$checkEmail['lname'];
		
		$id = $checkEmail['admin_id'];
		$hash = md5( rand(0,1000) );

		if ($checkEmail) {
			$message =
			'
			Hi '.$fullname.', 

			Good Day Sir/Maam! 

			Follow this link to change your password '.base_url().'Resetpassword/reset/'.$id.'/'.$hash.'.
		

			Best Regards, 
			EVSU Team

			';
			$headers = "From: info@evsu-coe-ojt.890m.com" . "\r\n" .
						"CC: info@evsu-coe-ojt.890m.com";

			$email = mail($to,$subject,$message,$headers);

			if( $email == true ) {
	            $this->message('message','info' ,'Message Sent, See your email address and reset your password!');
	         }else {
	            $this->message('message','danger' ,'Something is not right. Message could not be sent!');
	         }
			redirect('/');
         }
		else
			$this->message('message','danger' ,'No Records found!');
			redirect('/Control/forgotPassword');
		
		
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
			$_SESSION['fullname'] = $studentData['lname'].''.$studentData['fname'];
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
		// $reg_cname = $this->input->post('reg_cname');
		// $reg_gender = $this->input->post('reg_gender');
		$reg_course = $this->input->post('reg_course');
		$reg_year = $this->input->post('reg_year');
		$reg_section = $this->input->post('reg_section');
		$reg_username = $this->input->post('reg_username');
		$reg_pass = $this->input->post('reg_pass');
		$confirm_pass = $this->input->post('confirm_pass');

		if ($reg_pass != $confirm_pass) {
			$this->message('message','danger' ,'Password is not match.');
			redirect('/Control/register_form');
		}
		if (!preg_match('/[^A-Za-z0-9]+/', $reg_pass) || strlen($reg_pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/Control/register_form');
			}
		else
		$where = array('stud_num' => $reg_stud_num);
		$check_exist = $this->Stud_user_model->check_student($where);

		if ($check_exist <= 0)
		{
		$data = array('stud_num' => $reg_stud_num, 'username'=> $reg_username, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'year' => $reg_year, 'section'=> $reg_section,'course'=>$reg_course, 'sex' => $reg_sex, 'password' => $reg_pass);
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
		$reg_course_id = $this->input->post('reg_course_id');
		$reg_year = $this->input->post('reg_year');
		$reg_section = $this->input->post('reg_section');
		$reg_email = $this->input->post('reg_email');
		$reg_birthday = $this->input->post('reg_birthday');
		$reg_contact = $this->input->post('reg_contact');
		$reg_curaddress = $this->input->post('reg_curaddress');

		$where = array('stud_id' => $reg_stud_num, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'sex'=> $reg_gender, 'course_id' => $reg_course_id, 'year' => $reg_year, 'section'=> $reg_section, 'email'=>$reg_email,'birthday'=>$reg_birthday,'contactNum'=>$reg_contact,
			'address'=>$reg_curaddress);
		
		$check_exist = $this->Stud_user_model->check_official_studID($reg_stud_num);
		if ($check_exist <= 0)
		{
		$data = array('stud_id' => $reg_stud_num, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'sex'=> $reg_gender, 'course_id' => $reg_course_id, 'year' => $reg_year, 'section'=> $reg_section, 'email'=>$reg_email,'birthday'=>$reg_birthday,'contactNum'=>$reg_contact,
			'address'=>$reg_curaddress);
		$this->Stud_user_model->insert_user_official_stud($data);
		$this->message('message','info' ,'Student added');		
		}

		else
		{
			$this->message('message','danger' ,'Student Already Existing!');
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
		$reg_contact = $this->input->post('reg_contact');
		$reg_birthday = $this->input->post('reg_birthday');
		$reg_curaddress = $this->input->post('reg_curaddress');
		$reg_pass = $this->input->post('reg_pass');
		$confirm_pass = $this->input->post('confirm_pass');
		$ip_address = $this->input->ip_address();
	
		if ($reg_pass != $confirm_pass) {
				$this->message('message', 'danger', 'Password is not match!');
				redirect('/Login/profile_page');
		}
		if (!preg_match('/[^A-Za-z0-9]+/', $reg_pass) || strlen($reg_pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/Login/profile');
			}
		else
		$where = array('username'=> $reg_username, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'email_add' => $reg_email, 'sex' => $reg_sex, 'contactNum'=>$reg_contact,'address'=>$reg_curaddress,'birthday'=>$reg_birthday, 'password' => $reg_pass);
		$check_exist = $this->Stud_user_model->check_admin($where);

		if ($check_exist <= 0)
		{
		$data = array('username'=> $reg_username, 'lname' => $reg_lname, 'fname' => $reg_fname, 'email_add' => $reg_email, 'contactNum'=>$reg_contact,'address'=>$reg_curaddress,'birthday'=>$reg_birthday, 'password' => $reg_pass);
		$this->Stud_user_model->insert_admin($data);
		
		
		$user = $_SESSION['username'] ;
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Added New Admin'.' '.$reg_fname.' '.$reg_lname);
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
		// $reg_cname = $this->input->post('reg_cname');
		$reg_contact = $this->input->post('reg_contact');
		$reg_email = $this->input->post('reg_email');
		$reg_birthday = $this->input->post('reg_birthday');
		$reg_address = $this->input->post('reg_curaddress');
		$reg_pass = $this->input->post('reg_pass');
		$confirm_pass = $this->input->post('confirm_pass');
		$ip_address = $this->input->ip_address();

		if ($reg_pass != $confirm_pass) {
				$this->message('message', 'danger', 'Password is not match!');
				redirect('/Login/coordinator_lists');
		}
		if (!preg_match('/[^A-Za-z0-9]+/', $reg_pass) || strlen($reg_pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/Login/coordinator_lists');
			}
		


		$where = array('username'=> $reg_username, 'password' => $reg_pass);
		$where1 = array('email'=> $reg_email);
		$where2 = array('contactNum'=> $reg_contact);
		$check_exist = $this->Stud_user_model->check_cdr($where);
		$check_exist1 = $this->Stud_user_model->check_cdr($where1);
		$check_exist2 = $this->Stud_user_model->check_cdr($where2);


		if($check_exist2) {
			$this->message('message','danger' ,'Contact Number Already Exist');
			redirect('/Login/coordinator_lists');

		}
		if($check_exist1) {
			$this->message('message','danger' ,'Email Address Already Exist');
			redirect('/Login/coordinator_lists');

		}
		if ($check_exist <= 0)
		{
		$data = array('username'=> $reg_username, 'lname' => $reg_lname, 'fname' => $reg_fname, 'course_id' => $reg_course_id,'address'=>$reg_address, 'email'=>$reg_email, 'contactNum'=>$reg_contact,'birthday'=>$reg_birthday, 'password' => $reg_pass);
		$this->Stud_user_model->insert_cdr($data);

		$user = $_SESSION['username'] ;
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Added New Coordinator'.' '.$reg_fname.' '.$reg_lname);
		$this->Stud_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Coordinator added');		
		}


		else
		{
			$this->message('message','danger' ,'Username Already Exist');
		}
		redirect('/Login/coordinator_lists');
	}
	public function register_supervisor()
	{
		$this->load->model('Stud_user_model');
		$cdr_id = $this->input->post('cdr_id');
		$reg_username = $this->input->post('reg_username');
		$reg_lname = $this->input->post('reg_lname');
		$reg_fname = $this->input->post('reg_fname');
		$reg_email = $this->input->post('reg_email');
		$reg_contact = $this->input->post('reg_contact');
		$reg_telnum = $this->input->post('reg_telnum');
		$reg_birthday = $this->input->post('reg_birthday');
		$reg_comp_id = $this->input->post('reg_comp_id');
		$reg_pass = $this->input->post('reg_pass');
		$confirm_pass = $this->input->post('confirm_pass');
		if ($reg_pass != $confirm_pass) {
				$this->message('message', 'danger', 'Password is not match!');
				redirect('/Login/coordinator_profile_page');
		}
		if (!preg_match('/[^A-Za-z0-9]+/', $reg_pass) || strlen($reg_pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/Login/coordinator_profile_page');
			}
		else
		$where = array('cdr_id'=>$cdr_id, 'username'=> $reg_username, 'lname'=> $reg_lname, 'fname' => $reg_fname, 'comp_id' => $reg_comp_id,'email_address'=>$reg_email, 'contactNum'=>$reg_contact, 'telNum'=>$reg_telnum,'birthday'=>$reg_birthday, 'password' => $reg_pass);
		$check_exist = $this->Stud_user_model->check_spv($where);

		if ($check_exist <= 0)
		{
			$data = array('cdr_id'=>$cdr_id, 'username'=> $reg_username, 'lname' => $reg_lname, 'fname' => $reg_fname, 'comp_id' => $reg_comp_id, 'email_address'=>$reg_email, 'contactNum'=>$reg_contact, 'telNum'=>$reg_telnum,'birthday'=>$reg_birthday,  'password' => $reg_pass);
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

	public function add_agency_spv_stud()
	{
		$this->load->model('Stud_user_model');
		$this->load->model('Login_user_model');
		$cdr_id = $this->input->post('cdr_id');
		$spv_id = $this->input->post('spv_id');
		$comp_id = $this->input->post('comp_id');
		$stud_id = $this->input->post('stud_id');
		$course_id = $this->input->post('course_id');
		

		foreach ($stud_id as $students_id) {
			$data = array('stud_id' => $students_id);
			$check_exist = $this->Stud_user_model->get_OJT1($students_id);
		}
		
		if ($check_exist <= 0)
		{
			foreach ($stud_id as $students_id) {
			$data = array(	
					'cdr_id'=> $cdr_id,
					'spv_id'=> $spv_id,
					'course_id' => $course_id,
					'comp_id' => $comp_id,
					'stud_id' => $students_id

					);
			$this->db->insert('evsu_cdr_spv_agency_stud_tbl', $data);

			}		
			$this->message('message','info' ,'Succes, Student added');		
		}
		else
		{			
			
			$this->message('message','danger' ,'Student already assigned to other Agency!'.$fullname.'');
			redirect('/Login/myAgency/'.$cdr_id.'');
			
		}
		redirect('/Login/myAgency/'.$cdr_id.'');
	}
	public function confirmSupervisor(){

		$this->load->model('Stud_user_model');
		$email = $this->input->post('email');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$cname = $this->input->post('cname');
		$contact = $this->input->post('contact');
		$password = $this->input->post('password');
		$confirmpass = $this->input->post('confirmpassword');
		$stat = 'inactive';
		$hash = md5( rand(0,1000) );

		$where = array('email_address'=> $email);
		$checkEmail = $this->Stud_user_model->checkEmail($where);
		if ($checkEmail) {
			$this->message('message','danger' ,'Email or Contact Number is already existing!');
			redirect('/');	
		}
		if ($password != $confirmpass) {
			$this->message('message','danger' ,'Password is not match!');
			redirect('/');
		}
		if (!preg_match('/[^A-Za-z0-9]+/', $password) || strlen($password) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/');
			}
		else
		$where = array('email_address'=> $email, 'fname'=> $fname, 'lname' => $lname, 'comp_id' => $cname, 'contactNum'=>$contact, 'password' => $password);
		$check_exist = $this->Stud_user_model->check_spv($where);

		if ($check_exist <= 0)
		{
			$data = array('email_address'=> $email, 'fname'=> $fname, 'lname' => $lname, 'comp_id' => $cname, 'contactNum'=>$contact, 'password' => $password,'status'=>$stat, 'hash'=>$hash);
			$this->Stud_user_model->insert_spv($data);
			$this->message('message','info' ,'Success! We will send you an email to confirm your account!');		
		}
		else
		{
			$this->message('message','danger' ,'User Already Existing!');
			redirect('/');
		}
		redirect('/');
	}

	public function add_course()
	{
		$this->load->model('Stud_user_model');
		$reg_course_abbrv = $this->input->post('reg_course_abbrv');
		$reg_course_name = $this->input->post('reg_course_name');
		$ip_address = $this->input->ip_address();
		$user = $_SESSION['username'];

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
			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Added New Course'.' '.$reg_course);
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
		$ip_address = $this->input->ip_address();

		$where = array('cname'=>$reg_cname,'agency_spv'=>$reg_spv,'agency_address'=>$reg_caddress); 
		$check_exist = $this->Stud_user_model->check_company($where);

		if ($check_exist){
			$this->message('message','danger' ,'Agency Already Exist');
			redirect('Login/agency_list');
		}

		else
		{		
			$data = array('cname'=>$reg_cname,'agency_spv'=>$reg_spv,'agency_address'=>$reg_caddress); 
			$this->Stud_user_model->insert_company($data);
			$this->message('message','info' ,'Success, Agency Added!');	
			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Added New Agency'.' '.$reg_cname);
			$this->Stud_user_model->add_activity($logs);
			redirect('/Login/agency_list');

		}
	}
	
	public function message($message, $alert, $parag)
	{
		$this->session->set_flashdata($message, "<div class='alert alert-".$alert." alert-dismissable fade in'>
			<span class=fa fa-exclamation-circle' area-hiden='true'></span>&nbsp;".$parag.'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.
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
		$ip_address = $this->input->ip_address();

		if($currentUser == $username )
		{
			$this->message('message', 'danger', 'Action is not allowed!');
		}
		else
		{
			$user = $_SESSION['username'] ;
			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Admin Deleted'.' '.$name);
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
		$user = $_SESSION['username'];
		
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Logs Deleted');
		$this->Stud_user_model->add_activity($logs);

		$this->Stud_user_model->delete_userlogs($id);
		$this->message('message', 'danger', 'Logs Deleted!');
		redirect('/Login/userlogs');
	}
	public function delete_cdr_list($id)
	{
		$this->load->model('Stud_user_model');
		$id = $this->input->post('delete_cdr');
		
		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Coordinator Lists Deleted.');
		$this->Stud_user_model->add_activity($logs);
		
		$this->Stud_user_model->delete_cdr_list($id);
		$this->message('message', 'danger', 'Coordinators Deleted!');
		redirect('/Login/coordinator_lists');
	}
	public function delete_agency_list($id)
	{
		$this->load->model('Stud_user_model');
		$id = $this->input->post('delete_agency');
		
		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Agency Lists Deleted.');
		$this->Stud_user_model->add_activity($logs);
		
		$this->Stud_user_model->delete_agency_list($id);
		$this->message('message', 'danger', 'Agency Deleted!');
		redirect('/Login/agency_list');
	}
	public function delete_spv_list($id)
	{
		$this->load->model('Stud_user_model');
		$id = $this->input->post('delete_spv');
		
		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Supervisor Lists Deleted.');
		$this->Stud_user_model->add_activity($logs);
		
		$this->Stud_user_model->delete_spv_list($id);
		$this->message('message', 'danger', 'Supervisors Deleted!');
		redirect('/Login/coordinator_profile_page');
	}
	public function deleteCourseList($id)
	{
		$this->load->model('Stud_user_model');
		$id = $this->input->post('delete_course');
		
		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Course Lists Deleted.');
		$this->Stud_user_model->add_activity($logs);
		
		$this->Stud_user_model->deleteCourseList($id);
		$this->message('message', 'danger', 'Courses1 Deleted!');
		redirect('/Login/others');
	}
	public function delete_stud_list_cdr($id)
	{
		$this->load->model('Stud_user_model');
		$id = $this->input->post('delete_stud_list');
		
		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Student Lists Deleted.');
		$this->Stud_user_model->add_activity($logs);
		
		$this->Stud_user_model->delete_stud_list1($id);
		$this->message('message', 'danger', 'Students Deleted!');
		redirect('/Login/student_list');
	}
	public function delete_stud_list($id)
	{
		$this->load->model('Stud_user_model');
		$id = $this->input->post('delete_stud_list');
		
		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Student Lists Deleted.');
		$this->Stud_user_model->add_activity($logs);
		
		$this->Stud_user_model->delete_stud_list($id);
		$this->message('message', 'danger', 'Students Deleted!');
		redirect('/Login/student_list');
	}
	public function delete_coordinator($id)
	{
		$this->load->model('Stud_user_model');
		$cdr_info = $this->Stud_user_model->get_cdr_info($id);
		$name = $cdr_info['fname'].' '.$cdr_info['lname'];
		$ip_address = $this->input->ip_address();
		
		$user = $_SESSION['username'] ;
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Coordinator Deleted'.' '.$name);
		$this->Stud_user_model->add_activity($logs);

		
		$this->Stud_user_model->delete_coordinator($id);
		$this->message('message', 'danger', 'Coordinator has been Deleted');
		redirect('/Login/coordinator_lists');
	}
	public function deleteCourse($id)
	{
		$this->load->model('Stud_user_model');
		$course_info = $this->Stud_user_model->get_course_info($id);
		$name = $course_name['course_name'];
		
		$user = $_SESSION['username'] ;
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Course Deleted'.' '.$name);
		$this->Stud_user_model->add_activity($logs);

		
		$this->Stud_user_model->deleteCourse($id);
		$this->message('message', 'danger', 'Course has been Deleted');
		redirect('/Login/others');
	}
	public function deleteAgency($id)
	{
		$this->load->model('Stud_user_model');
		$agency_info = $this->Stud_user_model->get_agency_info($id);
		$name = $course_name['cname'];
		
		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Agency Deleted'.' '.$name);
		$this->Stud_user_model->add_activity($logs);

		
		$this->Stud_user_model->deleteAgency($id);
		$this->message('message', 'danger', 'Agency has been Deleted');
		redirect('/Login/agency_list');
	}
	public function delete_supervisor($id)
	{
		$this->load->model('Stud_user_model');
		$spv_info = $this->Stud_user_model->get_spv_info($id);
		$name = $spv_info['fname'].' '.$spv_info['lname'];

		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Supervisor Deleted'.' '.$name);
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

		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Student Deleted'.' '.$name);
		$this->Stud_user_model->add_activity($logs);

		$this->Stud_user_model->delete_student($id);
		$this->message('message', 'danger', 'Student has been Deleted');
		redirect('/Login/student_list');
	}
	public function delete_student_cdr($id)
	{
		$this->load->model('Stud_user_model');
		$StudentInfo = $this->Stud_user_model->getThisUser($id);
		$name = $StudentInfo['fname'].' '.$StudentInfo['lname'];

		$user = $_SESSION['username'];
		$ip_address = $this->input->ip_address();
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Student Deleted'.' '.$name);
		$this->Stud_user_model->add_activity($logs);

		$this->Stud_user_model->delete_student1($id);
		$this->message('message', 'danger', 'Student has been Removed from the List');
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
		$ip_address = $this->input->ip_address();


		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'File Deleted'.' '.$file);
		$this->Stud_user_model->add_activity($logs);
		
		$this->Stud_user_model->delete_file($id);
		$this->message('message', 'danger', 'File Deleted!');
		redirect('/Login/uploads');
	}
	
}