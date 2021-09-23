<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	private $user_role_tbl = "user_role_tbl";

	public function get_user_role()
	{
		$result = $this->db->select('ur_id,ur_name')
			->from($this->user_role_tbl)
			->where('ur_status', '1')
			->get()
			->result();

		$list[''] = "Select User Role"; //display('select_user_role');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->ur_id] = ($value->ur_name);
			}
			return $list;
		} else {
			return false;
		}
	}
}
