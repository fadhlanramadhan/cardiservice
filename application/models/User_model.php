<?php

class User_model extends CI_Model
{
    public function getAdmin()
    {
        $query = $this->db->get_where('user', ['role_id !=' => '2']);
        return $query->result_array();
    }

    public function getUser()
    {
        $query = $this->db->get_where('user', ['role_id =' => '2']);
        return $query->result();
    }

    public function getId($id)
    {
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row();
    }

    public function ubah($data, $id)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['id' => $id]);
        $query = $this->db->update('user');
        return $query;
    }

    public function lihat_nama_service($nama_service)
    {
        $query = $this->db->select('*');
        $query = $this->db->where(['nama_service' => $nama_service]);
        $query = $this->db->get('service');
        return $query->row();
    }
}
