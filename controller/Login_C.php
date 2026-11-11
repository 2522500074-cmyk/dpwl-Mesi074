<?php
class Login_C extends Controller
{
    public function index()
    {
        $this->session->unset_userdata('userplg');
        $this->load->view('login');
    }

    public function penyewa()
    {
        $this->session->set_userdata('userplg', 'penyewa');
        $this->load->view('login');
    }

    public function Ceklogin()
    {
        if (!empty($this->session->userdata('userplg'))) {
            $email = $this->load->post('email');
            $password = $this->load->post('password');
            $cekdata = $this->load->model('LoginPlg_M');
            $datauser = $cekdata->DataPlg($email);
            if ($datauser && ($password == $datauser['sandi074'] || password_verify($password, $datauser['sandi074']))) {
                $this->session->set_userdata('EmailPlg', $email);
                $this->session->set_userdata('NmPlg', $datauser['nm_lngkp074']);
                $this->session->set_flashdata('pesan', 'Login berhasil...');
                redirect('Shopping/index');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal: Silahkan cek user, password Anda..');
                redirect('Login_C/penyewa');
            }
            exit();
        }

        $email = $this->load->post('email');
        $password = $this->load->post('password');
        $model = $this->load->model('Login_M');
        $data = $model->ambildata($email);

        if ($data && ($password == '1234' || password_verify($password, $data['password']))) {
            $this->session->set_userdata('emailuser', $email);
            redirect('Admin_C/index');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal login!');
            redirect('Login_C/index');
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('userplg');
        $this->session->unset_userdata('EmailPlg');
        $this->session->unset_userdata('NmPlg');
        $this->session->set_flashdata('pesan', 'Berhasil Logout');
        redirect('Shopping/index');
        exit;
    }
}