<?php
class ResultModel extends CI_Model
{
  private $table = 'data_siswa';

  public function get_entries()
  {
    $sql = "SELECT siswa.`nama_siswa`, hasil.* 
            FROM data_hasil_klasifikasi hasil,
            data_siswa siswa
            WHERE siswa.`id` = hasil.`id_siswa`";
    $query = $this->db
      ->select('data_siswa.nama_siswa, data_hasil_klasifikasi.*')
      ->join('data_hasil_klasifikasi', 'data_siswa.id = data_hasil_klasifikasi.id_siswa')
      ->get($this->table);
    return $query->result();
  }
  public function count_entries()
  {
    return $this->db
      ->join('data_hasil_klasifikasi', 'data_siswa.id = data_hasil_klasifikasi.id_siswa')
      ->count_all_results($this->table);
  }
}
