<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user_model extends CI_Model {

	function __construct()
	{

	}
	public function check_login_student($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_student_tbl')->num_rows();
	}
	public function check_login_admin($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_admin_tbl')->num_rows();
	}
	public function check_login_cdr($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_cdr_tbl')->num_rows();
	}
	public function check_login_spv($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_spv_tbl')->num_rows();
	}
	public function get_all_admin()
	{
		$this->db->order_by("lname","ASC");
		return $this->db->get('evsu_admin_tbl')->result_array();
	}	
	public function get_all_coordinator($course_id)
	{
		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_tbl ');
		$this->db->JOIN('evsu_course_tbl','evsu_cdr_tbl.course_id = evsu_course_tbl.course_id','left');
		$this->db->order_by('lname','DESC');
		$query = $this->db->get()->result_array();
		return $query;
		
		// $this->db->order_by("date_reg", "DESC");
		// return $this->db->get('evsu_cdr_tbl')->result_array();
	}
	public function get_all_student($course_id)
	{ 
		$this->db->order_by("lname", "ASC");
		$this->db->SELECT('*');
		$this->db->FROM('evsu_official_stud_tbl ');
		$this->db->JOIN('evsu_course_tbl','evsu_official_stud_tbl.course_id = evsu_course_tbl.course_id','right');
		$this->db->JOIN('evsu_company_tbl','evsu_official_stud_tbl.comp_id = evsu_company_tbl.comp_id','left');
		$this->db->WHERE(array('evsu_course_tbl.course_id' => $course_id));
		$query = $this->db->get()->result_array();
		return $query;

		// $this->db->where('course_id', $course_id);
		// return $this->db->get('evsu_official_stud_tbl')->result_array();
	}
	public function getStudentData()
	{ 
		$this->db->SELECT('*');
		$this->db->FROM('evsu_official_stud_tbl ');
		$this->db->JOIN('evsu_company_tbl','evsu_official_stud_tbl.comp_id = evsu_company_tbl.comp_id','left');
		// $this->db->WHERE(array('evsu_official_stud_tbl.stud_id' => $stud_id));
		$query = $this->db->get()->result_array();
		return $query;

		// $this->db->where('course_id', $course_id);
		// return $this->db->get('evsu_official_stud_tbl')->result_array();
	}
	public function get_all_course_adm()
	{
		$this->db->order_by("course_id","ASC");
		return $this->db->get('evsu_course_tbl')->result_array();
	}
	public function get_all_agency()
	{
		return $this->db->get('evsu_company_tbl')->result_array();
	}
	public function getCompanyData($comp_id)
	{
		$this->db->WHERE('comp_id', $comp_id);
		return $this->db->get('evsu_company_tbl')->result_array();
	}
	public function get_all_student_spv($comp_id)
	{ 
		$this->db->SELECT('*');
		$this->db->FROM('evsu_official_stud_tbl ');
		$this->db->JOIN('evsu_company_tbl','evsu_official_stud_tbl.comp_id = evsu_company_tbl.comp_id','left');
		$this->db->WHERE(array('evsu_company_tbl.comp_id' => $comp_id));
		$query = $this->db->get()->result_array();
		
		return $query;
		// $this->db->WHERE('comp_id', $comp_id);
		// return $this->db->GET('evsu_official_stud_tbl')->result_array();
	}
	public function get_all_spv()
	{
		$this->db->ORDER_BY("lname", "ASC");
		$this->db->SELECT('*');
		$this->db->FROM('evsu_spv_tbl');
		$this->db->JOIN('evsu_company_tbl','evsu_spv_tbl.comp_id = evsu_company_tbl.comp_id','left');
		$query = $this->db->get()->result_array();
		return $query;
		// return $this->db->get('evsu_spv_tbl')->result_array();
	}
	public function get_spv_data($comp_id)
	{
		$this->db->SELECT('*');
		$this->db->FROM('evsu_spv_tbl');
		$this->db->JOIN('evsu_company_tbl','evsu_spv_tbl.comp_id = evsu_company_tbl.comp_id','right');
		$this->db->WHERE(array('evsu_spv_tbl.comp_id'=>$comp_id));
		$query = $this->db->get()->row_array();
		return $query;
		// return $this->db->get('evsu_spv_tbl')->result_array();
	}
	public function getuserlogs()
	{
		$this->db->join('evsu_userlogs_tbl', 'evsu_userlogs_tbl.admin_id = evsu_admin_tbl.admin_id', 'left');
		$query = $this->db->get('evsu_userlogs_tbl','evsu_admin_tbl');
	}
	Public function getAgencyInfo($comp_id)
	{
		$this->db->where('comp_id', $comp_id);
		return $this->db->get('evsu_company_tbl')->row_array();
	}
	Public function get_admin_info($id)
	{
		$this->db->where('admin_id', $id);
		return $this->db->get('evsu_admin_tbl')->row_array();
	}
	Public function get_stud_data($id)
	{
		$this->db->where('stud_id', $id);
		return $this->db->get('evsu_official_stud_tbl')->row_array();
	}
	Public function get_cdr_info($id)
	{
		// $this->db->where('cdr_id', $id);
		// return $this->db->get('evsu_cdr_tbl')->row_array();
		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_tbl ');
		$this->db->JOIN('evsu_course_tbl','evsu_cdr_tbl.course_id = evsu_course_tbl.course_id','left');
		$this->db->where('cdr_id', $id);
		$query = $this->db->get()->row_array();
		return $query;
	}
	Public function get_spv_info($spv_id)
	{
		$this->db->SELECT('*');
		$this->db->FROM('evsu_spv_tbl ');
		$this->db->JOIN('evsu_company_tbl','evsu_spv_tbl.comp_id = evsu_company_tbl.comp_id','left');
		$this->db->where('spv_id', $spv_id);
		$query = $this->db->get()->row_array();
		return $query;
		// $this->db->where('spv_id', $spv_id);
		// return $this->db->get('evsu_spv_tbl')->row_array();
	}
	Public function get_stud_info($id)
	{

		$this->db->SELECT('*');
		$this->db->FROM('evsu_official_stud_tbl ');
		$this->db->JOIN('evsu_course_tbl','evsu_official_stud_tbl.course_id = evsu_course_tbl.course_id','left');
		$this->db->JOIN('evsu_company_tbl','evsu_official_stud_tbl.comp_id = evsu_company_tbl.comp_id', 'left');
		$this->db->where('stud_id', $id);
		$query = $this->db->get()->row_array();
		return $query;

		// $this->db->where('stud_id', $id);
		// return $this->db->get('evsu_official_stud_tbl')->row_array();
	}
	Public	function updateAgency($data, $comp_id)
	{
		$this->db->where('comp_id', $comp_id);
		$this->db->update('evsu_company_tbl', $data);
	}
	Public	function update_cdr($data, $cdr_id)
	{
		$this->db->where('cdr_id', $cdr_id);
		$this->db->update('evsu_cdr_tbl', $data);
	}
	Public	function update_admin($data, $admin_id)
	{
		$this->db->where('admin_id', $admin_id);
		$this->db->update('evsu_admin_tbl', $data);
	}
	Public	function update_spv($data, $spv_id)
	{
		$this->db->where('spv_id', $spv_id);
		$this->db->update('evsu_spv_tbl', $data);
	}
	Public	function update_stud($data, $stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		$this->db->update('evsu_official_stud_tbl', $data);
	}
	Public	function update_stud_pass($data, $stud_id)
	{
		$this->db->where('stud_num', $stud_id);
		$this->db->update('evsu_student_tbl', $data);
	}
	Public	function get_logs()
	{
		// $query = "SELECT * FROM evsu_userlogs_tbl ORDER BY activity_date ASC";
		// $data = $this->db->get('evsu_userlogs_tbl')->result_array();
		// $this->db->ORDER_B('activity_date', 'ASC');
		// return $data;
		// $this->db->query($query);
		// return $this->db->get('evsu_userlogs_tbl')->result_array();
		$this->db->order_by("log_id", "desc");
		$query = $this->db->get('evsu_userlogs_tbl');
		return $query->result_array();
	}
	Public function get_spv($user, $pass)
	{
		$query = "SELECT *
				  From evsu_spv_tbl
				  Where username='$user'
				  AND password= '$pass'";
		$this->db->query($query);
		return $this->db->get('evsu_spv_tbl')->row_array();			
	}
	public function getThisUser($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_student_tbl')->row_array();
	}
	Public function get_admin($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_admin_tbl')->row_array();
	
		// $query = "SELECT *
		// 		  From evsu_admin_tbl
		// 		  Where username='$user'
		// 		  AND password= '$pass'";
		// $this->db->query($query);
		// return $this->db->get('evsu_admin_tbl')->row_array();		
	
	}
	Public function get_cdr($user, $pass)
	{
		// $query = "SELECT *
		// 		  From evsu_cdr_tbl
		// 		  Where username='$user'
		// 		  AND password= '$pass'";
		// $this->db->query($query);
		// return $this->db->get('evsu_cdr_tbl')->row_array();		
	

		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_tbl ');
		$this->db->JOIN('evsu_course_tbl','evsu_cdr_tbl.course_id = evsu_course_tbl.course_id','left');
		$query = $this->db->get()->row_array();
		return $query;
	}
	Public function get_data()
	{
		$query = "SELECT id, title, start,
				  end, color
				  FROM events";
				  
		$this->db->query($query);
		return $this->db->get('events')->result_array();		
	
	}
	Public function insertfile($data, $cdr_id)
	{
		$this->db->where('cdr_id', $cdr_id);
		$this->db->insert('evsu_fileupload_tbl', $data);		
	
	}
	public function get_file($cdr_id)
	{
		$this->db->where('cdr_id', $cdr_id);
		return $this->db->get('evsu_fileupload_tbl')->result_array();
	}
	Public function insert_attend($data, $stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		$this->db->insert('evsu_attendance_tbl', $data);		
	
	}
	Public function add_activity($logs)
	{
		$this->db->insert('evsu_userlogs_tbl', $logs);		
	}
	Public function compute_grades($data, $stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		$this->db->insert('evsu_criteria_grades_tbl', $data);	
	}
	Public function get_grades($stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		return $this->db->get('evsu_criteria_grades_tbl')->row_array();	
	}
	Public function get_gradesPTP($studentID)
	{
		$this->db->where('stud_id', $studentID);
		return $this->db->get('evsu_PTP_grades_tbl')->row_array();	
	}
	Public function computePTP($data, $stud_id)
	{
		$this->db->WHERE('stud_id', $stud_id);
		$this->db->INSERT('evsu_PTP_grades_tbl', $data);	
	}
	public function insertImage($target_file, $admin_id)
	{	
		$query = ("INSERT INTO evsu_admin_tbl (admin_image) VALUES ('$target_file') ");
		$this->db->query($query);
		// $this->db->where('admin_id', $admin_id);
		// $this->db->insert('evsu_admin_tbl', $data);
	}
	public function insert_journal($data)
	{
		$this->db->insert('evsu_journal_tbl', $data);
	}
	public function get_journal($limit=7)
	{
		// $query = "SELECT 'A.stud_num, B.journal_post, B.journal_title, B.date_posted' FROM evsu_student_tbl A JOIN 	evsu_journal_tbl B ON A'stud_num = B.stud_id'";
		// $this->db->query($query);
		// return $this->db->get('evsu_official_stud_tbl', 'evsu_student_tbl')->result_array();	
		
		$this->db->order_by("journal_id", "desc");
		$this->db->LIMIT($limit);
		$query = $this->db->get('evsu_journal_tbl');
		return $query->result_array();
	}
	public function insert_gmessage($data)
	{
		$this->db->insert('evsu_gmessage_tbl', $data);

	}
	public function get_gmessage()
	{
		return $this->db->get('evsu_gmessage_tbl')->result_array();
	}

	public function get_journal_data($stud_id)
	{
		// $query = "SELECT * FROM evsu_journal_tbl WHERE stud_id = $stud_data ORDER BY journal_id DESC";
		// return $query->result_array();

		$this->db->order_by("journal_id", "DESC");
		$this->db->where('stud_id',$stud_id);
		return $this->db->get('evsu_journal_tbl')->result_array();
		
	}
	public function get_attendance($stud_id)
	{

		$this->db->order_by("attend_id", "DESC");
		$this->db->where('stud_id',$stud_id);
		return $this->db->get('evsu_attendance_tbl')->result_array();	
	}
	public function get_attendance_count()
	{	
		return $this->db->get('evsu_attendance_tbl')->result_array();	
	}
	public function get_all_course()
	{
		return $this->db->get('evsu_course_tbl')->result_array();
	}
	public function get_all_cname()
	{
		return $this->db->get('evsu_company_tbl')->result_array();
	}
	public function get_all_course_by_course($course)
	{
		$this->db->where('course',$course);
		return $this->db->get('evsu_course_tbl')->row_array();
	}
	public function getJournal_ID()
	{
		$query =  $this->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_NAME = 'evsu_journal_tbl' ");
		return $query->row_array();
	}
	public function getPTPInfo($stud_id) {
		$this->db->SELECT('*');
		$this->db->FROM('evsu_ptp_grades_tbl ');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_ptp_grades_tbl.stud_id = evsu_official_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_official_stud_tbl.stud_id' => $stud_id));
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function getStudName($graded_by) {
		$this->db->WHERE('stud_id', $graded_by);
		return $this->db->get('evsu_official_stud_tbl')->row_array();
	}










}
