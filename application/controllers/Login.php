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
					    location.href=" http://localhost/"
				    </script>';		
		}		
	}
	public function about()
	{	
		
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/about');
			$this->load->view('assets/footer');
		
				
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
					    location.href="/"
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
					    location.href="/"
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
					    location.href="/"
				    </script>';
		}
		
	}
	public function inactive_accounts()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_inactive_account_spv');
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
					    location.href="/"
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
					    location.href="/"
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
					    location.href="/"
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
					    location.href="/"
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
					    location.href="/"
				    </script>';

		}
		

	}
	public function student_grade_list()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_student_grade_list');
			$this->load->view('assets/footer');	
		}
		else{
			echo '  <script>
					    alert("You dont have the right to access this page. Please login first!");
					    location.href="/"
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
					    location.href="/"
				    </script>';

		}
		
	}
	public function criteria()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->model('Stud_user_model');
			$this->load->view('User/evsu_criteria');
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
	public function gradingSystem($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['id'] = $id;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_grading_system', $data);
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
	public function confirmAccount($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['spv_id'] = $id;
			$_SESSION['spv_id'] = $data['spv_id']; 
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_send_confirmation_mail', $data);
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
	public function myAgency($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['spv_id'] = $id;
			$_SESSION['spv_id'] = $data['spv_id']; 
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_myagency_page', $data);
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
	public function update_criteria($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['id'] = $id;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_update_criteria_page', $data);
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
	public function coordinator_profile_adm($cdr_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['cdr_id'] = $cdr_id;
			$_SESSION['cdr_id'] = $data['cdr_id'];
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_cdr_profile_admin', $data);
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
					    location.href="/"
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
					    location.href="/"
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
					    location.href="/"
				    </script>';

		}
			
	}
	public function supervisorSettings() {
		if(isset($_SESSION['spv_id']))
		{
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_supervisor_settings');
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
	public function gradeStudent($stud_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $stud_id;
			// $data = array('uid' => $id);
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_overallgrade_page', $data);
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
	public function journalPrint($journal_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['journal_id'] = $journal_id;
			$_SESSION['journal_id'] = $data['journal_id'];
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_journal_print', $data);
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
	public function student_accounts()
	{
		if(isset($_SESSION['username']))
		{
			// $data['journal_id'] = $journal_id;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_student_accounts');
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
	public function update_student_page($stud_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $stud_id;
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
					    location.href="/"
				    </script>';
		}
			
	}
	public function Usersguide()
	{
		if(isset($_SESSION['username']))
		{
			;
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_users_guide');
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
	public function update_grades_student_page($stud_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $stud_id;
			// $data = array('uid' => $id);
			$_SESSION['stud_id'] = $data['stud_id'];
			$this->load->model('Login_user_model');
			$this->load->view('assets/header');
			$this->load->view('User/evsu_update_grade_of_student', $data);
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
					    location.href="/"
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
					    location.href="/"
				    </script>';
		}
	}
	public function PTPgrades()
	{
		if(isset($_SESSION['username']))
		{
		$this->load->model('Login_user_model');
		$this->load->view('assets/header');
		$this->load->view('User/evsu_PTP_page');
		$this->load->view('assets/footer');
		}
		else
		{
			echo '  <script>
					    alert("Please login first! Before you can rate");
					    location.href="/"
				    </script>';
		}
	}	
	public function supervisorPage($spv_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['spv_id'] = $spv_id;
			$_SESSION['spv_id'] = $data['spv_id'];
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_supervisor_page_cdr', $data);
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
	public function assignedStudent($spv_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['spv_id'] = $spv_id;
			$_SESSION['spv_id'] = $data['spv_id'];
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_spv_page_cdr', $data);
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
					    location.href="/"
				    </script>';
		}
		
	}
	public function student_profiles($stud_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['stud_id'] = $stud_id;
			$_SESSION['stud_id'] = $data['stud_id'];
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_student_profile_cdr', $data);
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
	public function updateAgencyPage($comp_id)
	{
		if(isset($_SESSION['username']))
		{
			$data['comp_id'] = $comp_id;
			$this->load->view('assets/header');
			$this->load->model('Login_user_model');
			$this->load->view('User/evsu_update_agency', $data);
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
	public function update_gradePercent() {
		$this->load->model('Login_user_model');
		$cdr_grade = $this->input->post('cdr_grade');
		$spv_grade = $this->input->post('spv_grade');
		$ptp_grade = $this->input->post('ptp_grade');
		$self_grade = $this->input->post('self_grade');
		$id = 1;

		$sum = array('cdr_grade' => $cdr_grade, 'spv_grade'=>$spv_grade, 'PTP_grade'=>$ptp_grade, 'self_grade'=>$self_grade );
		$grades = array_sum($sum);
	

		if ($grades > 100) {
			$this->message('message','danger' ,'Total percentage must not exceed 100%');
			redirect('/Login/gradingSystem/1');
		}elseif ($grades < 100) {
			$this->message('message','danger' ,'Total percentage must be 100%');
			redirect('/Login/gradingSystem/1');
		}
		else 
		$data = array('cdr_grade' => $cdr_grade, 'spv_grade'=>$spv_grade, 'PTP_grade'=>$ptp_grade, 'self_grade'=>$self_grade );
		$this->message('message','info' ,'Percentage Updated');
		$this->Login_user_model->update_percentage($data, $id);
		redirect('/Login/gradingSystem/1');

	}
	public function compute_percentage() {
		$cdr_grade = $this->input->post('cdr_grade');
		$spv_grade = $this->input->post('spv_grade');
		$ptp_grade = $this->input->post('ptp_grade');
		$self_grade = $this->input->post('self_grade');
		$id = 1;

		$sum = array('cdr_grade' => $cdr_grade, 'spv_grade'=>$spv_grade, 'PTP_grade'=>$ptp_grade, 'self_grade'=>$self_grade );
		$grades = array_sum($sum);

		echo $grades;

	}
	public function compute_grades_student() {
		$this->load->model('Login_user_model');
		$id = 1;
		$stud_id = $this->input->post('stud_id');
		$cdr_id = $this->input->post('cdr_id');
		$course = $this->input->post('course');
		$course_id = $this->input->post('course_id');
		$fullname = $this->input->post('fullname');

		$cdr_grade = $this->input->post('cdr_grade');
		$spv_grade = $this->input->post('spv_grade');
		$ptp_grade = $this->input->post('PTP_grade');
		$self_grade = $this->input->post('self_grade');

		$gradePercent = $this->Login_user_model->get_gradepercentage_tbl($id);
		$base = 0.01;		

		$cdr_grades = $base * $gradePercent['cdr_grade'];
	 	$spv_grades = $base * $gradePercent['spv_grade'];
	 	$PTP_grades = $base * $gradePercent['ptp_grade'];
	 	$self_grades = $base * $gradePercent['self_grade'];


	 	$cdrgrade = $cdr_grade * $cdr_grades;
	 	$spvgrade = $spv_grade * $spv_grades;
	 	$ptpgrade = $ptp_grade * $PTP_grades;
	 	$selfgrade = $self_grade * $self_grades;

		$sum = array('cdr_grade' => $cdrgrade, 'spv_grade'=>$spvgrade, 'PTP_grade'=>$ptpgrade, 'self_grade'=>$selfgrade );
		$grades = array_sum($sum);

		echo $grades;

		if (isset($grades)) {
			$data = array('stud_id'=>$stud_id,'fullname'=>$fullname,'cdr_id' => $cdr_id,'course_id' => $course_id, 'course' => $course, 'cdr_grade' => $cdr_grade,'spv_grade' => $spv_grade, 'PTPgrade'=>$ptp_grade,'selfgrade'=>$self_grade,'total_grades'=>$grades);
			$this->Login_user_model->compute_overall_grade_update1($data, $stud_id);
			$this->message('message','info' ,'Grades Added to'.' <span class="text-capitalize">'.$fullname.'</span> with a Total Grade of '.$grades.'');
			
		}
	

	}
	public function compute_grades_for_student()
	{
		$this->load->model('Login_user_model');
		$id = 1;
		$stud_id = $this->input->post('stud_id');
		$cdr_id = $this->input->post('cdr_id');
		$course = $this->input->post('course');
		$course_id = $this->input->post('course_id');
		$fullname = $this->input->post('fullname');
		$cdr_grade = $this->input->post('cdr_grade');
		$spv_grade = $this->input->post('spv_grade');
		$PTP_grade = $this->input->post('PTP_grade');
		$self_grade = $this->input->post('self_grade');	

		$gradePercent = $this->Login_user_model->get_gradepercentage_tbl($id);
		$base = 0.01;

		$check = $this->Login_user_model->checkgrades($stud_id);
		if ($check) {
			$this->message('message','danger' ,'Error occured, Trainee graded already!');	
			redirect('/Login/gradeStudent/'.$stud_id.'');

		}else	
	 	
	 	$cdr_grades = $base * $gradePercent['cdr_grade'];
	 	$spv_grades = $base * $gradePercent['spv_grade'];
	 	$PTP_grades = $base * $gradePercent['ptp_grade'];
	 	$self_grades = $base * $gradePercent['self_grade'];

	 	$cdrgrade = $cdr_grade * $cdr_grades;
	 	$spvgrade = $spv_grade * $spv_grades;
	 	$ptpgrade = $ptp_grade * $PTP_grades;
	 	$selfgrade = $self_grade * $self_grades;

		$sum = array('cdr_grade' => $cdrgrade, 'spv_grade'=>$spvgrade, 'PTP_grade'=>$ptpgrade, 'self_grade'=>$selfgrade );
		$grades = array_sum($sum);
		
		$data = array('stud_id'=>$stud_id,'fullname'=>$fullname,'cdr_id' => $cdr_id,'course_id' => $course_id, 'course' => $course, 'cdr_grade' => $cdr_grade,'spv_grade' => $spv_grade, 'PTPgrade'=>$PTP_grade,'selfgrade'=>$self_grade,'total_grades'=>$grades);
		// $data = array('grades' => $output);

		$this->Login_user_model->compute_overall_grades($data, $stud_id);
		$this->message('message','info' ,'Grades Added to'.' '.$fullname.' with a Total Grade of '.$grades.'');
		redirect('/Login/gradeStudent/'.$stud_id.'');
	}
	public function computePTP1()
	{
		$this->load->model('Login_user_model');
		// $stud_id = $this->input->post('stud_id');
		$grades = $this->input->post('grades');
		$record = $this->input->post('record');
		$graded_by = $this->input->post('graded_by');

		 

		$sum = array('grades' => $grades);

		$grades = array_sum($sum) / $record;
		
		$data = array('total' => $grades, 'graded_by'=>$graded_by);
		// $data = array('grades' => $output);

		$this->Login_user_model->compute_grades1($data, $graded_by);
		$this->message('message','info' ,'Grades Added');
		redirect('/Login/student_list');
	}
	public function compute_grades_spv()
	{
		$this->load->model('Login_user_model');
		$stud_id = $this->input->post('stud_id');
		$fullname = $this->input->post('fullname');
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
		$this->message('message','info' ,'Grades Added to '.$fullname.'');
		redirect('/Control/grades/'.$stud_id.'');
	}
	public function compute_grades_PTP()
	{
		$this->load->model('Login_user_model');
		$fullname = $this->input->post('fullname');
		$stud_id = $this->input->post('stud_id');
		$graded_by = $this->input->post('graded_by');
		$hash = md5( rand(0,1000) );
		$where = array('stud_id'=>$stud_id, 'graded_by'=>$graded_by);
		$check = $this->Login_user_model->checkgradePTP($where);
		$check2 = $this->Login_user_model->checkgradePTP2($graded_by);

		if ($check) {
			$this->message('message','danger' ,'You can only rate once to one trainee!');
			redirect('/Login/PTPgrades?studID='.$stud_id.'');
		}elseif ($check2 >= 2) {
			$this->message('message','danger' ,'You cant rate this trainee!');
			redirect('/Login/PTPgrades?studID='.$stud_id.'');
		}
		else
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
		 

		$sum = array( 'answer_1' => $answer_1, 'answer_2'=>$answer_2,'answer_3'=>$answer_3,'answer_4'=>$answer_4,'answer_5'=>$answer_5,'answer_6'=>$answer_6, 'answer_7'=>$answer_7,'answer_8'=>$answer_8,'answer_9'=>$answer_9,'answer_10'=>$answer_10 );
		$grades = array_sum($sum) / 10;

		$dataInfo = array('stud_id'=>$stud_id,'graded_by'=>$graded_by,'grades'=>$grades);
		$this->Login_user_model->computePTP12($dataInfo, $stud_id);
		
		$data = array('hash'=>$hash, 'stud_id'=>$stud_id,'graded_by'=>$graded_by, 'total_grades' => $grades,'answer_1' => $answer_1, 'answer_2'=>$answer_2,'answer_3'=>$answer_3,'answer_4'=>$answer_4,'answer_5'=>$answer_5,'answer_6'=>$answer_6, 'answer_7'=>$answer_7,'answer_8'=>$answer_8,'answer_9'=>$answer_9,'answer_10'=>$answer_10);
		// $data = array('grades' => $output);

		$this->Login_user_model->computePTP($data, $stud_id);
		$this->message('message','info' ,'Grades Added to '.'<span class="text-capitalize">'.$fullname.' With the average of '.$grades.'</span>');
		redirect('/Login/PTPgrades?studID='.$stud_id.'');
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
					    location.href="/"
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
					    location.href="/"
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
					    location.href="/"
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
					    location.href="/"
				    </script>';
		}			
	}
	public function login_user()
	{
		$this->load->model('Login_user_model');
		$this->load->model('Stud_user_model');
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
			$_SESSION['currentUser'] = $StudentInfo['username']; 
			$stud_id = $StudentInfo['stud_num'];

			$_SESSION['username'] = $user;
			$_SESSION['day_code']  = $getJournal_ID['AUTO_INCREMENT'];

			$logs = array('user' => $user, 'ip_address'=>$ip_address, 'activity' => 'Logged in');
			$this->Login_user_model->add_activity($logs);
			$this->Login_user_model->get_journal_data($stud_id);
			$this->message('message','info' ,'Successfully Login');
			redirect('/');	
			if ($verified <= 0) {
					$this->message('message','danger' ,'Error! Theres no Username that match the record!');
					redirect('/');
				}	
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
			echo json_encode($data);
			redirect('/');	
			if ($verified2 <= 0) {
					$this->message('message','danger' ,'Error! Theres no Username that match the record!');
					redirect('/');
				}	
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
			redirect('/');	
			if ($verified3 <= 0) {
					$this->message('message','danger' ,'Error! Theres no Username that match the record!');
					redirect('/');
				}
				
		}
		elseif ($verified4)
		{
			$spv_info = $this->Login_user_model->get_spv($where);
			$_SESSION['username'] = $spv_info['username'];
			$_SESSION['currentUser'] = $spv_info['username'];
			$_SESSION['fname'] = $spv_info['fname'].' '.$spv_info['lname'];
			$_SESSION['spv_id'] = $spv_info['spv_id'];
			$_SESSION['lname'] = $spv_info['lname'];
			$_SESSION['fname'] = $spv_info['fname'];
			$_SESSION['comp_id'] = $spv_info['comp_id'];
			$comp_id = $spv_info['comp_id'];
			$_SESSION['currentSpv'] = $spv_info['username'];	
			$_SESSION['username'] = $user;
			$data = $this->Login_user_model->get_spv_data($comp_id);
			$_SESSION['cname'] = $data['cname'];
			$logs = array('user' => $user, 'ip_address'=>$ip_address, 'activity' => 'Logged in');
			$this->Login_user_model->add_activity($logs);
			$this->message('message','info' ,'Succesfully Login');
			redirect('/');	
			if ($verified4 <= 0) {
					$this->message('message','danger' ,'Error! Theres no Username that match the record!');
					redirect('/');
				}	
				
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
			<span class='fa fa-exclamation-circle' area-hiden='true'></span>&nbsp;".$parag.'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.
		"</div>" );
	}
	
	public function update_cdr()
		{
			$this->load->model('Login_user_model');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$contact = $this->input->post('contact');
			$email = $this->input->post('email');
			$birthday = $this->input->post('birthday');
			$address = $this->input->post('address');
			$pass = $this->input->post('password');
			$confirm = $this->input->post('confirm');
			$cdr_id = $this->input->post('cdr_id');
			$ip_address = $this->input->ip_address();

			if ($pass != $confirm) {
				$this->message('message', 'danger', 'Password is not match!');
				redirect('/Login/update_coordinator/'.$cdr_id.'');
			}
			if (!preg_match('/[^A-Za-z0-9]+/', $pass) || strlen($pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/Login/update_coordinator/'.$cdr_id.'');
			}
			else

			$data = array('fname' => $fname, 'lname' => $lname,'email'=>$email, 'birthday'=>$birthday,'address'=>$address,'contactNum'=>$contact, 'password' => $pass);
			$this->Login_user_model->update_cdr($data, $cdr_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user, 'ip_address'=>$ip_address, 'activity' => 'Updated Coordinator'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', 'User successfully Updated');
			redirect('/Login/coordinator_lists');
		}
		public function sortBymonth()
		{
			$this->load->model('Login_user_model');
			$from = $this->input->post('from');
			$to = $this->input->post('to');
			
			$sort = $this->Login_user_model->sortBymonth($from, $to);
			$_SESSION['sort'] = $sort;
			$_SESSION['from'] = $from;
			$_SESSION['to'] = $to;
			redirect('/Login/userlogs');
		}
		public function update_admins()
		{
			$this->load->model('Login_user_model');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email_add = $this->input->post('email_add');
			$contact = $this->input->post('contact');
			$birthday = $this->input->post('birthday');
			$address = $this->input->post('address');
			$pass = $this->input->post('password');
			$confirm = $this->input->post('confirm');
			$admin_id = $this->input->post('admin_id');
			$ip_address = $this->input->ip_address();

			if ($pass != $confirm) {
				$this->message('message', 'danger', 'Password is not match!');
				redirect('/Login/update_admin/'.$admin_id.'');
			}
			if (!preg_match('/[^A-Za-z0-9]+/', $pass) || strlen($pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/Login/update_admin/'.$admin_id.'');
			}

			else
			$data = array('fname' => $fname, 'lname' => $lname, 'email_add' => $email_add, 'contactNum'=>$contact,'birthday'=>$birthday,'address'=>$address, 'password' => $pass);

			$this->Login_user_model->update_admin($data, $admin_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Updated Admin'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);

			$this->message('message', 'info', 'User successfully Updated');
			redirect('/Login/profile_page');
		}
		public function update_admin_password()
		{
			$this->load->model('Login_user_model');
			
			$pass = $this->input->post('password');
			$confirm = $this->input->post('confirmpass');
			$admin_id = $this->input->post('admin_id');


			if ($pass != $confirm) {
				$this->message('message', 'danger', 'Password is not match!');
				redirect('/Resetpassword/reset/'.$admin_id.'');
			}
			if (!preg_match('/[^A-Za-z0-9]+/', $pass) || strlen($pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/Resetpassword/reset/'.$admin_id.'');
			}
			else
			$data = array('password' => $pass);

			$this->Login_user_model->update_admin($data, $admin_id);

			$this->message('message', 'info', 'Success, You can now Login!');
			redirect('/Resetpassword/reset/'.$admin_id.'');
		}
		public function update_criteria_1()
		{
			$this->load->model('Login_user_model');
			$id = $this->input->post('id');
			$c1 = $this->input->post('c1');
			$c2 = $this->input->post('c2');
			$c3 = $this->input->post('c3');
			$c4 = $this->input->post('c4');
			$c5 = $this->input->post('c5');
			$c6 = $this->input->post('c6');
			$c7 = $this->input->post('c7');
			$c8 = $this->input->post('c8');
			$c9 = $this->input->post('c9');
			$c10 = $this->input->post('c10');
			
			$ip_address = $this->input->ip_address();

			
			$data = array('c1' => $c1, 'c2' => $c2, 'c3' => $c3, 'c4'=>$c4,'c5'=>$c5,'c6'=>$c6, 'c7' => $c7,'c8'=>$c8, 'c9'=>$c9, 'c10'=>$c10);

			$this->Login_user_model->update_criteria($data, $id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Updated Criteria by'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);

			$this->message('message', 'info', 'Criteria Successfully Updated');
			redirect('/');
		}
		public function update_spv()
		{
			$this->load->model('Login_user_model');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email = $this->input->post('email');
			$contact = $this->input->post('contact');
			$telnum = $this->input->post('telnum');
			$birthday = $this->input->post('birthday');
			$pass = $this->input->post('password');
			$confirm = $this->input->post('confirm');
			$spv_id = $this->input->post('spv_id');
			$ip_address = $this->input->ip_address();

			if ($pass != $confirm) {
				$this->message('message', 'danger', 'Password is not match!');
				redirect('/Login/update_supervisor/'.$spv_id.'');
			}
			if (!preg_match('/[^A-Za-z0-9]+/', $pass) || strlen($pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/Login/update_supervisor/'.$spv_id.'');
			}
			else

			$data = array('fname' => $fname, 'lname' => $lname,'email_address'=>$email,'contactNum'=>$contact,'telNum'=>$telnum,'birthday'=>$birthday, 'password' => $pass);
			$this->Login_user_model->update_spv($data, $spv_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Updated Supervisor'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', 'User successfully Updated');
			redirect('/Login/coordinator_profile_page');
		}
		public function updateSuccess()
		{
			$this->load->model('Login_user_model');
			$username = $this->input->post('username');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email = $this->input->post('email');
			$contact = $this->input->post('contact');
			$telnum = $this->input->post('telnum');
			$birthday = $this->input->post('birthday');
			$pass = $this->input->post('password');
			$confirm = $this->input->post('confirm');
			$spv_id = $this->input->post('spv_id');


			if ($pass != $confirm) {
				$this->message('message', 'danger', 'Password is not match!');
				redirect('/Login/supervisorSettings/');
			}
			if (!preg_match('/[^A-Za-z0-9]+/', $pass) || strlen($pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with atleast one special characters');
				redirect('/Control/register_form');
			}
			else
			$data = array('username'=>$username, 'fname' => $fname, 'lname' => $lname,'email_address'=>$email,'contactNum'=>$contact,'telNum'=>$telnum,'birthday'=>$birthday, 'password' => $pass);
			$this->Login_user_model->update_spv($data, $spv_id);
			$this->message('message', 'info', 'You are automatically logout as your profile updated! Please login again. Thanks');
			redirect('/');

			
			
		}
		public function update_student()
		{
			$this->load->model('Login_user_model');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$sex = $this->input->post('sex');
			$year = $this->input->post('year');
			$section = $this->input->post('section');
			$email = $this->input->post('email');
			$address = $this->input->post('address');
			$birthday = $this->input->post('birthday');
			$contact = $this->input->post('contact');
			$stud_id = $this->input->post('stud_id');
			$ip_address = $this->input->ip_address();

			$data = array('fname' => $fname, 'lname' => $lname, 'sex' => $sex, 'year'=>$year, 'section'=> $section,'email'=>$email,'birthday'=>$birthday,'contactNum'=>$contact,'address'=>$address);
			$this->Login_user_model->update_stud($data, $stud_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Updated Student'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', 'User successfully Updated');
			redirect('/Login/student_list');
		}
		public function update_student_grade()
		{
			$this->load->model('Login_user_model');
			$fullname = $this->input->post('fullname');
			$stud_id = $this->input->post('stud_id');
			$cdr_grade = $this->input->post('cdr_grade');
			$spv_grade = $this->input->post('spv_grade');
			$PTPgrade = $this->input->post('PTPgrade');
			$selfgrade = $this->input->post('selfgrade');
			$ip_address = $this->input->ip_address();

			$sum = array('cdr_grade' => $cdr_grade, 'spv_grade'=>$spv_grade,'PTPgrade'=>$PTPgrade,'selfgrade'=>$selfgrade );
			$grades = array_sum($sum) / 4;


			$data = array('total_grades'=>$grades,'fullname' => $fullname, 'stud_id' => $stud_id, 'cdr_grade' => $cdr_grade, 'spv_grade'=>$spv_grade, 'PTPgrade'=> $PTPgrade,'selfgrade'=>$selfgrade);
			$this->Login_user_model->update_stud_grade($data, $stud_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user, 'activity' => 'Updated Student'.' '.$fname.' '.$lname.'');
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', ''.$fullname.' '.'Grade Updated');
			redirect('/Login/student_grade_list');
		}
		public function update_student_pass()
		{
			$this->load->model('Login_user_model');
			$stud_id = $this->input->post('stud_id');
			$pass = $this->input->post('password');
			$confirm = $this->input->post('confirm');
			$ip_address = $this->input->ip_address();
			
			if ($pass != $confirm) {
				$this->message('message', 'danger', 'Password is not match!');
				redirect('/');
			}
			if (!preg_match('/[^A-Za-z0-9]+/', $pass) || strlen($pass) < 8) {
				$this->message('message', 'danger', 'Password must contain atleast 8 characters with special characters');
				redirect('/');
			}
			// elseif ($pass <= 7) {
			// 	$this->message('message', 'danger', 'Password must contain at least 8 characters!');
			// 	redirect('/');
			// }
			else

			$data = array('password'=> $pass, 'stud_num'=> $stud_id);
			$this->Login_user_model->update_stud_pass($data, $stud_id);

			$user = $_SESSION['username']; 
			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Updated Student Password'.' '.$stud_id);
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', 'User successfully Updated');
			redirect('/Login/student_profile_page');
		}
		public function updateAgency()
		{
			$this->load->model('Login_user_model');
			$comp_id = $this->input->post('comp_id');
			$cname = $this->input->post('cname');
			$agency_spv = $this->input->post('agency_spv');
			$agency_address = $this->input->post('agency_address');
			$ip_address = $this->input->ip_address();

			$data = array('cname' => $cname, 'agency_spv' => $agency_spv, 'agency_address' => $agency_address);
			$this->Login_user_model->updateAgency($data, $comp_id);

			$user = $_SESSION['username'];
			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Updated Agency Info'.' '.$fname.' '.$lname);
			$this->Login_user_model->add_activity($logs);
			$this->message('message', 'info', 'Agency Updated'.' '.$cname.'');
			redirect('/Login/agency_list');
		}
		public function add_feedback()
		{
		$this->load->model('Login_user_model');
		$fullname = $this->input->post('fullname');
		$spv_id = $this->input->post('spv_id');
		$stud_id = $this->input->post('stud_id');
		$feedback = $this->input->post('feedback');

		$data = array('stud_id' => $stud_id,'fullname'=>$fullname, 'spv_id'=>$spv_id,'feedback'=>$feedback);
		$check = $this->Login_user_model->checkfeedback($data);
		if ($check) {
			$this->message('message','danger' ,'Error! you already added feedback for this user!');	
			redirect('/');	
		}
		else
		$this->Login_user_model->insert_feedback($data, $stud_id);
		$this->message('message','info' ,'Success! Feedback Added to'.' '.$fullname.'');		
			
		redirect('/');
		}
		public function insert_attendance()
		{
		$this->load->model('Login_user_model');
		$stud_id = $this->input->post('stud_id');
		$name = $this->input->post('name');
		$date = $this->input->post('date');
		$time_in = $this->input->post('time_in');
		$time_out = $this->input->post('time_out');

		$data = array('stud_id' => $stud_id,'name'=>$name, 'date'=>$date,'time_in'=>$time_in,'time_out'=>$time_out);

		$this->Login_user_model->insert_attend($data, $stud_id);
		$this->message('message','info' ,'Success! Attendance inserted!');		
		
		redirect('/Control/attendance/'.$stud_id.'');
		}
		public function insertImage() {
			$this->load->model('Login_user_model');
			$admin_id = $this->input->post('admin_id');
			$ip_address = $this->input->ip_address();
			

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

			$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Added his/her profile image!');
			$this->Login_user_model->add_activity($logs);
			$this->message('message','info' ,'Succes, Image added');		
			redirect('/Login/profile_page');
		}
		public function insert_journal()
		{
		$this->load->model('Login_user_model');
		$stud_num = $this->input->post('stud_num');	
		$datefrom = $this->input->post('datefrom');
		$dateto = $this->input->post('dateto');
		$tasks1 = $this->input->post('tasks1');
		$tasks2 = $this->input->post('tasks2');
		$tasks3 = $this->input->post('tasks3');
		$tasks4 = $this->input->post('tasks4');
		$ip_address = $this->input->ip_address();



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


		$data = array('stud_id' => $stud_num, 'tasks1'=> $tasks1, 'tasks2' => $tasks2, 'tasks3' => $tasks3, 'tasks4' => $tasks4,'image'=>$target_file,'datefrom'=>$datefrom,'dateto'=>$dateto);
		$this->Login_user_model->insert_journal($data);
		
		
		$user = $_SESSION['username'] ;
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Write his/her daily journal');
		$this->Login_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Journal added');		
		redirect('/Login/student_profile_page');
		}
		public function insert_admin_chat()
		{
		$this->load->model('Login_user_model');;
		$chat_message = $this->input->post('chat_message');	
		$user = $_SESSION['username'] ;
		$ip_address = $this->input->ip_address();


		$data = array('message'=> $chat_message, 'username'=>$user);
		$this->Login_user_model->insert_gmessage($data);
		
		
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Write to group chat');
		$this->Login_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Journal added');		
		redirect('/Login/admin_chat_message');		
		}
		public function insert_cdr_chat()
		{
		$this->load->model('Login_user_model');;
		$chat_message = $this->input->post('chat_message');	
		$user = $_SESSION['username'] ;
		$ip_address = $this->input->ip_address();


		$data = array('message'=> $chat_message, 'username'=>$user);
		$this->Login_user_model->insert_gmessage($data);
		
		
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Write to group chat');
		$this->Login_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Journal added');		
		redirect('/Login/coordinator_chat_message');		
		}
		public function insert_spv_chat()
		{
		$this->load->model('Login_user_model');;
		$chat_message = $this->input->post('chat_message');	
		$user = $_SESSION['username'] ;
		$ip_address = $this->input->ip_address();


		$data = array('message'=> $chat_message, 'username'=>$user);
		$this->Login_user_model->insert_gmessage($data);
		
		
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Write to group chat');
		$this->Login_user_model->add_activity($logs);
		$this->message('message','info' ,'Succes, Journal added');		
		redirect('/Login/supervisor_chat_message');		
		}
		public function insert_stud_chat()
		{
		$this->load->model('Login_user_model');;
		$chat_message = $this->input->post('chat_message');	
		$user = $_SESSION['username'] ;
		$ip_address = $this->input->ip_address();


		$data = array('message'=> $chat_message, 'username'=>$user);
		$this->Login_user_model->insert_gmessage($data);
		
		
		$logs = array('user' => $user,'ip_address'=>$ip_address, 'activity' => 'Write to group chat');
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
        public function sendtoConfirm() {
        	$this->load->model('Login_user_model');
       		$fullname = $this->input->post('fullname');
       		$spv_id = $this->input->post('spv_id');
        	$to = $this->input->post('to');
        	$status = 'active';
        	$hash = $this->input->post('hash');

			$subject = "Confirmation";

			$message = '

	        Hello '.$fullname.',
	                                
			Thank you for signing up on our website	

			You must confirm your subscription to our website.

			Just click or copy the link and paste it on your browser           
	        '.base_url().'Confirm/account/'.$spv_id.'/'.$status.'/'.$hash.'
	            
	           	            
	        Thanks!
	            
	                                
	        Best regards,
	          
	        EVSU team

	                            
			';
			$headers = "From: no-reply@evsu-coe-ojt.ismartbit.net" . "\r\n" .
						"CC: no-reply@evsu-coe-ojt.ismartbit.net";

			$email = mail($to,$subject,$message,$headers);
			if( $email == true ) {
	            $this->message('message','info' ,'Message Sent Successfully!');
	         }else {
	            $this->message('message','danger' ,'Message could not be sent!');
	         }
			redirect('/Login/inactive_accounts');
        }


	
		
		
}