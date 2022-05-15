<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('ResultModel');
  }

  public function index()
  {
    $data['user'] = $this->AuthModel->current_user();
    $data['title'] = 'Hasil';
    $data['content'] = 'result';
    $data['count_all'] = $this->ResultModel->count_entries();
    $data['result'] = $this->ResultModel->get_entries();

    // echo json_encode($data);
    // die;
    $this->load->view('layouts/layout', $data);
  }
}
