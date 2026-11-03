<?php
class Penyewa_M074 extends Model
{
    function datapenyewa074()
    {
        $dtpenyewa = $this->db->prepare("SELECT user_plg074, sandi074, nik074, nm_lngkp074, no_hp074, almt_lngkp074, ft_ktp, ft_sim_a FROM penyewa");
        $dtpenyewa->execute();
        return $dtpenyewa->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cekuser074($user_plg074)
    {
        $sql = $this->db->prepare("SELECT user_plg074 FROM penyewa WHERE user_plg074 = ?");
        $sql->bind_param("s", $user_plg074);
        $sql->execute();
        return $sql->get_result()->num_rows > 0;
    }

    public function simpan074($data)
    {
        foreach($data as $k => $v){ if($v === null) $data[$k] = ''; }
        
        $sql = $this->db->prepare("INSERT INTO penyewa (user_plg074, sandi074, nik074, nm_lngkp074, no_hp074, almt_lngkp074, ft_ktp, ft_sim_a) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("ssssssss", 
            $data['user_plg074'], 
            $data['sandi074'], 
            $data['nik074'], 
            $data['nm_lngkp074'], 
            $data['no_hp074'], 
            $data['almt_lngkp074'], 
            $data['ft_ktp'], 
            $data['ft_sim_a']
        );
        if(!$sql->execute()){
            die("Error DB: " . $sql->error);
        }
        return true;
    }

    public function detail074($user_plg074)
    {
        $sql = $this->db->prepare("SELECT * FROM penyewa WHERE user_plg074 = ?");
        $sql->bind_param("s", $user_plg074);
        $sql->execute();
        return $sql->get_result()->fetch_assoc();
    }

    // INI YANG KAMU BELUM PUNYA VAN, TAMBAHIN INI
    public function ubah074($data)
    {
        foreach($data as $k => $v){ if($v === null) $data[$k] = ''; }

        $sql = $this->db->prepare("UPDATE penyewa SET user_plg074=?, sandi074=?, nik074=?, nm_lngkp074=?, no_hp074=?, almt_lngkp074=?, ft_ktp=?, ft_sim_a=? WHERE user_plg074=?");
        $sql->bind_param("sssssssss",
            $data['user_plg074'],
            $data['sandi074'],
            $data['nik074'],
            $data['nm_lngkp074'],
            $data['no_hp074'],
            $data['almt_lngkp074'],
            $data['ft_ktp'],
            $data['ft_sim_a'],
            $data['user_lama074']
        );
        if(!$sql->execute()){
            die("Error DB Update: " . $sql->error);
        }
        return true;
    }

    public function hapus074($user_plg074)
    {
        $dtpenyewa = $this->db->prepare("DELETE FROM penyewa WHERE user_plg074 = ?");
        $dtpenyewa->bind_param("s", $user_plg074);
        return $dtpenyewa->execute();
    }
}