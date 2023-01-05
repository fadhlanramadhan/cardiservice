<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Detail_transaksi_model', 'detail_transaksi');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['title'] = 'Transaction';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_transaksi'] = $this->transaksi->getTrx();
        $data['no'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaction/data', $data);
        $this->load->view('templates/footer');
    }

    public function order()
    {
        $data['title'] = 'Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/order', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed</div>');
    }

    public function deleterole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $this->session->set_flashdata('message', 'Deleted');
        redirect('admin/role');
    }

    public function profiltoko()
    {
        $data['title'] = 'Profil Toko';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Toko_model', 'toko');

        $data['toko'] = $this->toko->lihat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profiltoko', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah()
    {
        $this->load->model('Toko_model', 'toko');

        $data = [
            'nama_toko' => $this->input->post('nama_toko'),
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'no_telepon' => $this->input->post('no_telepon'),
            'alamat' => $this->input->post('alamattoko'),
        ];

        if ($this->toko->ubah($data)) {
            $this->session->set_flashdata('success', 'Profil Toko <strong>Berhasil</strong> Diubah!');
            redirect('admin/profiltoko');
        } else {
            $this->session->set_flashdata('error', 'Profil Toko <strong>Gagal</strong> Diubah!');
            redirect('admin/profiltoko');
        }
    }

    public function payment()
    {
        $data['title'] = 'Bill Payment';
        $data['all_payment'] = $this->transaksi->getPaymentresult();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['no'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/payment', $data);
        $this->load->view('templates/footer');
    }

    public function payment_detail($no_transaksi)
    {
        $data['title'] = 'Bill Payment';
        $data['transaksi'] = $this->transaksi->lihat_no_transaksi($no_transaksi);
        $data['detail_payment'] = $this->detail_transaksi->lihat_payment($no_transaksi);
        $data['all_payment'] = $this->transaksi->lihat_payment($no_transaksi);
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/payment_detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_payment($no_transaksi)
    {
        $data = [
            'pembayaran' => $this->input->post('pembayaran'),
        ];

        $status = [
            'status' => $this->input->post('status'),
        ];

        if ($this->transaksi->ubahPayment($data, $no_transaksi) && $this->transaksi->ubah($status, $no_transaksi)) {
            $this->session->set_flashdata('success', 'Transaksi <strong>Berhasil!</strong>');
            redirect('admin/datalunas');
        } else {
            $this->session->set_flashdata('error', 'Transaksi <strong>Gagal!</strong>');
            redirect('admin/datalunas');
        }
    }

    public function datalunas()
    {
        $data['title'] = 'Data Lunas';
        $data['all_payment'] = $this->transaksi->PaymentLunas();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['no'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datalunas', $data);
        $this->load->view('templates/footer');
    }

    public function customer()
    {
        $data['title'] = 'Customer Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_customer'] = $this->user->getUser();
        $data['no'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/customer', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_customer($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('success', 'Data User <strong>Berhasil</strong> Dihapus!');
        redirect('admin/customer');
    }

    public function detail_customer($id)
    {
        $data['title'] = 'Customer Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['customer'] = $this->user->getId($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_customer', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_customer($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'role_id' => $this->input->post('role'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'password' => $this->input->post('password'),
        ];

        if ($this->user->ubah($data, $id)) {
            $this->session->set_flashdata('success', 'Data User <strong>Berhasil</strong> Diubah!');
            redirect('admin/customer');
        } else {
            $this->session->set_flashdata('error', 'Data User <strong>Gagal</strong> Diubah!');
            redirect('admin/customer');
        }
    }

    public function submission()
    {
        $data['title'] = 'Submission';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_transaksi'] = $this->transaksi->getPengajuan();
        $data['no'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/submission', $data);
        $this->load->view('templates/footer');
    }
}
