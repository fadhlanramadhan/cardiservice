<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function getMenuId($id)
    {
        $query = $this->db->get_where('user_menu', ['id' => $id]);
        return $query->row_array();
    }

    public function getId($id)
    {
        $query = $this->db->get_where('user_menu', ['id' => $id]);
        return $query->row();
    }

    public function ubah($data, $id)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['id' => $id]);
        $query = $this->db->update('user_menu');
        return $query;
    }
}
