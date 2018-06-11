<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class course_list extends CI_Controller {


public function __construct(){
  parent::__construct();
  $this->load->library('javascript');
  $this->load->library('form_validation');
  $this->load->library('email');
  $this->load->library('session');
  $this->load->model('course_list_model');
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
		$this->load->model('course_list_model');
		$this->load->library('session');
		$data["fetch_data"] = $this->course_list_model->fetch_data();

		$this->load->view('course_list',$data);
		$this->load->view('footer');
		
	}

	public function form_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('course_title','Course Title','required');
		$this->form_validation->set_rules('course_code','Course Code','required');

		if ($this->form_validation->run()) {
			$this->load->model('course_list_model');

			$data = array(
				'course_title' => $this->input->post('course_title'),
				'course_code' => $this->input->post('course_code'),
				'semester' => $this->input->post('semester'),
				'year' => $this->input->post('year'),
				'section' => $this->input->post('section')
			);
			if ($this->input->post('insert')) {
				
				$this->course_list_model->insert_data($data);
				redirect(base_url().'index.php/course_list/inserted');
			}
		}else{
			$this->session->set_flashdata('error', 'Any Field Must Not be Empty');
			redirect(base_url().'index.php/course_list');
		}
	}

	public function inserted(){
		$this->session->set_flashdata('success', 'Course is Successfully Added');
		redirect(base_url().'index.php/course_list');
	}

	public function delete_data(){
		$course_id = $this->uri->segment(3);
		$delete_course = $this->course_list_model->delete_course($course_id);
		$delete_course_students = $this->course_list_model->delete_course_students($course_id);
		if ($delete_course_students) {
			$this->session->set_flashdata('success', 'Course is Successfully Deleted');
			redirect(base_url().'index.php/course_list');
		}
	}


}
