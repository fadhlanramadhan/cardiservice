<?php

class Transaksi_model extends CI_Model
{
    public function get()
    {
        return $this->db->order_by('id', 'DESC')->get('transaksi')->result();
    }

    public function getTrx()
    {
        return $this->db->where('status !=', 'Pengajuan')->order_by('id', 'DESC')->get('transaksi')->result();
    }

    public function getPengajuan()
    {
        $query = "SELECT * FROM `transaksi`
                  WHERE `status` = 'Pengajuan'
                  ORDER BY `id` ASC
                  ";
        return $this->db->query($query)->result();
    }

    public function history()
    {
        $query = "SELECT * FROM `pembayaran`
                  WHERE `pembayaran` = 'Lunas'
                  ORDER BY `id` DESC
                  ";
        return $this->db->query($query)->result();
    }

    public function getService()
    {
        $query = $this->db->get_where('service');
        return $query->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('transaksi', $data);
    }

    public function bill($data)
    {
        return $this->db->insert('pembayaran', $data);
    }

    public function lihat_no_transaksi($no_transaksi)
    {
        return $this->db->get_where('transaksi', ['no_transaksi' => $no_transaksi])->row();
    }

    public function getTransaksi($no_transaksi)
    {
        return $this->db->get_where('transaksi', ['no_transaksi' => $no_transaksi])->row_array();
    }

    public function hapus($no_transaksi)
    {
        return $this->db->delete('transaksi', ['no_transaksi' => $no_transaksi]);
    }

    public function ubah($data, $no_transaksi)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['no_transaksi' => $no_transaksi]);
        $query = $this->db->update('transaksi');
        return $query;
    }

    public function getStatus()
    {
        $query = $this->db->get_where('status');
        return $query->result();
    }

    public function getPayment()
    {
        $query = "SELECT * FROM `pembayaran`
                  WHERE `pembayaran` = 'Belum Lunas'
                  ORDER BY `id` DESC
                  ";
        return $this->db->query($query)->row();
    }

    public function getPaymentresult()
    {
        $query = "SELECT * FROM `pembayaran`
                  ORDER BY `id` DESC
                  ";
        return $this->db->query($query)->result();
    }

    public function lihat_payment($no_transaksi)
    {
        return $this->db->get_where('pembayaran', ['no_transaksi' => $no_transaksi])->row();
    }

    public function PaymentLunas()
    {
        $query = "SELECT * FROM `pembayaran`
                  WHERE `pembayaran` = 'Lunas'
                  ORDER BY `id` DESC
                  ";
        return $this->db->query($query)->result();
    }

    public function detailPayment($no_transaksi)
    {
        return $this->db->get_where('pembayaran', ['no_transaksi' => $no_transaksi])->row();
    }

    public function detailPaymentresult($no_transaksi)
    {
        return $this->db->get_where('pembayaran', ['no_transaksi' => $no_transaksi])->result();
    }

    public function ubahPayment($data, $no_transaksi)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['no_transaksi' => $no_transaksi]);
        $query = $this->db->update('pembayaran');
        return $query;
    }

    public function metode($metode, $no_transaksi)
    {
        $query = $this->db->set('metode', $metode);
        $query = $this->db->where(['no_transaksi' => $no_transaksi]);
        $query = $this->db->update('pembayaran');
        return $query;
    }

    public function verifikasi($status, $no_transaksi)
    {
        $query = $this->db->set('status', $status);
        $query = $this->db->where(['no_transaksi' => $no_transaksi]);
        $query = $this->db->update('transaksi');
        return $query;
    }
}
