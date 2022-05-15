<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Question extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('QuestionModel');
  }

  public function index()
  {
    $data['user'] = $this->AuthModel->current_user();
    $data['title'] = 'Data Soal';
    $data['content'] = 'question';
    $data['count_all'] = $this->QuestionModel->count_entries();
    $data['questions'] = $this->QuestionModel->get_entries();

    // echo json_encode($data);
    // die;
    $this->load->view('layouts/layout', $data);
  }
}
