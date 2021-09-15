<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam_model extends CI_Model {
	
    private $table = "Exam_tbl";

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
}