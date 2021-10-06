<?php

use Carbon\Carbon;

defined('BASEPATH') or exit('No direct script access allowed');

class Exam extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model(['exam_model', 'Student_exam_model' => 'se_model']);

		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 2)
			redirect('login');
		$this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{
		$data['user'] = array();
		$data['upcomming_exams'] = $this->exam_model->read_upcomming_exams();
		$data['past_exams'] = $this->exam_model->read_past_exams();
		$data['std_exam'] = $this->se_model->read_by_exam_by_student();
		$data['contents'] = $this->load->view("student/exam/exam_view", $data, true);
		$this->load->view("student/home/layout/main_wrapper_view", $data);
	}



	public function apply($exam_id = null)
	{
		if ($exam_id == null) {
			$this->session->set_flashdata('exception', 'Please Dont Try To Mess with URL. I know lot of things.');
			$this->index();
		} else {
			return;
		}
	}

	# used functional
	public function edit($e_id = null)
	{
		if (empty($e_id)) {
			redirect('student/exam/create');
		}
		#-------------------------------#
		$data['input']	= $this->exam_model->read_by_id($e_id);

		$data['contents'] = $this->load->view('student/exam/add_exam_form', $data, true);
		$this->load->view('student/home/layout/main_wrapper_view', $data);
	}

	# Used
	public function delete($e_id)
	{
		if ($this->exam_model->delete($e_id)) {
			$this->session->set_flashdata('message', 'Delete Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please Try Again');
		}
		redirect('student/exam/index');
	}

	public function validate_user_data()
	{
		$this->form_validation->set_rules('e_name', 'Exam Name', 'required');
		$this->form_validation->set_rules('e_reg_start', 'Regisration start date', 'required|callback_isDate');
		$this->form_validation->set_rules('e_reg_end', 'Registration end date', 'required|callback_isRegEndGreaterThan[' . $this->input->post("e_reg_start") . ']');
		$this->form_validation->set_rules('e_exam_start', 'Exam start date', 'required|callback_isDate|callback_isExamStartGreaterThanRegStart[' . $this->input->post("e_reg_end") . ']');
		$this->form_validation->set_rules('e_exam_end', 'Exam end date', 'required|callback_isExamEndGreaterThan[' . $this->input->post("e_exam_start") . ']');
	}

	public function isExamEndGreaterThan($end_date, $start_date)
	{
		try {
			$start_date = Carbon::parse($start_date);
			$end_date = Carbon::parse($end_date);
			if ($start_date->gte($end_date)) {
				$this->form_validation->set_message('isExamEndGreaterThan', 'The Examination Start and End must have some difference.');
				return false;
			}

			// if ($start_date->lte($end_date->addDays(1))) {
			// 	$this->form_validation->set_message('isExamEndGreaterThan', 'The {field} is greater then 1 days.');
			// 	return false;
			// }

			return true;
		} catch (Exception $e) {
			$this->form_validation->set_message('isExamEndGreaterThan', 'The {field} field must be a valid date');
			return false;
		}
	}

	public function isRegEndGreaterThan($end_date, $start_date)
	{
		try {
			$start_date = Carbon::parse($start_date);
			$end_date = Carbon::parse($end_date);
			// if ($start_date->addDays(5)->gt($end_date)) {
			// 	$this->form_validation->set_message('isRegEndGreaterThan', 'The Registration Start and End must have 5 days difference.');
			// 	return false;
			// }

			if ($start_date->gte($end_date)) {
				$this->form_validation->set_message('isRegEndGreaterThan', 'The Registration Start and End must have some difference.');
				return false;
			}
			return true;
		} catch (Exception $e) {
			$this->form_validation->set_message('isRegEndGreaterThan', 'The {field} field must be a valid date');
			return false;
		}
	}


	public function isExamStartGreaterThanRegStart($end_date, $start_date)
	{
		try {
			$start_date = Carbon::parse($start_date);
			$end_date = Carbon::parse($end_date);
			// if ($start_date->addDays(5)->gt($end_date)) {
			// 	$this->form_validation->set_message('isRegEndGreaterThan', 'The Registration Start and End must have 5 days difference.');
			// 	return false;
			// }

			if ($start_date->gte($end_date)) {
				$this->form_validation->set_message('isExamStartGreaterThanRegStart', 'The Examination start date must be greater then Registration end date');
				return false;
			}
			return true;
		} catch (Exception $e) {
			$this->form_validation->set_message('isExamStartGreaterThanRegStart', 'The {field} field must be a valid date');
			return false;
		}
	}
	public function isDate($date)
	{
		try {
			$resutlt = Carbon::parse($date);
			return true;
		} catch (Exception $e) {
			$this->form_validation->set_message('checkPastDate', 'The {field} field must be a valid date');
			return false;
		}
	}
}
