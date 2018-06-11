<?php
/**
* 
*/
class student_list_model extends CI_Model
{
	function fetch_student_data($course_id)
	{
		$this->db->select("*");
		$this->db->where("course_id", $course_id);
		$query = $this->db->get("student_list");
		return $query;
	}
	function fetch_course_data($course_id)
	{
		$this->db->select("*");
		$this->db->where("course_id", $course_id);
		$query = $this->db->get("tbl_course_list");
		return $query;
	}

	public function insert_data($data){
		$this->db->insert("student_list",$data);
	}
	public function check_date(){
		$this->db->select("date");
		$this->db->distinct();
		$query = $this->db->get("tbl_attendance");
		return $query;
	}
	public function insert_attend($data){
		$this->db->insert("tbl_attendance",$data);
	}
	
}
?>