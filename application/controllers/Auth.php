<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/userguide3/general/urls.html
   */
  public function index()
  {
    $this->load->library('form_validation');
    $rules = $this->AuthModel->rules();
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == FALSE) {
      return $this->load->view('login_form');
    }

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if ($this->AuthModel->login($username, $password)) {
      redirect('Dashboard');
    } else {
      $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
    }
    $this->load->view('login_form');
  }
  public function logout()
  {

    $this->AuthModel->logout();
    redirect(site_url());
  }
}
