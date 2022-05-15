<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends MY_Controller
{
  public function index()
  {
    $data['user'] = $this->AuthModel->current_user();
    // Template Views
    $data['head'] = 'students/student_head';
    $data['content'] = 'students/student';
    $data['script'] = 'students/student_script';
    // print_r($data);
    // die;
    $this->load->view('layouts/layout', $data);
  }
}
