<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student_list extends CI_Controller {


	public function __construct(){
	  parent::__construct();
	  $this->load->library('javascript');
	  // $this->load->library('form_validation');
	  $this->load->library('email');
	  $this->load->library('session');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('student_list');
		$this->load->view('footer');
	}
	public function view_data(){
		$course_id = $this->uri->segment(3);
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->model('student_list_model');
		$data["fetch_student_data"] = $this->student_list_model->fetch_student_data($course_id);
		$data["fetch_course_data"] = $this->student_list_model->fetch_course_data($course_id);
		$this->load->view('student_list',$data);
		$this->load->view('footer');
	}
	public function form_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('student_name','Student Name','required');
		$this->form_validation->set_rules('student_id','Student Id','required');
		$this->form_validation->set_rules('student_mobile','Student Mobile','required');
		$this->form_validation->set_rules('student_email','Student Email','required');
		$course_id = $this->input->post('course_id');
		if ($this->form_validation->run()) {
			// $course_id = $this->uri->segment(3);
			$this->load->model('student_list_model');
			// $course_data["fetch_course_data"] = $this->student_list_model->fetch_student_data($course_id);
			$data = array(
				'student_name' => $this->input->post('student_name'),
				'student_id' => $this->input->post('student_id'),
				'student_mobile' => $this->input->post('student_mobile'),
				'student_email' => $this->input->post('student_email'),
				'course_id'=>$course_id
			);
			if ($this->input->post('insert')) {
				
				$this->student_list_model->insert_data($data);
				$this->session->set_flashdata('success', 'Student is Successfully Added');
				redirect(base_url().'index.php/student_list/view_data/'.$course_id);
			}
		}else{
			
			$this->session->set_flashdata('error', 'Any Field Must Not be Empty');
			redirect(base_url().'index.php/student_list/view_data/'.$course_id);
		}
	}

	public function insert_attendance(){
		$course_id = $this->input->post('course_id');
		$stu_track_id = $this->input->post('stu_track_id');
		$this->load->model('student_list_model');
		$selected_date = $this->input->post('selected_date');
		$cng_format_date = date("y-m-d", strtotime($selected_date));
		$attend = $this->input->post('attend');

		
		// echo "<pre>";
		// var_dump($stu_track_id);
		// echo "</pre>";
		$data["check_date"] = $this->student_list_model->check_date();
		// echo "<pre>";
		// var_dump($data["check_date"]->result());
		// echo "</pre>";
		if ($data["check_date"]->num_rows()>0) {
			foreach ($data["check_date"]->result() as $value) {
				$db_date = $value->date;
				if ($selected_date == $db_date) {
					$this->session->set_flashdata('error', 'Attendance of This Date had already been taken');
					redirect(base_url().'index.php/student_list/view_data/'.$course_id);
				}else{
				foreach ($attend as $stu_key => $atn_value) {
						$data = array(
								'stu_track_id' => $stu_track_id[$stu_key],
								'attendance' => $attend[$stu_key],
								'date' => $cng_format_date
						);
						$this->student_list_model->insert_attend($data);

					}
			
					redirect(base_url().'index.php/student_list/view_data/'.$course_id);
				}
			}
		}else{
			foreach ($attend as $stu_key => $atn_value) {
				$data = array(
						'stu_track_id' => $stu_track_id[$stu_key],
						'attendance' => $attend[$stu_key],
						'date' => $cng_format_date
				);
				$this->student_list_model->insert_attend($data);

			}
			
			redirect(base_url().'index.php/student_list/view_data/'.$course_id);
		}
		
	}

	// public function inserted(){
	// 	$this->session->set_flashdata('success', 'Course is Successfully Added');
	// 	redirect(base_url().'index.php/course_list');
	// }
}
