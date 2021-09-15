<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {
	public function index()
	{
		$data['user'] = array(
			'Full name' => $this->input->post('Full name'),
			'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'retype password' => $this->input->post('retype password'),
		);

		$this->load->view("register/register_view",$data);
	}
}
