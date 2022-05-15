<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mining extends MY_Controller
{

  public function index()
  {
    $data['user'] = $this->AuthModel->current_user();
    $data['title'] = 'Mining';
    $data['content'] = 'mining';
    $this->load->view('layouts/layout', $data);
  }
}
