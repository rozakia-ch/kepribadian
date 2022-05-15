<?php
class MY_Controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load = &load_class('Loader', 'core', 'MY_');
    $this->load->initialize();
    if (!$this->AuthModel->current_user()) {
      redirect('Auth');
    }
  }
}
