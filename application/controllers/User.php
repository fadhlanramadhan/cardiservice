<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Detail_transaksi_model', 'detail_transaksi');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('user/headeruser', $data);
        $this->load->view('user/userpage');
        $this->load->view('user/footeruser');
    }

    public function service()
    {
        $data['title'] = 'Service';
        $data['all_service'] = $this->transaksi->getService();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('user/headeruser', $data);
        $this->load->view('user/service', $data);
        $this->load->view('user/footeruser');
    }

    public function proses_service()
    {
        $data['title'] = 'Service';
        $data['all_service'] = $this->transaksi->getService();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('device', 'Device', 'required|trim');
        $this->form_validation->set_rules('service', 'Service', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/headeruser', $data);
            $this->load->view('user/service', $data);
            $this->load->view('user/footeruser');
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
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi'),
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status'),
            ];
            if ($this->transaksi->tambah($data)) {
                $this->session->set_flashdata('success', 'Data <strong>Submitted</strong>. We will contact you ASAP');
                redirect('user/activity');
            } else {
                $this->session->set_flashdata('error', 'Data <strong>Error</strong>');
                redirect('user/service');
            }
        }
    }

    public function activity()
    {
        $data['title'] = 'Activity';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_transaksi'] = $this->transaksi->get();
        $data['no'] = 1;

        $this->load->view('user/headeruser', $data);
        $this->load->view('user/activity', $data);
        $this->load->view('user/footeruser');
    }

    public function detail_servis($no_transaksi)
    {
        $data['title'] = 'Transaction Detail';
        $data['transaksi'] = $this->transaksi->lihat_no_transaksi($no_transaksi);
        $data['status'] = $this->transaksi->getStatus();
        $data['all_detail_transaksi'] = $this->detail_transaksi->lihat_no_transaksi($no_transaksi);
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['estimasi'] = $this->db
            ->select('t.no_transaksi,t.email,t.nama,t.telpon,t.device,t.service,t.harga,t.deskripsi,t.alamat,t.tgl_terima,t.waktu,t.status,t.teknisi,s.estimasi')
            ->from('transaksi t')
            ->join('service s', 's.nama_service=t.service')
            ->where('t.no_transaksi', $no_transaksi)
            ->get()->row();

        $this->load->view('user/headeruser', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('user/footeruser');
    }

    public function editprofile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim|max_length[50]|min_length[3]');

        if ($this->form_validation->run() == false) {
            if ($user['role_id'] == 1 || $user['role_id'] == 3) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/editprofile', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('user/headeruser', $data);
                $this->load->view('user/editprofile', $data);
                $this->load->view('user/footeruser');
            }
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile has been changed</div>');
            redirect('user/editprofile');
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            if ($user['role_id'] == 1 || $user['role_id'] == 3) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/changepassword', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('user/headeruser', $data);
                $this->load->view('user/changepassword', $data);
                $this->load->view('user/footeruser');
            }
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current password</div>');
                    redirect('user/changepassword');
                } else {
                    // password yang benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);


                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function payment($no_transaksi)
    {
        $data['title'] = 'Payment Detail';
        $data['detail_payment'] = $this->transaksi->detailPayment($no_transaksi);
        $data['payment_result'] = $this->transaksi->detailPaymentresult($no_transaksi);
        $data['status'] = $this->transaksi->getStatus();
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('user/headeruser', $data);
        $this->load->view('user/payment', $data);
        $this->load->view('user/footeruser');
    }

    public function proses_metode($no_transaksi)
    {
        $data['title'] = 'Payment Detail';
        $data['detail_payment'] = $this->transaksi->detailPayment($no_transaksi);
        $data['payment_result'] = $this->transaksi->detailPaymentresult($no_transaksi);
        $data['status'] = $this->transaksi->getStatus();
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('metode', 'Metode', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/headeruser', $data);
            $this->load->view('user/payment', $data);
            $this->load->view('user/footeruser');
        } else {
            $metode = $this->input->post('metode');
            $status = $this->input->post('status');
            if ($metode) {
                $data = [
                    'pembayaran' => 'Menunggu Verifikasi'
                ];
                $this->db->where('no_transaksi', $no_transaksi)->update('pembayaran', $data);
            }

            if ($this->transaksi->metode($metode, $no_transaksi) && $this->transaksi->verifikasi($status, $no_transaksi)) {
                $this->session->set_flashdata('success', '<strong>Successful</strong> payment! Please wait for verification');
                redirect('user/activity');
            } else {
                $this->session->set_flashdata('error', 'Payment <strong>Failed</strong>');
                redirect('user/activity');
            }
        }
    }

    public function pay($no_transaksi)
    {
        $data['title'] = 'Payment Detail';
        $data['detail_payment'] = $this->transaksi->detailPayment($no_transaksi);
        $data['payment_result'] = $this->transaksi->detailPaymentresult($no_transaksi);
        $data['status'] = $this->transaksi->getStatus();
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('user/headeruser', $data);
        $this->load->view('user/pay', $data);
        $this->load->view('user/footeruser');
    }

    public function history()
    {
        $data['title'] = 'History';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_history'] = $this->transaksi->history();
        $data['no'] = 1;

        $this->load->view('user/headeruser', $data);
        $this->load->view('user/history', $data);
        $this->load->view('user/footeruser');
    }

    public function detail_history($no_transaksi)
    {
        $data['title'] = 'Transaction Detail';
        $data['detail_payment'] = $this->transaksi->detailPayment($no_transaksi);
        $data['status'] = $this->transaksi->getStatus();
        $data['all_detail_transaksi'] = $this->detail_transaksi->lihat_no_transaksi($no_transaksi);
        $data['no'] = 1;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('user/headeruser', $data);
        $this->load->view('user/detail_history', $data);
        $this->load->view('user/footeruser');
    }

    public function upload_bukti()
    {


        $no_transaksi = $this->input->post('no_transaksi');
        $metode = $this->input->post('metode');
        $status = $this->input->post('status');

        $config['upload_path']          = 'assets/img/bukti/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti')) {
            $this->session->set_flashdata('error', 'Upload data <strong>Failed</strong>.');
            redirect('user/activity');
        } else {
            $bukti = $this->upload->data('file_name');
            $databayar = [
                'pembayaran' => 'Menunggu Verifikasi'
            ];
            $this->db->where('no_transaksi', $no_transaksi)->update('pembayaran', $databayar);
            $this->db->set('bukti', $bukti);
        }
        $this->db->set('bukti', $bukti);
        $this->db->where(['no_transaksi' => $no_transaksi]);
        $this->db->update('pembayaran');

        $this->db->set('metode', $metode);
        $this->db->where(['no_transaksi' => $no_transaksi]);
        $this->db->update('pembayaran');

        $this->db->set('status', $status);
        $this->db->where(['no_transaksi' => $no_transaksi]);
        $this->db->update('transaksi');

        $this->session->set_flashdata('success', 'Upload data <strong>Submitted</strong>.');
        redirect('user/activity');
    }

    public function get_all_service()
    {
        $data = $this->user->lihat_nama_service($_POST['nama_service']);
        echo json_encode($data);
    }
}
