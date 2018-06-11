<?php
/**
* 
*/
class dashboard extends CI_Model
{
	function fetch_data()
	{
		$this->db->select("*");
		$this->db->from("tbl_course_list");
		$query = $this->db->get();
		return $query;
	}
}
?>