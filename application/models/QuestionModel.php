<?php
class QuestionModel extends CI_Model
{
  private $table = 'data_soal';

  public function get_entries()
  {
    $query = $this->db->get($this->table);
    return $query->result();
  }
  public function count_entries()
  {
    return $this->db->count_all_results($this->table);
  }
}
