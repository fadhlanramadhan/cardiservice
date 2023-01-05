<?php

class Technician_model extends CI_Model
{
    public function getOrder()
    {
        $query = "SELECT * FROM `transaksi`
                  WHERE `teknisi` = 'Proses'
                  ORDER BY `id` DESC
                  ";
        return $this->db->query($query)->result();
    }

    public function getSelesai()
    {
        $query = "SELECT * FROM `transaksi`
                  WHERE `teknisi` = 'Selesai'
                  ORDER BY `id` DESC
                  ";
        return $this->db->query($query)->result();
    }

    public function getTeknisi()
    {
        return $this->db->where('role_id', 3)->get('user')->result();
    }
}
