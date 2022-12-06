<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            "SiswaModel" => "Siswa",
        ]);
    }

    public function action()
    {
        // ambil data dari form dan masukkan ke variable $data
        $data = $this->input->post();
        $message = "";

        $where = [
            'siswa_username' => $data['username'],
        ];

        $cek = $this->Siswa->read($where);
        if ($cek) {
            // if (password_verify($data['pass'], $validasi->siswa_password)) {
            if ($data['pass'] = $cek['siswa_password']) {
                $data_session = array(
                    'user_id' => $cek['siswa_id'],
                    'user_name' => $cek['siswa_nama'],
                    'username' => $cek['siswa_username'],
                    'profile' => $cek['foto_smk'],
                    'nisn'=>$cek['siswa_nisn'],
                    'status' => "login"
                );
                $this->session->set_userdata($data_session);
                redirect('main');
            } else {
                $message = "Password Salah";
                $this->session->set_flashdata('message', $message);
                redirect('login');
            }
        } else {
            $message = "Username dan Password Salah";
            $this->session->set_flashdata('message', $message);
            redirect('index.php');
        }
    }

    public function index()
    {
        if (!$this->session->userdata('user_id')) {
            $this->load->view('view');
        } else {
            redirect('main');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
