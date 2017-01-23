<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function profile_page()
	{	
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/profile_page');
			$this->load->view('assets/footer');
		}
		else
		{
			echo '  <script>
					    alert("You dont have the right to access this page. Please login first!");
					    location.href=" http://localhost/EVSU_OJT/"
				    </script>';		
		}		
	}
	public function coordinator_lists()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
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
	public function others()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_course_agency_page');
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
	public function agency_list()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_agency_list');
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
	public function uploads()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('Uploads/evsu_uploads');
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
	public function coordinator_profile_page()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_coordinator_profile_page');
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
	public function supervisor_profile_page()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_supervisor_profile_page');
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
	public function student_list()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_student_list');
			$this->load->view('assets/footer');	
		}
		else{
			echo '  <script>
					    alert("You dont have the right to access this page. Please login first!");
					    location.href="/EVSU_OJT/"
				    </script>';

		}
		

	}
	public function userlogs()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->model('Stud_user_model');
			$this->load->view('User/evsu_userlogs');
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
	
	public function update_admin($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['admin_id'] = $id;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_update_page', $data);
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
	public function update_coordinator($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['cdr_id'] = $id;
			// $data = array('uid' => $id);
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_update_page_cdr', $data);
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
	public function update_supervisor($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['spv_id'] = $id;
			// $data = array('uid' => $id);
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_update_page_spv', $data);
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
	public function update_student_page($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $id;
			// $data = array('uid' => $id);
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_update_page_stud', $data);
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
					    alert("You dont have the right to access this page. Please login first!");
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
					    alert("You dont have the right to access this page. Please login first!");
					    location.href="/EVSU_OJT/"
				    </script>';
		}
	}	
	public function student_profile($stud_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $stud_id;
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_student_profile_spv', $data);
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
	public function student_profiles($stud_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $stud_id;
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_student_profile_cdr', $data);
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
	public function compute_grades_spv()
	{
		$this->load->model('Login_user_model');
		$stud_id = $this->input->post('stud_id');
		$answer_1 = $this->input->post('answer_1');
		$answer_2 = $this->input->post('answer_2');
		$answer_3 = $this->input->post('answer_3');
		$answer_4 = $this->input->post('answer_4');
		$answer_5 = $this->input->post('answer_5');
		$answer_6 = $this->input->post('answer_6');
		$answer_7 = $this->input->post('answer_7');
		$answer_8 = $this->input->post('answer_8');
		$answer_9 = $this->input->post('answer_9');
		$answer_10 = $this->input->post('answer_10');
		 

		$sum = array('answer_1' => $answer_1, 'answer_2'=>$answer_2,'answer_3'=>$answer_3,'answer_4'=>$answer_4,'answer_5'=>$answer_5,'answer_6'=>$answer_6, 'answer_7'=>$answer_7,'answer_8'=>$answer_8,'answer_9'=>$answer_9,'answer_10'=>$answer_10 );
		$grades = array_sum($sum) / 10;
		
		$data = array('stud_id'=>$stud_id,'total_grades' => $grades,'answer_1' => $answer_1, 'answer_2'=>$answer_2,'answer_3'=>$answer_3,'answer_4'=>$answer_4,'answer_5'=>$answer_5,'answer_6'=>$answer_6, 'answer_7'=>$answer_7,'answer_8'=>$answer_8,'answer_9'=>$answer_9,'answer_10'=>$answer_10);
		// $data = array('grades' => $output);

		$this->Login_user_model->compute_grades($data, $stud_id);
		$this->message('message','info' ,'Grades Added');
		redirect('/Login/supervisor_profile_page');

		

		
		
	}
	public function admin_chat_message()
	{

		if(isset($_SESSION['username']))
		{
		$this->load->model('Login_user_model');
		$this->load->view('assets/header');
		$this->load->view('User/evsu_admin_chat_page');
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
	public function coordinator_chat_message()
	{

		if(isset($_SESSION['username']))
		{
		$this->load->model('Login_user_model');
		$this->load->view('assets/header');
		$this->load->view('User/evsu_cdr_chat_page');
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
	public function supervisor_chat_message()
	{

		if(isset($_SESSION['username']))
		{
		$this->load->model('Login_user_model');
		$this->load->view('assets/header');
		$this->load->view('User/evsu_spv_chat_page');
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
	public function login_user()
	{
		$this->load->model('Login_user_model');
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$where = array('username'=> $user,'password' => $pass);
		$verified = $this->Login_user_model->check_login_student($where);
		$verified2 = $this->Login_user_model->check_login_admin($where);
		$verified3 = $this->Login_user_model->check_login_cdr($where);
		$verified4 = $this->Login_user_model->check_login_spv($where);
		$ip_address = $this->input->ip_address();



		if ($verified)
		{	
			$StudentInfo = $this->Login_user_model->getThisUser($where);
			$getJournal_ID = $this->Login_user_model->getJournal_ID();
			$_SESSION['stud_num'] = $StudentInfo['stud_num'];
			$_SESSION['lname'] = $StudentInfo['lname'];
			$_SESSION['fname'] = $StudentInfo['fname'];
			$_SESSION['course'] = $StudentInfo['course'];
			$_SESSION['day_code'] = $StudentInfo['day_code'];
			$_SESSION['username'] = $StudentInfo['username'];
			$_SESSION['currentStud'] = $StudentInfo['username']; 
			$stud_id = $_SESSION['stud_num'];
			$_SESSION['username'] = $user;
			$_SESSION['day_code']  = $getJournal_ID['AUTO_INCREMENT'];

			$logs = array('user' => $user, 'ip_address'=>$ip_address, 'activity' => 'Logged in');
			$this->Login_user_model->add_activity($logs);
			$this->Login_user_model->get_journal_data($stud_id);
			$this->message('message','info' ,'Successfully Login');
			redirect('Student/student_profile_page');		
		}
		elseif ($verified2)
		{						
			$admin_info = $this->Login_user_model->get_admin($where);
			$courseInfo = $this->Login_user_model->get_all_course();
			$this->session->set_userdata('lname', $admin_info['lname']);
			$_SESSION['username'] = $admin_info['username'];
			$_SESSION['currentUser'] = $admin_info['username'];
			$_SESSION['admin_id'] = $admin_info['admin_id'];
			$_SESSION['admin_image'] = $admin_info['admin_image'];
			$_SESSION['lname'] = $admin_info['lname'];
			$_SESSION['fname'] = $admin_info['fname'];
			$_SESSION['sex'] = $admin_info['sex'];
			$_SESSION['email_add'] = $admin_info['email_add'];
			$_SESSION['currentAdmin'] = $admin_info['username'];
			$_SESSION['course_id'] = $courseInfo['course_id'];
			$_SESSION['username'] = $user;	
			$logs = array('user' => $user, 'ip_address'=>$ip_address, 'activity' => 'Logged in');
			$this->Login_user_model->add_activity($logs);
			$this->message('message','info' ,'Successfully Login!');
			redirect('/Login/profile_page');		
		}
		elseif ($verified3)
		{
			$cdr_info = $this->Login_user_model->get_cdr($user, $pass);
			$_SESSION['username'] = $cdr_info['username'];
			$_SESSION['cdr_id'] = $cdr_info['cdr_id'];
			$_SESSION['lname'] = $cdr_info['lname'];
			$_SESSION['cname'] = $cdr_info['cname'];
			$_SESSION['fname'] = $cdr_info['fname'];
			$_SESSION['course_name'] = $cdr_info['course_name'];
			$_SESSION['course_abbrv'] = $cdr_info['course_abbrv'];
			$_SESSION['course_id'] = $cdr_info['course_id'];
			$_SESSION['currentUser'] = $cdr_info['username'];
			$_SESSION['currentCdr'] = $cdr_info['username'];	
			$_SESSION['username'] = $user;
			$course = $_SESSION['course'];

			$course_data= array('course' => $course );
			$logs = array('user' => $user, 'ip_address'=>$ip_address, 'activity' => 'Logged in');
			$this->Login_user_model->add_activity($logs);
			$this->message('message','info' ,'Successfully Login!');
			redirect('/Login/coordinator_profile_page');		
				
		}
		elseif ($verified4)
		{
			$spv_info = $this->Login_user_model->get_spv($user, $pass);
			$_SESSION['username'] = $spv_info['username'];
			$_SESSION['fname'] = $spv_info['fname'].' '.$spv_info['lname'];
			$_SESSION['spv_id'] = $cdr_info['spv_id'];
			$_SESSION['lname'] = $spv_info['lname'];
			$_SESSION['fname'] = $spv_info['fname'];
			$_SESSION['cname'] = $spv_info['cname'];
			$_SESSION['currentSpv'] = $spv_info['username'];	

			$_SESSION['username'] = $user;
			$logs = array('user' => $user, 'ip_address'=>$ip_address, 'activity' => 'Logged in');
			$this->Login_user_model->add_activity($logs);
			$this->message('message','info' ,'Succesfully Login');
			redirect('/Login/supervisor_profile_page');		
				
		}
		else
		{
			$this->message('message','danger' ,'Error! Check Your Password or Username and Refresh the page');
			redirect('/');	
		}
		
	}
	public function message($message, $alert, $parag)
	{
		$this->session->set_flashdata($message, "<div class='alert alert-".$alert." alert-dismissable fade in'>
			<span class='glyphicon glyphicon-exclamation-sign' area-hiden='true'></span>&nbsp;".$parag.'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.
		"</div>" );
	}
	
	public function update_cdr()
		{
			$this->load->model('Login_user_model');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$course = $this->input->post('course');
			$pass = $this->input->post('password');
			$cdr_id = $this->input->post('cdr_id');

			$data = array('fname' => $fname, 'lname' => $lname, 'course'=>$course, 'password' => $pass);
			$this->Login_user_model->update_cdr($data, $cdr_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user, 'activity' => 'Updated Coordinator'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', 'User successfully Updated');
			redirect('/Login/coordinator_lists');
		}
		public function update_admins()
		{
			$this->load->model('Login_user_model');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email_add = $this->input->post('email_add');
			$pass = $this->input->post('password');
			$admin_id = $this->input->post('admin_id');

			$data = array('fname' => $fname, 'lname' => $lname, 'email_add' => $email_add, 'password' => $pass);
			$this->Login_user_model->update_admin($data, $admin_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user, 'activity' => 'Updated Admin'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);

			$this->message('message', 'info', 'User successfully Updated');
			redirect('/Login/profile_page');
		}
		public function update_spv()
		{
			$this->load->model('Login_user_model');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$cname = $this->input->post('cname');
			$pass = $this->input->post('password');
			$spv_id = $this->input->post('spv_id');

			$data = array('fname' => $fname, 'lname' => $lname,'cname'=>$cname, 'password' => $pass);
			$this->Login_user_model->update_spv($data, $spv_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user, 'activity' => 'Updated Supervisor'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', 'User successfully Updated');
			redirect('/login/coordinator_profile_page');
		}
		public function update_student()
		{
			$this->load->model('Login_user_model');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$sex = $this->input->post('sex');
			// $course = $this->input->post('course');
			$year = $this->input->post('year');
			$section = $this->input->post('section');
			$cname = $this->input->post('cname');
			$stud_id = $this->input->post('stud_id');

			$data = array('fname' => $fname, 'lname' => $lname, 'sex' => $sex, 'year'=>$year, 'section'=> $section, 'cname'=> $cname);
			$this->Login_user_model->update_stud($data, $stud_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user, 'activity' => 'Updated Student'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', 'User successfully Updated');
			redirect('/Login/student_list');
		}
		public function update_student_pass()
		{
			$this->load->model('Login_user_model');
			$password = $this->input->post('password');
			$stud_id = $this->input->post('stud_id');

			$data = array('password'=> $password, 'stud_num'=> $stud_id);
			$this->Login_user_model->update_stud_pass($data, $stud_id);

			$user = $_SESSION['username']; 
			$logs = array('user' => $user, 'activity' => 'Updated Student Password'.' '.$stud_id);
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', 'User successfully Updated');
			redirect('/Login/student_profile_page');
		}
		public function insert_attendance()
		{
		$this->load->model('Login_user_model');
		$stud_id = $this->input->post('stud_id');
		$name = $this->input->post('name');
		$month = $this->input->post('month');
		$date = $this->input->post('date');
		$year = $this->input->post('year');
		$day = $this->input->post('day');
		$time_in_hour = $this->input->post('time_in_hour');
		$time_in_min = $this->input->post('time_in_min');
		$time_in_ap = $this->input->post('time_in_ap');
		$time_out_hour = $this->input->post('time_out_hour');
		$time_out_min = $this->input->post('time_out_min');
		$time_out_ap = $this->input->post('time_out_ap');

		$data = array('stud_id' => $stud_id,'name'=>$name, 'month'=>$month, 'date'=>$date, 'year'=>$year,'day'=>$day,'time_in_hour'=>$time_in_hour,'time_in_min'=>$time_in_min,'time_in_ap'=>$time_in_ap,'time_out_hour'=>$time_out_hour,'time_out_min'=>$time_out_min,'time_out_ap'=>$time_out_ap);

		$this->Login_user_model->insert_attend($data, $stud_id);
		$this->message('message','info' ,'Success! Attendance inserted!');		
		
		redirect('/Login/supervisor_profile_page/stud_id');
		}
		public function insertImage() {
			$this->load->model('Login_user_model');
			$admin_id = $this->input->post('admin_id');
			

			$target_dir = "assets/uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}

			
			$this->Login_user_model->insertImage($target_file, $admin_id);			
			$user = $_SESSION['username'];

			$logs = array('user' => $user, 'activity' => 'Added his/her profile image!');
			$this->Login_user_model->add_activity($logs);
			$this->message('message','info' ,'Succes, Image added');		
			redirect('/Login/profile_page');
		}
		public function insert_journal()
		{
		$this->load->model('Login_user_model');
		$stud_num = $this->input->post('stud_num');	
		$message = $this->input->post('message');
		$title = $this->input->post('title');	



		$target_dir = "assets/uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}


		$data = array('stud_id' => $stud_num, 'journal_post'=> $message, 'journal_title' => $title,'image'=>$target_file);
		$this->Login_user_model->insert_journal($data);
		
		
		$user = $_SESSION['username'] ;
		$logs = array('user' => $user, 'activity' => 'Write his/her daily journal');
		$this->Login_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Journal added');		
		redirect('/Login/student_profile_page');
		}
		public function insert_admin_chat()
		{
		$this->load->model('Login_user_model');;
		$chat_message = $this->input->post('chat_message');	
		$user = $_SESSION['username'] ;


		$data = array('message'=> $chat_message, 'username'=>$user);
		$this->Login_user_model->insert_gmessage($data);
		
		
		$logs = array('user' => $user, 'activity' => 'Write to group chat');
		$this->Login_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Journal added');		
		redirect('/Login/admin_chat_message');		
		}
		public function insert_cdr_chat()
		{
		$this->load->model('Login_user_model');;
		$chat_message = $this->input->post('chat_message');	
		$user = $_SESSION['username'] ;


		$data = array('message'=> $chat_message, 'username'=>$user);
		$this->Login_user_model->insert_gmessage($data);
		
		
		$logs = array('user' => $user, 'activity' => 'Write to group chat');
		$this->Login_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Journal added');		
		redirect('/Login/coordinator_chat_message');		
		}
		public function insert_spv_chat()
		{
		$this->load->model('Login_user_model');;
		$chat_message = $this->input->post('chat_message');	
		$user = $_SESSION['username'] ;


		$data = array('message'=> $chat_message, 'username'=>$user);
		$this->Login_user_model->insert_gmessage($data);
		
		
		$logs = array('user' => $user, 'activity' => 'Write to group chat');
		$this->Login_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Journal added');		
		redirect('/Login/supervisor_chat_message');		
		}
		public function insert_stud_chat()
		{
		$this->load->model('Login_user_model');;
		$chat_message = $this->input->post('chat_message');	
		$user = $_SESSION['username'] ;


		$data = array('message'=> $chat_message, 'username'=>$user);
		$this->Login_user_model->insert_gmessage($data);
		
		
		$logs = array('user' => $user, 'activity' => 'Write to group chat');
		$this->Login_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Journal added');		
		redirect('/Login/student_chat_message');		
		}

		public function get_journal_data()
		{

		}
		public function get_images()
		{
			$query = $this->db->get('uploads');
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				return $result;
			}
			else
				return false;
		}
		public function upload_file()
        {
	        $target_dir = "assets/uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
        }



	
		
		
}