<?php

class Studentmodel extends CI_Model
{
  public $id_user;
  public $nama_siswa;
  public $jenis_kelamin;
  public $usia;
  public $sekolah;

  //nama tabel dari database
  private $table = 'data_siswa';
  //field yang ada di table user
  var $column_order = array(null, 'nama_siswa', 'jenis_kelamin', 'usia', 'sekolah', 'username');
  //field yang diizin untuk pencarian 
  var $column_search = array('nama_siswa', 'jenis_kelamin', 'usia', 'sekolah', 'username');
  // default order 
  var $order = array('id' => 'asc');

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function get_one($id)
  {
    return $this->db
      ->select('data_siswa.*, users.username')
      ->join('users', 'users.id = data_siswa.id_user')
      ->where('data_siswa.id', $id)
      ->get($this->table)
      ->row();
  }
  public function insert_entry()
  {
    $this->nama_siswa     = $_POST['name'];
    $this->jenis_kelamin  = $_POST['gender'];
    $this->usia           = $_POST['age'];
    $this->sekolah        = $_POST['school'];
    $this->db->trans_start();
    $this->db->insert('users', [
      'name' => $_POST['name'],
      'username' => $_POST['username'],
      'password' => password_hash(12345678, PASSWORD_DEFAULT),
      'level' => 2,
    ]);
    $this->id_user =  $this->db->insert_id();
    $this->db->insert($this->table, $this);
    $this->db->trans_complete();
  }

  public function update_entry()
  {
    $this->nama_siswa     = $_POST['name'];
    $this->jenis_kelamin  = $_POST['gender'];
    $this->usia           = $_POST['age'];
    $this->sekolah        = $_POST['school'];
    $this->id_user        = $_POST['id_user'];
    $this->db->trans_start();
    $this->db->update('users', [
      'name' => $_POST['name'],
      'username' => $_POST['username']
    ], array('id' => $_POST['id_user']));

    $this->db->update($this->table, $this, array('id' => $_POST['id']));
    $this->db->trans_complete();
  }
  public function delete_entry()
  {
    $this->db->trans_start();
    $this->db->delete($this->table, array('id' => $_GET['id']));
    $this->db->delete('users', array('id' => $_GET['id_user']));
    $this->db->trans_complete();
  }
  // Datatable
  private function _get_datatables_query()
  {
    $this->db
      ->select('data_siswa.*, users.username')
      ->from($this->table)
      ->join('users', 'users.id = data_siswa.id_user');
    $i = 0;
    // looping awal
    foreach ($this->column_search as $item) {
      // jika datatable mengirimkan pencarian dengan metode POST
      if ($_POST['search']['value']) {
        // looping awal
        if ($i === 0) {
          $this->db->group_start();
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search) - 1 == $i)
          $this->db->group_end();
      }
      $i++;
    }

    if (isset($_POST['order'])) {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }
}
