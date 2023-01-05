<?php

class Dashboard_model extends CI_Model
{
    public function pesananMasuk()
    {
        $query = "SELECT * FROM `transaksi`
                  WHERE `teknisi` = 'Proses'
                  ORDER BY `id` DESC
                  ";
        return $this->db->query($query)->num_rows();
    }

    public function pesananSelesai()
    {
        $query = "SELECT * FROM `transaksi`
                  WHERE `teknisi` = 'Selesai'
                  ORDER BY `id` DESC
                  ";
        return $this->db->query($query)->num_rows();
    }

    public function lihat($id)
    {
        // $query = "SELECT `user_grup`.`grup`
        //           FROM `user_grup` JOIN `user`
        //           ON `user_grup`.`id` = `user`.`grup_id`
        //           WHERE `user`.`grup_id` = $id
        //           ";
        // return $this->db->query($query)->row();
        return $this->db->get_where('user_role', ['id' => $id])->row();
    }
}
