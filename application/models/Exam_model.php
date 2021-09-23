<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exam_model extends CI_Model
{

	private $table = "exam_tbl";

	public function read()
	{
		return $this->db->select('*')
			->from($this->table)
			//->where('e_status', '1')
			->get()
			->result();

		// $list[''] = "Select User Role";//display('select_user_role');
		// if (!empty($result)) {
		// 	foreach ($result as $value) {
		// 		$list[$value->ur_id] = ($value->ur_name);
		// 	}
		// 	return $list;
		// } else {
		// 	return false;
		// }
	}

	public function read_as_list()
	{
		$result = $this->db->select('e_id,e_name')
			->from($this->table)
			->where('e_status', '1')
			->get()
			->result();

		$list[''] = "Select the exam"; //display('select_user_role');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->e_id] = ($value->e_name);
			}
			return $list;
		} else {
			return false;
		}
	}
	public function create($data = [])
	{
		return $this->db->insert($this->table, $data);
	}

	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('e_id', $id)
			->get()
			->row();
	}

	public function update($data = [])
	{
		return $this->db->where('e_id', $data['e_id'])
			->update($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('e_id', $id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
}
