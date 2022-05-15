<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DecisionTree extends MY_Controller
{

  public function index()
  {
    $data['user'] = $this->AuthModel->current_user();
    $data['title'] = 'Pohon Keputusan';
    $data['content'] = 'decision_tree';
    $this->load->view('layouts/layout', $data);
  }
}
