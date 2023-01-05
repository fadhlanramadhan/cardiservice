<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Detail_transaksi_model', 'detail_transaksi');
        $this->load->model('Technician_model', 'technician');
        $this->load->model('User_model', 'user');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Transaksi';
        $data['all_service'] = $this->transaksi->getService();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaction/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        $data['title'] = 'Tambah Transaksi';
        $data['all_service'] = $this->transaksi->getService();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('telpon', 'Telpon', 'required|trim');
        $this->form_validation->set_rules('device', 'Device', 'required|trim');
        $this->form_validation->set_rules('service', 'Service', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaction/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_transaksi' => $this->input->post('no_transaksi'),
                'tgl_terima' => $this->input->post('tgl_terima'),
                'waktu' => $this->input->post('waktu'),
                'nama' => $this->input->post('nama'),
                'telpon' => $this->input->post('telpon'),
                'device' => $this->input->post('device'),
                'service' => $this->input->post('service'),
                'deskripsi' => $this->input->post('deskripsi'),
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status'),
            ];
            if ($this->transaksi->tambah($data)) {
                $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
                redirect('admin/index');
            } else {
                $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
                redirect('admin/index');
            }
        }
    }


    public function detail($no_transaksi)
    {
        $data['title'] = 'Transaction';
        $data['transaksi'] = $this->transaksi->lihat_no_transaksi($no_transaksi);
        $data['all_detail_transaksi'] = $this->detail_transaksi->lihat_no_transaksi($no_transaksi);
        $data['status'] = $this->transaksi->getStatus();
        $data['all_teknisi'] = $this->technician->getTeknisi();
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaction/detail', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah($no_transaksi)
    {
        $data['title'] = 'Transaction';
        $data['transaksi'] = $this->transaksi->lihat_no_transaksi($no_transaksi);
        $data['all_detail_transaksi'] = $this->detail_transaksi->lihat_no_transaksi($no_transaksi);
        $data['status'] = $this->transaksi->getStatus();
        $data['all_teknisi'] = $this->technician->getTeknisi();
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_teknisi', 'Nama Teknisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaction/detail', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'status' => $this->input->post('status'),
                'nama_teknisi' => $this->input->post('nama_teknisi'),
                'teknisi' => $this->input->post('teknisi')
            ];

            if ($this->transaksi->ubah($data, $no_transaksi)) {
                $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diproses!');
                redirect('admin/index');
            } else {
                $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diproses!');
                redirect('admin/index');
            }
        }
    }

    public function payment($no_transaksi)
    {
        $data['title'] = 'Transaction';
        $data['transaksi'] = $this->transaksi->lihat_no_transaksi($no_transaksi);
        $data['all_service'] = $this->transaksi->getService();
        $data['status'] = $this->transaksi->getStatus();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaction/payment', $data);
        $this->load->view('templates/footer');
    }

    public function proses_payment($no_transaksi)
    {
        $data['title'] = 'Transaction';
        $data['transaksi'] = $this->transaksi->lihat_no_transaksi($no_transaksi);
        $data['all_service'] = $this->transaksi->getService();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaction/payment', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_transaksi' => $this->input->post('no_transaksi'),
                'tgl_terima' => $this->input->post('tgl_terima'),
                'waktu' => $this->input->post('waktu'),
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'telpon' => $this->input->post('telpon'),
                'device' => $this->input->post('device'),
                'service' => $this->input->post('service'),
                'deskripsi' => $this->input->post('deskripsi'),
                'alamat' => $this->input->post('alamat'),
                'harga' => $this->input->post('harga'),
                'pembayaran' => $this->input->post('pembayaran'),
            ];

            $status = [
                'status' => $this->input->post('status'),
            ];
            if ($this->transaksi->bill($data) && $this->transaksi->ubah($status, $no_transaksi)) {
                $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong>');
                redirect('admin/payment');
            } else {
                $this->session->set_flashdata('error', 'Data <strong>Gagal</strong>');
                redirect('admin/payment');
            }
        }
    }


    public function hapus($no_transaksi)
    {
        if ($this->transaksi->hapus($no_transaksi) && $this->detail_transaksi->hapus($no_transaksi)) {
            $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Dihapus!');
            redirect('admin/index');
        } else {
            $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Dihapus!');
            redirect('admin/index');
        }
    }

    public function dibatalkan($no_transaksi)
    {
        $data = [
            'status' => 'Dibatalkan'
        ];
        if ($this->transaksi->ubah($data, $no_transaksi)) {
            $this->session->set_flashdata('success', 'Transaksi <strong>Dibatalkan!</strong>');
            redirect('admin/index');
        } else {
            $this->session->set_flashdata('error', 'Data <strong>Gagal</strong>');
            redirect('admin/index');
        }
    }
}
