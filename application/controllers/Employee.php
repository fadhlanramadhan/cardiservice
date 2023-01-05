<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['title'] = 'Employee Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['employee'] = $this->user->getAdmin();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('employee/data', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Employee Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['employee'] = $this->user->getId($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('employee/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'role_id' => $this->input->post('role'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        ];

        if ($this->user->ubah($data, $id)) {
            $this->session->set_flashdata('success', 'Data User <strong>Berhasil</strong> Diubah!');
            redirect('employee/index');
        } else {
            $this->session->set_flashdata('error', 'Data User <strong>Gagal</strong> Diubah!');
            redirect('employee/index');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('success', 'Data User <strong>Berhasil</strong> Dihapus!');
        redirect('employee/index');
    }
}
