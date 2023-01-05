<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $this->load->model('Submenu_model', 'submenu');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->submenu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('success', 'Submenu added');
            redirect('submenu');
        }
    }

    public function deletesubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

        $this->session->set_flashdata('hapus', 'Deleted');
        redirect('submenu');
    }

    public function ubah($id)
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->submenu->getId($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('submenu/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah($id)
    {
        $this->form_validation->set_rules('submenu', 'Sub Menu', 'required|trim', [
            'required' => 'Sub Menu harus diisi!'
        ]);
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
            'required' => 'Menu harus dipilih!'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required|trim', [
            'required' => 'Url harus diisi!'
        ]);
        $this->form_validation->set_rules('ikon', 'Ikon', 'required|trim', [
            'required' => 'Ikon harus diisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Submenu';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data['submenu'] = $this->submenu->getId($id);
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('submenu'),
                'menu_id' => $this->input->post('menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('ikon'),
                'is_active' => $this->input->post('aktif')
            ];

            if ($this->submenu->ubah($data, $id)) {
                $this->session->set_flashdata('success', 'Data Menu <strong>Berhasil</strong> Diubah!');
                redirect('submenu');
            } else {
                $this->session->set_flashdata('error', 'Data Menu <strong>Gagal</strong> Diubah!');
                redirect('submenu');
            }
        }
    }
}
