<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('StudentModel');
  }
  public function index()
  {
    $data['user'] = $this->AuthModel->current_user();
    $data['title'] = 'Data Siswa';
    $data['head'] = '_partials/datatable_style';
    $data['content'] = 'students/student';
    $data['script'] = 'students/student_script';
    $this->load->view('layouts/layout', $data);
  }
  public function data()
  {
    $list = $this->StudentModel->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
      $btnEdit = '<a href="' . base_url() . 'Student/edit?id=' . $field->id . '" class="btn btn-warning btn-sm mr-2"><i class="fa fa-edit"></i></a>';
      $btnDelete = '<a href="' . base_url() . 'Student/destroy?id=' . $field->id . '&id_user=' . $field->id_user . '" class="btn btn-danger btn-sm mr-2"><i class="fa fa-trash"></i></a>';
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $field->username;
      $row[] = $field->nama_siswa;
      $row[] = $field->jenis_kelamin;
      $row[] = $field->usia;
      $row[] = $field->sekolah;
      $row[] = $btnDelete . $btnEdit;
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->StudentModel->count_all(),
      "recordsFiltered" => $this->StudentModel->count_filtered(),
      "data" => $data,
    );
    //output dalam format JSON
    echo json_encode($output);
  }
  public function add()
  {
    if ($this->input->post()) {
      $this->StudentModel->insert_entry();
      redirect('student');
    }
    $data['user'] = $this->AuthModel->current_user();
    $data['title'] = 'Data Siswa';
    $data['content'] = 'students/student_form';
    $this->load->view('layouts/layout', $data);
  }
  public function edit()
  {
    if ($this->input->post()) {
      $this->StudentModel->update_entry();
      redirect('student');
    }
    $data['user'] = $this->AuthModel->current_user();
    $data['student'] = $this->StudentModel->get_one($_GET['id']);
    $data['title'] = 'Data Siswa';
    $data['content'] = 'students/student_form';
    $this->load->view('layouts/layout', $data);
  }
  public function destroy()
  {
    $this->StudentModel->delete_entry();
    redirect('student');
  }
}
