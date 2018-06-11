<?php
/**
* 
*/
class course_list_model extends CI_Model
{
	function fetch_data()
	{
		$this->db->select("*");
		$this->db->from("tbl_course_list");
		$query = $this->db->get();
		return $query;
	}
	public function insert_data($data){
		$this->db->insert("tbl_course_list",$data);
	}
	public function delete_course($id){
		$this->db->where('course_id', $id);
		$this->db->delete('tbl_course_list');
	}
	public function delete_course_students($id){
		$this->db->where('course_id', $id);
		return $this->db->delete('student_list');
	}
}
?>