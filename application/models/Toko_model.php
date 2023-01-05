<?php

class Toko_model extends CI_Model
{
    public function lihat()
    {
        return $this->db->get_where('data_toko', ['id' => 1])->row();
    }

    public function lihat_toko()
    {
        return $this->db->get_where('data_toko', ['id' => 1])->row()->nama_toko;
    }

    public function ubah($data)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['id' => 1]);
        $query = $this->db->update('data_toko');
        return $query;
    }
}
