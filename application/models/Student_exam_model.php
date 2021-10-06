<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_exam_model extends CI_Model
{

  private $table = "student_exam_tbl";

  public function create($data = [])
  {
    return $this->db->insert($this->table, $data);
  }

  public function read_by_exam_by_student()
  {
    $result =  $this->db->select('*')
      ->from($this->table)
      ->get()
      ->result();

    $list = [];
    if (!empty($result)) {
      foreach ($result as $std_exam) {
        $list[$std_exam->se_e_id][$std_exam->se_u_id] = 1;
      }
    }
    return $list;
    // dd($list, 0);
  }

  public function read_by_id($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('q_id', $id)
      ->get()
      ->row();
  }

  public function update($data = [])
  {
    return $this->db->where('q_id', $data['q_id'])
      ->update($this->table, $data);
  }
  public function delete($id = null)
  {
    $this->db->where('q_id', $id)
      ->delete($this->table);

    if ($this->db->affected_rows()) {
      return true;
    } else {
      return false;
    }
  }
}
