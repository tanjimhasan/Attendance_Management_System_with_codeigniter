<?php
/**
* 
*/
class attend_model extends CI_Model
{
	function fetch_course_data($course_id)
	{
		$this->db->select("*");
		$this->db->where("course_id", $course_id);
		$query = $this->db->get("tbl_course_list");
		return $query;
	}
	function fetch_student_data($course_id)
	{
		$this->db->select("*");
		$this->db->where("course_id", $course_id);
		$query = $this->db->get("student_list");
		return $query;
	}
	function fetch_attend_data($stu_track_id)
	{
		$this->db->select("*");
		$this->db->where("stu_track_id", $stu_track_id);
		$query = $this->db->get("tbl_attendance");
		return $query;
	}
	public function insert_data($data){
		$this->db->insert("tbl_course_list",$data);
	}
}
?>