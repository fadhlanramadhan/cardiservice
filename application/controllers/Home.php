<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('home/header', $data);
        $this->load->view('home/index');
        $this->load->view('home/footer');
    }
    public function aboutus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('home/header', $data);
        $this->load->view('home/about-us');
        $this->load->view('home/footer');
    }
    public function contactus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('home/header', $data);
        $this->load->view('home/contact-us');
        $this->load->view('home/footer');
    }
    public function pricing()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('home/header', $data);
        $this->load->view('home/pricing');
        $this->load->view('home/footer');
    }
}
