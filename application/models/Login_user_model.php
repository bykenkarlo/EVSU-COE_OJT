<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user_model extends CI_Model {

	function __construct()
	{

	}
	public function checkEmail($data) {
		$this->db->WHERE($data);
		return $this->db->GET('evsu_admin_tbl')->row_array();
	}
	public function check_login_student($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_student_tbl')->num_rows();
	}
	public function checkfeedback($data)
	{
		$this->db->where($data);
		return $this->db->get('evsu_spvfeedback_tbl')->num_rows();
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
	
	// public function get_logs_by_month()
	// {
	// 	$this->db->where('');
	// 	$this->db->where('activity_date <=', $to );
	// 	return $query = $this->db->get('evsu_userlogs_tbl')->result_array();
	// }	
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
		$this->db->WHERE(array('evsu_course_tbl.course_id' => $course_id));
		$query = $this->db->get()->result_array();
		return $query;

		// $this->db->where('course_id', $course_id);
		// return $this->db->get('evsu_official_stud_tbl')->result_array();
	}
	public function get_all_student1($course_id)
	{ 
		$this->db->order_by("lname", "ASC");
		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_spv_agency_stud_tbl ');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_cdr_spv_agency_stud_tbl.stud_id = evsu_official_stud_tbl.stud_id','right');
		$this->db->WHERE(array('evsu_official_stud_tbl.course_id' => $course_id, 'evsu_cdr_spv_agency_stud_tbl.uid' => NULL));
		$query = $this->db->get()->result_array();
		return $query;

		// $this->db->where('course_id', $course_id);
		// return $this->db->get('evsu_official_stud_tbl')->result_array();
	}
	public function get_all_student_grades($course_id)
	{ 
		$this->db->order_by("lname", "ASC");
		$this->db->SELECT('*');
		$this->db->FROM('evsu_official_stud_tbl ');
		$this->db->JOIN('evsu_overall_grades_tbl','evsu_official_stud_tbl.stud_id = evsu_overall_grades_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_overall_grades_tbl.course_id' => $course_id));
		$this->db->order_by('section', "ASC");
		$query = $this->db->get()->result_array();
		return $query;

		// $this->db->where('course_id', $course_id);
		// return $this->db->get('evsu_official_stud_tbl')->result_array();
	}
	public function get_stud_info_grades($stud_id)
	{ 
		$this->db->order_by("lname", "ASC");
		$this->db->SELECT('*');
		$this->db->FROM('evsu_official_stud_tbl ');
		$this->db->JOIN('evsu_overall_grades_tbl','evsu_official_stud_tbl.stud_id = evsu_overall_grades_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_overall_grades_tbl.stud_id' => $stud_id));
		$query = $this->db->get()->row_array();
		return $query;

		// $this->db->where('course_id', $course_id);
		// return $this->db->get('evsu_official_stud_tbl')->result_array();
	}

	public function get_all_student2($comp_id,$cdr_id)
	{ 
		$this->db->order_by("lname", "ASC");
		$this->db->SELECT('*');
		$this->db->FROM('evsu_official_stud_tbl ');
		$this->db->JOIN('evsu_course_tbl','evsu_official_stud_tbl.course_id = evsu_course_tbl.course_id','right');
		$this->db->JOIN('evsu_cdr_spv_agency_stud_tbl','evsu_official_stud_tbl.stud_id = evsu_cdr_spv_agency_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_cdr_spv_agency_stud_tbl.comp_id' => $comp_id, 'evsu_cdr_spv_agency_stud_tbl.cdr_id'=>$cdr_id));
		$query = $this->db->get()->result_array();
		return $query;

		// $this->db->where('course_id', $course_id);
		// return $this->db->get('evsu_official_stud_tbl')->result_array();
	}
	public function getStudentData($stud_id)
	{ 
		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_spv_agency_stud_tbl ');
		$this->db->JOIN('evsu_company_tbl','evsu_cdr_spv_agency_stud_tbl.comp_id = evsu_company_tbl.comp_id','j');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_cdr_spv_agency_stud_tbl.stud_id = evsu_official_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_cdr_spv_agency_stud_tbl.stud_id' => $stud_id));
		$query = $this->db->get()->row_array();
		return $query;

		// $this->db->where('course_id', $course_id);
		// return $this->db->get('evsu_official_stud_tbl')->result_array();
	}
	public function getStudentData1($stud_id)
	{ 
		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_spv_agency_stud_tbl ');
		$this->db->JOIN('evsu_company_tbl','evsu_cdr_spv_agency_stud_tbl.comp_id = evsu_company_tbl.comp_id','j');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_cdr_spv_agency_stud_tbl.stud_id = evsu_official_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_cdr_spv_agency_stud_tbl.stud_id' => $stud_id));
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
		// $this->db->SELECT('*');
		// $this->db->FROM('evsu_official_stud_tbl ');
		// $this->db->JOIN('evsu_company_tbl','evsu_official_stud_tbl.comp_id = evsu_company_tbl.comp_id','left');
		// $this->db->WHERE(array('evsu_company_tbl.comp_id' => $comp_id));
		// $query = $this->db->get()->result_array();
		// return $query;

		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_spv_agency_stud_tbl ');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_cdr_spv_agency_stud_tbl.stud_id = evsu_official_stud_tbl.stud_id', 'left');
		$this->db->JOIN('evsu_company_tbl','evsu_cdr_spv_agency_stud_tbl.comp_id = evsu_company_tbl.comp_id', 'left');	
		$this->db->where(array('evsu_cdr_spv_agency_stud_tbl.comp_id' => $comp_id ));
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function get_all_spv($cdr_id)
	{
		$this->db->ORDER_BY("lname", "ASC");
		$this->db->SELECT('*');
		$this->db->FROM('evsu_spv_tbl');
		$this->db->JOIN('evsu_company_tbl','evsu_spv_tbl.comp_id = evsu_company_tbl.comp_id','left');
		$this->db->WHERE( array('status' => 'active' , 'evsu_spv_tbl.cdr_id'=>$cdr_id));
		$query = $this->db->get()->result_array();
		return $query;
		// return $this->db->get('evsu_spv_tbl')->result_array();
	}
	public function get_all_spv_inactive() {
		$this->db->ORDER_BY("lname", "ASC");
		$this->db->SELECT('*');
		$this->db->FROM('evsu_spv_tbl');
		$this->db->JOIN('evsu_company_tbl','evsu_spv_tbl.comp_id = evsu_company_tbl.comp_id','left');
		$this->db->WHERE( array('status' => 'inactive' ));
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
	Public function get_criteria_data($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('evsu_criteria')->row_array();
	}
	Public function get_stud_data($id)
	{
		$this->db->where('stud_id', $id);
		return $this->db->get('evsu_official_stud_tbl')->row_array();
	}
	Public function get_stud_data1($students_id)
	{
		$this->db->where('stud_id', $students_id);
		return $this->db->get('evsu_official_stud_tbl')->result_array();
	}
	Public function get_stud_data2($stud_id)
	{
		$this->db->where('stud_id', $stud_id);
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
	Public function get_cdr_info12($id)
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
	Public function getcnameqwe($stud_id)
	{

		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_spv_agency_stud_tbl');
		$this->db->JOIN('evsu_company_tbl','evsu_cdr_spv_agency_stud_tbl.comp_id = evsu_company_tbl.comp_id','left');
		$this->db->where(array('evsu_cdr_spv_agency_stud_tbl.stud_id' => $stud_id ));
		$query = $this->db->get()->row_array();
		return $query;

		// $this->db->where('stud_id', $id);
		// return $this->db->get('evsu_official_stud_tbl')->row_array();
	}
	
	Public function getcnameqwe1($stud_id)
	{

		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_spv_agency_stud_tbl');
		$this->db->JOIN('evsu_company_tbl','evsu_cdr_spv_agency_stud_tbl.comp_id = evsu_company_tbl.comp_id','left');
		$this->db->where(array('evsu_cdr_spv_agency_stud_tbl.stud_id' => $stud_id ));
		$query = $this->db->get()->row_array();
		return $query;

		// $this->db->where('stud_id', $id);
		// return $this->db->get('evsu_official_stud_tbl')->row_array();
	}
	Public function get_stud_info($stud_id)
	{

		$this->db->SELECT('*');
		$this->db->FROM('evsu_official_stud_tbl ');
		$this->db->JOIN('evsu_course_tbl','evsu_official_stud_tbl.course_id = evsu_course_tbl.course_id','left');
		// $this->db->JOIN('evsu_company_tbl','evsu_official_stud_tbl.comp_id = evsu_company_tbl.comp_id', 'left');
		$this->db->JOIN('evsu_ptp_grades_tbl','evsu_official_stud_tbl.stud_id = evsu_ptp_grades_tbl.stud_id', 'left');
		$this->db->JOIN('evsu_cdr_spv_agency_stud_tbl','evsu_official_stud_tbl.stud_id = evsu_cdr_spv_agency_stud_tbl.stud_id', 'left');
		$this->db->JOIN('evsu_company_tbl','evsu_cdr_spv_agency_stud_tbl.comp_id = evsu_company_tbl.comp_id', 'left');
		$this->db->where(array('evsu_official_stud_tbl.stud_id' => $stud_id ));
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
	Public	function update_criteria($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('evsu_criteria', $data);
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
	Public	function update_stud_grade($data, $stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		$this->db->update('evsu_overall_grades_tbl', $data);
	}
	Public	function update_stud_pass($data, $stud_id)
	{
		$this->db->where('stud_num', $stud_id);
		$this->db->update('evsu_student_tbl', $data);
	}
	Public	function get_logs()
	{
		$this->db->order_by("activity_date", "desc");
		$query = $this->db->get('evsu_userlogs_tbl');
		return $query->result_array();
	}
	Public	function get_logs_by_month($from, $to)
	{	

		$this->db->select('*');
		$this->db->where('activity_date >=', $from );
		$this->db->where('activity_date <=', $to );
		return $query = $this->db->get('evsu_userlogs_tbl')->result_array();;
	}
	public function sortBymonth($from, $to)
	{
		$this->db->select('*');
		$this->db->where('activity_date >=', $from );
		$this->db->where('activity_date <=', $to );
		$this->db->order_by('activity_date', 'DESC');
		$query = $this->db->get('evsu_userlogs_tbl')->result_array();
		return $query;
		// var_dump($query);
		// exit();
	}
	Public	function get_criteria()
	{
		$this->db->order_by("id", "ASC");
		$query = $this->db->get('evsu_criteria');
		return $query->result_array();
	}
	Public function get_spv($where)
	{
		// $query = "SELECT *
		// 		  From evsu_spv_tbl
		// 		  Where username = $user
		// 		  AND password = $pass";
		// $this->db->query($query);
		// return $this->db->get('evsu_spv_tbl')->row_array();
		$this->db->where($where);
		return $this->db->get('evsu_spv_tbl')->row_array();			
	}
	public function get_spv_confirm($data) {
		$this->db->where('spv_id', $data);
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
	Public function get_cdr($user ,$pass)
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
		$this->db->WHERE(array('evsu_cdr_tbl.username'=>$user, 'evsu_cdr_tbl.password'=>$pass));
		$query = $this->db->get()->row_array();
		return $query;

	}
	Public function get_cdr_admin($cdr_id)
	{	

		$this->db->SELECT('*');
		$this->db->FROM('evsu_cdr_tbl ');
		$this->db->JOIN('evsu_course_tbl','evsu_cdr_tbl.course_id = evsu_course_tbl.course_id','left');
		$this->db->WHERE(array('evsu_cdr_tbl.username'=>$cdr_id));
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
	Public function insert_feedback($data, $stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		$this->db->insert('evsu_spvfeedback_tbl', $data);		
	
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
	Public function compute_overall_grades($data, $stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		$this->db->insert('evsu_overall_grades_tbl', $data);	
	}
	Public function compute_overall_grade_update1($data, $stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		$this->db->update('evsu_overall_grades_tbl', $data);
	}
	Public function compute_overall_grade_update($data, $stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		$this->db->update('evsu_overall_grades_tbl', $data);
	}
	Public function compute_grades1($data, $graded_by)
	{
		$this->db->where('stud_id', $graded_by);
		$this->db->insert('evsu_ptp_overall_grades_tbl', $data);	
	}
	Public function get_grades($stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		return $this->db->get('evsu_criteria_grades_tbl')->row_array();	
	}
	Public function get_gradesPTP($hash)
	{
		$this->db->where('hash', $hash);
		return $this->db->get('evsu_ptp_grades_tbl')->row_array();	
	}
	Public function checkgradePTP($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_ptp_grades_tbl')->row_array();	
	}
	Public function checkgradePTP2($graded_by)
	{
		$this->db->where('graded_by', $graded_by);
		return $this->db->get('evsu_ptp_grades_tbl')->num_rows();	
		// $this->db->SELECT('*');
		// $this->db->FROM('evsu_ptp_grades_tbl');
		// $this->db->WHERE('graded_by',$graded_by);
		// $query = $this->db->get();
		// return $query->num_rows();
	}
	Public function computePTP($data, $stud_id)
	{
		$this->db->WHERE('stud_id', $stud_id);
		$this->db->INSERT('evsu_ptp_grades_tbl', $data);	
	}
	Public function computePTP12($data, $stud_id)
	{
		$this->db->WHERE('stud_id', $stud_id);
		$this->db->INSERT('evsu_ptp_overall_grades_tbl', $data);	
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
	public function get_journal_data123($journal_id)
	{
		// $query = "SELECT * FROM evsu_journal_tbl WHERE stud_id = $stud_data ORDER BY journal_id DESC";
		// return $query->result_array();

		$this->db->order_by("journal_id", "DESC");
		$this->db->where('journal_id',$journal_id);
		return $this->db->get('evsu_journal_tbl')->row_array();
		
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
	public function get_all_section()
	{
		return $this->db->get('evsu_official_stud_tbl')->result_array();
	}
	public function get_all_course2($course_id)
	{	
		$this->db->WHERE('course_id',$course_id);
		return $this->db->get('evsu_course_tbl')->row_array();
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
	public function getPTPInfoself1($stud_id) {
		$this->db->SELECT('*');
		$this->db->FROM('evsu_ptp_grades_tbl ');
		$this->db->WHERE(array('evsu_ptp_grades_tbl.stud_id' => $stud_id,'evsu_ptp_grades_tbl.graded_by'=>$stud_id));
		$query = $this->db->get()->row_array();
		return $query;
	}
	public function getPTPInfoself($stud_id) {
		$this->db->SELECT('*');
		$this->db->FROM('evsu_ptp_grades_tbl ');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_ptp_grades_tbl.stud_id = evsu_official_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_ptp_grades_tbl.stud_id' => $stud_id,'evsu_ptp_grades_tbl.graded_by'=>$stud_id));
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function getPTPInfo($stud_id) {
		$this->db->SELECT('*');
		$this->db->FROM('evsu_ptp_grades_tbl ');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_ptp_grades_tbl.stud_id = evsu_official_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_ptp_grades_tbl.graded_by' => $stud_id));
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function getPTPInfocdr($stud_id) {
		$this->db->SELECT('*');
		$this->db->FROM('evsu_ptp_grades_tbl ');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_ptp_grades_tbl.stud_id = evsu_official_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_ptp_grades_tbl.stud_id' => $stud_id));
		$this->db->WHERE('graded_by !=', $stud_id);
		$query = $this->db->get()->result_array();
		return $query;

		// $query = $this->db->query("SELECT * 
		// 		FROM evsu_ptp_grades_tbl 
		// 		LEFT JOIN evsu_official_stud_tbl
		// 		ON 'evsu_ptp_grades_tbl.stud_id' = 'evsu_official_stud_tbl.stud_id'
		// 		WHERE 'evsu_ptp_grades_tbl.stud_id' = $stud_id");
		// 		return $query->result_array();

				  
	}
	public function getPTPInfocdr123($stud_id) {
		$this->db->SELECT('*');
		$this->db->FROM('evsu_ptp_grades_tbl ');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_ptp_grades_tbl.stud_id = evsu_official_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_ptp_grades_tbl.stud_id' => $stud_id));
		$this->db->WHERE('graded_by !=', $stud_id);
		$query = $this->db->get()->row_array();
		return $query;

		// $query = $this->db->query("SELECT * 
		// 		FROM evsu_ptp_grades_tbl 
		// 		LEFT JOIN evsu_official_stud_tbl
		// 		ON 'evsu_ptp_grades_tbl.stud_id' = 'evsu_official_stud_tbl.stud_id'
		// 		WHERE 'evsu_ptp_grades_tbl.stud_id' = $stud_id");
		// 		return $query->result_array();

				  
	}
	public function getPTPInfocdrqw($stud_id) {
		$this->db->SELECT('*');
		$this->db->FROM('evsu_ptp_grades_tbl ');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_ptp_grades_tbl.stud_id = evsu_official_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_ptp_grades_tbl.stud_id' => $stud_id));
		echo $query = $this->db->get()->num_rows();
		return $query;

				  
	}
	public function getPTPnames($graded_by) {
		$this->db->SELECT('*');
		$this->db->FROM('evsu_ptp_grades_tbl ');
		$this->db->JOIN('evsu_official_stud_tbl','evsu_ptp_grades_tbl.stud_id = evsu_official_stud_tbl.stud_id','left');
		$this->db->WHERE(array('evsu_ptp_grades_tbl.stud_id' => $graded_by));
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function getStudName($graded_by) {
		$this->db->WHERE('stud_id', $graded_by);
		return $this->db->get('evsu_official_stud_tbl')->row_array();
	}

	public function updateToconfirmed($data, $spv_id) {
		

			$this->db->where('spv_id', $spv_id);
			$this->db->update('evsu_spv_tbl', $data);
	}	
	
	public function checkspv($where) {

		$this->db->where($where);
		return $this->db->get('evsu_spv_tbl')->num_rows();;
	
	} 
	public function get_cname($comp_id)
	{	
		$this->db->where('comp_id', $comp_id);
		return $this->db->get('evsu_company_tbl')->num_rows();
	}
	public function getPTPgradesqw($stud_id) {
		$this->db->select('grades');
		$this->db->FROM('evsu_ptp_overall_grades_tbl');
		$this->db->WHERE(array('evsu_ptp_overall_grades_tbl.stud_id'=> $stud_id ));
		$query = $this->db->get()->result_array();
		
		// $query = "SELECT *,AVG(grades) FROM `evsu_ptp_overall_grades_tbl`
		// 			WHERE stud_id = '$stud_id'";
		// 			$this->db->query($query);
		// 			return $this->db->get('evsu_ptp_overall_grades_tbl');
	}
	public function getOverallGrades($stud_id) {
		$this->db->WHERE('stud_id', $stud_id);
		return $this->db->GET('evsu_overall_grades_tbl')->row_array();		
	}
	public function checkgrades($stud_id) {
		$this->db->WHERE('stud_id', $stud_id);
		return $this->db->GET('evsu_overall_grades_tbl')->num_rows();
	}
	Public function get_datasa()
	{
		$query = "SELECT id, title, start,
				  end, color
				  FROM events";
				  
		$this->db->query($query);
		return $this->db->get('events')->result_array();		
	
	}

	Public function getfeedback($stud_id) {
		$this->db->where('stud_id', $stud_id);
		return $this->db->get('evsu_spvfeedback_tbl')->row_array();
	}
	Public function get_spv1($spv_id)
	{
		$this->db->where('spv_id', $spv_id);
		return $this->db->get('evsu_spv_tbl')->row_array();			
	}
	Public function get_spv2()
	{
		$this->db->order_by("lname","ASC");
		return $this->db->get('evsu_spv_tbl')->result_array();			
	}
	Public function get_cdr_spv_agency_stud($cdr_id)
	{	

		$this->db->SELECT('*');
		$this->db->FROM('evsu_spv_tbl ');
		$this->db->JOIN('evsu_company_tbl','evsu_spv_tbl.comp_id = evsu_company_tbl .comp_id','left');
		$this->db->where(array('evsu_spv_tbl.cdr_id' => $cdr_id ));
		$query = $this->db->get()->result_array();
		return $query;	

		
	}

		// $this->db->SELECT('*');
		// $this->db->FROM('evsu_cdr_spv_agency_stud_tbl ');
		// $this->db->JOIN('evsu_cdr_tbl','evsu_cdr_spv_agency_stud_tbl.cdr_id = evsu_cdr_tbl.cdr_id','left');
		// $this->db->JOIN('evsu_company_tbl','evsu_cdr_spv_agency_stud_tbl.comp_id = evsu_company_tbl.comp_id', 'left');
		// // $this->db->JOIN('evsu_company_tbl','evsu_cdr_spv_agency_stud_tbl.stud_id = evsu_company_tbl.comp_id', 'left');
		// $this->db->where(array('evsu_cdr_spv_agency_stud_tbl.cdr_id' => $cdr_id ));
		// $query = $this->db->get()->result_array();
		// return $query;



}
