<?php
class Penyewa_C074 extends Controller
{
    public function index()
    {
        $m = $this->load->model('m_master/Penyewa_M074');
        $dt['dtpenyewa'] = $m->datapenyewa074();
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/penyewaview074', $dt);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_penyewaview074');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $m = $this->load->model('m_master/Penyewa_M074');
        $user = $_POST['username074'];

        if ($m->cekuser074($user)) {
            echo "<script>alert('Username sudah terdaftar!'); window.history.back();</script>";
            exit;
        }

        $folder = dirname(__DIR__, 2) . '/img/';
        if(!is_dir($folder)) mkdir($folder, 0777, true);

        $ft_ktp = 'KTP_' . $user . '_' . time() . '.' . pathinfo($_FILES['ft_ktp074']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['ft_ktp074']['tmp_name'], $folder . $ft_ktp);

        $ft_sim_a = 'SIM_A_' . $user . '_' . time() . '.' . pathinfo($_FILES['ft_sim_a074']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['ft_sim_a074']['tmp_name'], $folder . $ft_sim_a);

        $data = [
            'user_plg074' => $_POST['username074'],
            'sandi074' => $_POST['password074'],
            'nik074' => $_POST['nik074'],
            'nm_lngkp074' => $_POST['nama_lengkap074'],
            'no_hp074' => $_POST['no_handphone074'],
            'almt_lngkp074' => $_POST['alamat_lengkap074'],
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a
        ];

        if ($m->simpan074($data)) {
            echo "<script>alert('Data penyewa berhasil disimpan!'); window.location.href='" . BASEURL . "/?url=c_master/Penyewa_C074/index';</script>";
        }
    }

    public function edit($user)
    {
        $m = $this->load->model('m_master/Penyewa_M074');
        $dt['p'] = $m->detail074($user);
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/edit_penyewaview074', $dt);
        $this->load->view('layout/footer');
    }

    public function ubah()
    {
        $m = $this->load->model('m_master/Penyewa_M074');
        $user_lama = $_POST['user_lama074'];
        $detail = $m->detail074($user_lama);
        $folder = dirname(__DIR__, 2) . '/img/';

        if (!empty($_FILES['ft_ktp074']['name'])) {
            @unlink($folder . $detail['ft_ktp']);
            $ft_ktp = 'KTP_' . $_POST['username074'] . '_' . time() . '.' . pathinfo($_FILES['ft_ktp074']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['ft_ktp074']['tmp_name'], $folder . $ft_ktp);
        } else {
            $ft_ktp = $detail['ft_ktp'];
        }

        if (!empty($_FILES['ft_sim_a074']['name'])) {
            @unlink($folder . $detail['ft_sim_a']);
            $ft_sim_a = 'SIM_A_' . $_POST['username074'] . '_' . time() . '.' . pathinfo($_FILES['ft_sim_a074']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['ft_sim_a074']['tmp_name'], $folder . $ft_sim_a);
        } else {
            $ft_sim_a = $detail['ft_sim_a'];
        }

        $data = [
            'user_plg074' => $_POST['username074'],
            'sandi074' => $_POST['password074'],
            'nik074' => $_POST['nik074'],
            'nm_lngkp074' => $_POST['nama_lengkap074'],
            'no_hp074' => $_POST['no_handphone074'],
            'almt_lngkp074' => $_POST['alamat_lengkap074'],
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a,
            'user_lama074' => $user_lama
        ];

        $m->ubah074($data);
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='" . BASEURL . "/?url=c_master/Penyewa_C074/index';</script>";
    }

    public function hapus($user)
    {
        $m = $this->load->model('m_master/Penyewa_M074');
        $dt = $m->detail074($user);
        @unlink(dirname(__DIR__, 2) . '/img/' . $dt['ft_ktp']);
        @unlink(dirname(__DIR__, 2) . '/img/' . $dt['ft_sim_a']);
        $m->hapus074($user);
        echo "<script>alert('Dihapus!'); window.location.href='" . BASEURL . "/?url=c_master/Penyewa_C074/index';</script>";
    }
}