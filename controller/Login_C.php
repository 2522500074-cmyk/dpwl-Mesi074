<?php
class Login_C extends Controller
{
  function index()
  {
    $this->load->view('login');
  }

  function CekLogin()
  {
    $email = $this->load->post('email');
    $password = $this->load->post('pass');
    $model = $this->load->model('Login_M');
    $data = $model->ambildata($email);
    
    if ($data && password_verify($password, $data['password'])) {
        $this->session->set_userdata('emailuser', $email);
        $this->session->set_flashdata('pesan', 'Login berhasil sebagai ' . $this->session->userdata('emailuser'));
        redirect('Admin_C/index');
    } else {
        $this->session->set_flashdata('pesan', 'Gagal: Silahkan cek email, password, atau status akun Anda...');
        redirect('Login_C/index');
    }
  }
}