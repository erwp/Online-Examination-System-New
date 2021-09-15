<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home  extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

        //$this->load->model([]);
    }
	
	public function index()
	{
		$data['user'] = array(
			
			
		);

		//$data['contents'] = $this->load->view("home/Home_view",$data,true);
		$this->load->view("home/layout/main_wrapper_view",$data);
		

    
	}
	public function add_exam()
	{
		$data[] = "";
		$data['contents'] = $this->load->view("exam/add_exam_form",$data,true);
		$this->load->view("home/layout/main_wrapper_view",$data);
	}
	public function contact_us()
	{
		$data[] = "";
		$data['contents'] = $this->load->view("contact/contact_us_view",$data,true);
		$this->load->view("home/layout/main_wrapper_view",$data);
	}
	
	

}
