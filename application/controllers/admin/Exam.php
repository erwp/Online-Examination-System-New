<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

        $this->load->model(['exam_model']);
    }
	
	public function index()
	{
		$data['user'] = array(
			
			
		);
		$data['exams'] = $this->exam_model->read();
		$data['contents'] = $this->load->view("admin/exam/exam_view",$data,true);
	 	$this->load->view("admin/home/layout/main_wrapper_view",$data);
	}


	public function create()
	{
		$data[] = "";
		$data['contents'] = $this->load->view("admin/exam/add_exam_form",$data,true);
		$this->load->view("admin/home/layout/main_wrapper_view",$data);
	}
	public function contact_us()
	{
		$data[] = "";
		$data['contents'] = $this->load->view("contact/contact_us_view",$data,true);
		$this->load->view("home/layout/main_wrapper_view",$data);
	}
	
	

}