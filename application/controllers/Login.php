<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'login_model',
			'user_model'
		));
	}

	public function index()
	{
		//$this->session->sess_destroy();
		if ($this->session->userdata('isLogIn'))
			$this->redirectTo($this->session->userdata('user_role'));

		$this->form_validation->set_rules('email', 'email', 'required|max_length[50]|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|max_length[32]|md5');
		$this->form_validation->set_rules('user_role', 'user_role', 'required');

		$data['user'] /* = (object)$postData */ = [
			'u_email'   => $this->input->post('email', true),
			'u_pass'  	=> md5($this->input->post('password', true)),
			'u_role' 	=> $this->input->post('user_role', true),
		];
		$data['user_role_list'] = $this->user_model->get_user_role();

		if ($this->form_validation->run() === true) {
			$check_user = $this->login_model->check_user($data['user']);
			//print_r($check_user->row());
			if ($check_user->num_rows() === 1) {
				$this->session->set_userdata([
					'isLogIn'       => true,
					'user_id'       => $check_user->row()->u_id,
					'email'         => $check_user->row()->u_email,
					'fullname'      => $check_user->row()->u_name,
					'user_role'     => $check_user->row()->u_user_role,
					'picture'       => !empty($check_user->row()->u_picture) ? $check_user->row()->u_picture : 'assetslte/images/noimage.png',
					'create_date'     => $check_user->row()->u_doc,
				]);
				$this->redirectTo($data['user']['u_role']);

				redirect('login');
			} else {
				$this->session->set_flashdata('exception', "incorrect_email_password");
				redirect('login');
			}
		} else {

			$this->load->view("login/login_view", $data);
		}
	}

	public function redirectTo($user_role = null)
	{

		//$this->save_login_time();
		switch ($user_role) {
			case 1:
				redirect('admin/institution/index');    // Admin
				break;

			case 2:
				redirect('student/home/index');     // Student
				break;

			case 3:
				redirect('teacher/home/index');     // Teacher
				break;
			default:
				$this->logout();
				//redirect('login');
				break;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
