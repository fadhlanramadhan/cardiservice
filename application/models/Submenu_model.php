<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu_model extends CI_Model
{

    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                  ";
        return $this->db->query($query)->result_array();
    }

    public function getId($id)
    {
        $query = $this->db->get_where('user_sub_menu', ['id' => $id]);
        return $query->row();
    }

    public function ubah($data, $id)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['id' => $id]);
        $query = $this->db->update('user_sub_menu');
        return $query;
    }
}
