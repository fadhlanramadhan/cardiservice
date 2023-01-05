<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->db->insert('user_menu', ['menu' => $this->input->post('menu')])) {
                $this->session->set_flashdata('success', 'Data Menu <strong>Berhasil</strong> Ditambah!');
                redirect('menu');
            } else {
                $this->session->set_flashdata('error', 'Data Menu <strong>Gagal</strong> Ditambah!');
                redirect('menu');
            }
        }
    }


    public function deletemenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        $this->session->set_flashdata('hapus', 'Deleted');
        redirect('menu');
    }

    public function ubah($id)
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->menu->getId($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah($id)
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
            'required' => 'Menu harus diisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Menu Management';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->menu->getId($id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'menu' => $this->input->post('menu')
            ];

            if ($this->menu->ubah($data, $id)) {
                $this->session->set_flashdata('success', 'Data Menu <strong>Berhasil</strong> Diubah!');
                redirect('menu');
            } else {
                $this->session->set_flashdata('error', 'Data Menu <strong>Gagal</strong> Diubah!');
                redirect('menu');
            }
        }
    }
}
