<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stud_user_model extends CI_Model {

	public function check_user($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_official_stud_tbl')->num_rows();
	}
	public function check_login_student($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_student_tbl')->num_rows();
	}
	public function check_student($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_student_tbl')->num_rows();
	}
	public function check_stud_num($reg_stud_num)
	{
		$this->db->where('stud_id', $reg_stud_num);
		return $this->db->get('evsu_official_stud_tbl')->num_rows();
	}
	public function check_stud($reg_stud_num)
	{
		$this->db->where('stud_num', $reg_stud_num);
		return $this->db->get('evsu_student_tbl')->num_rows();
	}
	public function check_official_stud($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_official_stud_tbl')->num_rows();
	}
	public function check_official_studID($reg_stud_num)
	{
		$this->db->where('stud_id',$reg_stud_num);
		return $this->db->get('evsu_official_stud_tbl')->num_rows();
	}
	public function insert_user_official_stud($data)
	{
		$this->db->insert('evsu_official_stud_tbl', $data);

	}
	public function insert_user($data)
	{
		$this->db->insert('evsu_student_tbl', $data);

	}
		public function check_admin($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_admin_tbl')->num_rows();
	}
	public function insert_admin($data)
	{
		$this->db->insert('evsu_admin_tbl', $data);
	}
	public function check_cdr($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_cdr_tbl')->num_rows();
	}
	public function insert_cdr($data)
	{
		$this->db->insert('evsu_cdr_tbl', $data);
	}
	public function check_spv($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_spv_tbl')->num_rows();
	}
	public function check_course($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_course_tbl')->num_rows();
	}
	public function check_company($where)
	{
		$this->db->where($where);
		return $this->db->get('evsu_company_tbl')->num_rows();
	}
	public function insert_course($data)
	{
		$this->db->insert('evsu_course_tbl', $data);
	}
	public function insert_company($data)
	{
		$this->db->insert('evsu_company_tbl', $data);
	}
	public function insert_spv($data)
	{
		$this->db->insert('evsu_spv_tbl', $data);
	}
	
	public function get_all_users()
	{
		return $this->db->get('evsu_admin_tbl')->result_array();
	}
	Public function delete_admin($id)
	{
		$this->db->where('admin_id', $id);
		$this->db->delete('evsu_admin_tbl');
	}
	Public function delete_log($id)
	{
		$this->db->where('log_id', $id);
		$this->db->delete('evsu_userlogs_tbl');
	}
	Public function delete_coordinator($id)
	{
		$this->db->where('cdr_id', $id);
		$this->db->delete('evsu_cdr_tbl');
	}
	Public function deleteCourse($id)
	{
		$this->db->where('course_id', $id);
		$this->db->delete('evsu_course_tbl');
	}
	Public function deleteAgency($id)
	{
		$this->db->where('comp_id', $id);
		$this->db->delete('evsu_company_tbl');
	}
	Public function delete_supervisor($id)
	{
		$this->db->where('spv_id', $id);
		$this->db->delete('evsu_spv_tbl');
	}
	Public function delete_student($id)
	{
		$this->db->where('stud_id', $id);
		$this->db->delete('evsu_official_stud_tbl');
	}
	Public function delete_student1($id)
	{
		$this->db->where('stud_id', $id);
		$this->db->delete('evsu_cdr_spv_agency_stud_tbl');
	}
	Public function delete_userlogs($id)
	{
		if (!empty($id)) {
			$this->db->where_in('log_id', $id);
			$this->db->delete('evsu_userlogs_tbl');
		}
	}
	Public function delete_cdr_list($id)
	{
		if (!empty($id)) {
			$this->db->where_in('cdr_id', $id);
			$this->db->delete('evsu_cdr_tbl');
		}
	}
	Public function delete_agency_list($id)
	{
		if (!empty($id)) {
			$this->db->where_in('comp_id', $id);
			$this->db->delete('evsu_company_tbl');
		}
	}
	Public function delete_spv_list($id)
	{
		if (!empty($id)) {
			$this->db->where_in('spv_id', $id);
			$this->db->delete('evsu_spv_tbl');
		}
	}
	Public function deleteCourseList($id)
	{
		if (!empty($id)) {
			$this->db->where_in('course_id', $id);
			$this->db->delete('evsu_course_tbl');
		}
	}
	Public function delete_stud_list($id)
	{
		if (!empty($id)) {
			$this->db->where_in('stud_id', $id);
			$this->db->delete('evsu_official_stud_tbl');
		}
	}
	Public function delete_stud_list1($id)
	{
		if (!empty($id)) {
			$this->db->where_in('stud_id', $id);
			$this->db->delete('evsu_cdr_spv_agency_stud_tbl');
		}
	}
	Public function add_activity($logs)
	{
		return $this->db->insert('evsu_userlogs_tbl', $logs);		
	}
	Public function get_admin_info($id)
	{
		$this->db->where('admin_id', $id);
		return $this->db->get('evsu_admin_tbl')->row_array();
	}
	Public function get_cdr_info($id)
	{
		$this->db->where('cdr_id', $id);
		return $this->db->get('evsu_cdr_tbl')->row_array();
	}
	Public function get_course_info($id)
	{
		$this->db->where('course_id', $id);
		return $this->db->get('evsu_course_tbl')->row_array();
	}
	Public function get_agency_info($id)
	{
		$this->db->where('comp_id', $id);
		return $this->db->get('evsu_company_tbl')->row_array();
	}
	public function getThisUser($id)
	{
		$this->db->where('stud_id', $id);
		return $this->db->get('evsu_official_stud_tbl')->row_array();
	}
	public function getThisStudent($id)
	{
		$this->db->where('stud_id', $id);
		return $this->db->get('evsu_official_stud_tbl')->row_array();
	}
	Public function get_spv_info($id)
	{
		$this->db->where('spv_id', $id);
		return $this->db->get('evsu_spv_tbl')->row_array();
	}
	public function insert_journal($data)
	{
		$this->db->insert('evsu_journal_tbl', $data);

	}
	Public function get_file_data($id)
	{
		$this->db->where('file_id', $id);
		return $this->db->get('evsu_fileupload_tbl')->row_array();
	}
	Public function delete_file($id)
	{
		$this->db->where('file_id', $id);
		$this->db->delete('evsu_fileupload_tbl');
	}
	public function checkEmail($where) {
		$this->db->WHERE($where);
		return $this->db->GET('evsu_spv_tbl')->num_rows();
	}
	public function get_OJT1($stud_id) {
		$this->db->WHERE('stud_id',$stud_id);
		return $this->db->GET('evsu_cdr_spv_agency_stud_tbl')->num_rows();
	}

}	
