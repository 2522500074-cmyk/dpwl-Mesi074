<?php
class LoginPlg_M extends Model
{
    function DataPlg($email)
    {
        $email = $this->db->real_escape_string($email);
        $hasil = $this->db->query("SELECT * FROM penyewa WHERE user_plg074='$email'");
        if (!$hasil) {
            die("Query gagal: " . $this->db->error);
        }
        return $hasil->fetch_assoc();
    }
}