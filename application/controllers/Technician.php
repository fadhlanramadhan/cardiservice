<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Technician extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Technician_model', 'technician');
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Detail_transaksi_model', 'detail_transaksi');
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->model('Toko_model', 'toko');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan_masuk'] = $this->dashboard->pesananMasuk();
        $data['pesanan_selesai'] = $this->dashboard->pesananSelesai();
        $data['toko'] = $this->toko->lihat();
        $id = $this->session->userdata['role_id'];
        $data['role'] = $this->dashboard->lihat($id);
        $data['no'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('technician/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function order()
    {
        $data['title'] = 'Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_order'] = $this->technician->getOrder();
        $data['no'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('technician/order', $data);
        $this->load->view('templates/footer');
    }

    public function detail($no_transaksi)
    {
        $data['title'] = 'Order';
        $data['transaksi'] = $this->transaksi->lihat_no_transaksi($no_transaksi);
        $data['all_detail_transaksi'] = $this->detail_transaksi->lihat_no_transaksi($no_transaksi);
        $data['status'] = $this->transaksi->getStatus();
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('technician/detail', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah($no_transaksi)
    {
        $data = [
            'teknisi' => $this->input->post('teknisi'),
        ];

        if ($this->transaksi->ubah($data, $no_transaksi)) {
            $this->session->set_flashdata('success', 'Servis telah <strong>selesai!</strong>');
            redirect('technician/index');
        } else {
            $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diubah!');
            redirect('technician/index');
        }
    }

    public function pesanan_selesai()
    {
        $data['title'] = 'Pesanan Selesai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_order'] = $this->technician->getSelesai();
        $data['no'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('technician/pesanan_selesai', $data);
        $this->load->view('templates/footer');
    }

    public function detail_selesai($no_transaksi)
    {
        $data['title'] = 'Pesanan Selesai';
        $data['transaksi'] = $this->transaksi->lihat_no_transaksi($no_transaksi);
        $data['all_detail_transaksi'] = $this->detail_transaksi->lihat_no_transaksi($no_transaksi);
        $data['status'] = $this->transaksi->getStatus();
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('technician/detail_selesai', $data);
        $this->load->view('templates/footer');
    }
}
