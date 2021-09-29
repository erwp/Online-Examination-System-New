<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exam extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model(['exam_model']);

		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
			redirect('login');
		$this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{
		$data['user'] = array();
		$data['exams'] = $this->exam_model->read();
		$data['contents'] = $this->load->view("admin/exam/exam_view", $data, true);
		$this->load->view("admin/home/layout/main_wrapper_view", $data);
	}

	// Not used
	public function checkDateFormat($indate)
	{

		// $date_time = explode(' ',$indate);
		// if(sizeof($date_time)==2)
		// {
		//     $date = $date_time[0];
		//     $date_values = explode('-',$date);
		// 	print_r($date_values); die();              /// month , day, year [2] [1] [0]
		//     if((sizeof($date_values)!=3) || !checkdate( (int) $date_values[2], (int) $date_values[1], (int) $date_values[0]))
		//     {
		// 		$this->form_validation->set_message('checkDateFormat', 'The {field} field must be a valid date');
		// 		return FALSE;
		//     }

		// 	if((int) $date_values[1])
		//     $time = $date_time[1];
		//     $time_values = explode(':',$time);
		//     if((int) $time_values[0]>23 || (int) $time_values[1]>59 || (int) $time_values[2]>59)
		//     {
		// 		$this->form_validation->set_message('checkDateFormat', 'The {field} field must be a valid date');
		// 		return FALSE;
		//     }
		//     return TRUE;
		// }

		// $this->form_validation->set_message('checkDateFormat', 'The {field} field must be a valid date');
		// return FALSE;

		// if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
		// 	if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
		// 		return true;
		// 	else
		// 		$this->form_validation->set_message('checkDateFormat', 'The {field} field must be a valid date');
		// 		return false;
		// } else {
		// 	$this->form_validation->set_message('checkDateFormat', 'The {field} field must be a valid date');
		// 	return false;
		// }

		// $d = DateTime::createFromFormat('Y-m-d H:m:sa', $date);
		// if( $d && $d->format('Y-m-d H:m:sa') === $date){
		// 	return true;
		// } else {
		// 	$this->form_validation->set_message('checkDateFormat', 'The {field} field must be a valid date');
		// 	return false;
		// }

	}

	public function checkpastdate($date)
	{

		try {
			$date = \Carbon\Carbon::parse($date);
		} catch (InvalidFormatException $_aa) {
			$date = false;
		}

		$canBeCreated = ($date !== false);
		if (\Carbon\Carbon::createFromFormat('Y-m-d H:m A', $date,) !== false) {
			// valid date
			echo "valid";
		}

		echo $date;

		date_default_timezone_set("Asia/Calcutta");
		//$reg = new DateTime($reg_date);
		$cur = new DateTime("now");
		//echo $reg;
		print_r($cur);
		// echo $reg_date;
		// echo date('Y-m-d H:m A');

		// echo (strtotime($reg_date));
		// echo (strtotime(date('Y-m-d H:m A')));
		//if()
		die;
	}
	public function validate_user_data()
	{
		$this->form_validation->set_rules('exam_name', 'Exam Name', 'required');
		$this->form_validation->set_rules('reg_start_date', 'Regisration start date', 'required|callback_checkpastdate');
		$this->form_validation->set_rules('reg_end_date', 'Registration end date', 'required');
		$this->form_validation->set_rules('exam_start_date', 'Exam start date', 'required');
		$this->form_validation->set_rules('exam_end_date', 'Exam end date', 'required');
	}
	public function create()
	{
		var_dump($_POST);
		$data[] = "";

		$this->validate_user_data();
		$e_id = $this->input->post('e_id');

		//  -! empty($start_date) ? $start_date : date("Y-m-d", strtotime("-" . (date('d') - 1) . " day", strtotime(date('Y-m-d'))));
		// echo $today = \Carbon\Carbon::now("Asia/Kolkata");
		// echo $lastDayofMonth =    \Carbon\Carbon::parse($today)->endOfMonth()->toDateString();

		//die();
		$curDateTime = Carbon\Carbon::today("Asia/Kolkata");
		$e_reg_start = $this->input->post('e_reg_start');
		$e_reg_end = $this->input->post('e_reg_end');
		$e_exam_start = $this->input->post('e_exam_start');
		$e_exam_end = $this->input->post('e_exam_end');

		$data['input'] = (object) $postData = [
			'e_name'				=> $this->input->post('e_name'),
			'e_id' 					=> isset($e_id) ? $e_id : null,
			'e_reg_start' 	=> empty($e_reg_start) ? $curDateTime : $e_reg_start,
			'e_reg_end' 		=> empty($e_reg_end) ?	$curDateTime->copy()->addDays(15) : $e_reg_end,
			'e_exam_start'	=> empty($e_exam_start) ? $curDateTime->copy()->addDays(30) : $e_exam_start,
			'e_exam_end'		=> empty($e_exam_end) ? $curDateTime->copy()->addMinutes(30) : $e_exam_end,
			'e_doc'					=> $curDateTime,
			'e_dou'					=> empty($e_id) ? null : $curDateTime,
			'e_created_by'	=> $this->session->userdata('user_id'),
			'e_status'			=> 1 //$this->input->post('exam_end_date'),
		];


		/*-----------CHECK ID -----------*/
		if (empty($e_id)) {
			/*-----------CREATE A NEW RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->exam_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message', 'Save Successfully');
					redirect('admin/exam/index');
				} else {
					#set exception message
					$this->session->set_flashdata('exception', 'Please Try Againmmmm');
					redirect('admin/exam/create');
				}
			} else {
				#------------- Default Form Section Display ---------#
				$data['contents'] = $this->load->view("admin/exam/add_exam_form", $data, true);
				$this->load->view("admin/home/layout/main_wrapper_view", $data);
			}
		} else {
			/*-----------UPDATE A RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->exam_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', 'Update Successfully');
				} else {
					#set exception message
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
				redirect('admin/exam/edit/' . $e_id);
			} else {
				#set exception message
				$this->session->set_flashdata('exception', 'Please Try Again');
				redirect('admin/exam/edit/' . $e_id);
			}
		}
	}

	# used functional
	public function edit($e_id = null)
	{
		if (empty($e_id)) {
			redirect('admin/exam/create');
		}
		#-------------------------------#
		$data['input']	= $this->exam_model->read_by_id($e_id);

		$data['contents'] = $this->load->view('admin/exam/add_exam_form', $data, true);
		$this->load->view('admin/home/layout/main_wrapper_view', $data);
	}

	# Used
	public function delete($e_id)
	{
		if ($this->exam_model->delete($e_id)) {
			$this->session->set_flashdata('message', 'Delete Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please Try Again');
		}
		redirect('admin/exam/index');
	}
}