<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ijazah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            "IjazahModel" => "Ijazah"
        ]); //load model
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data["title"] = "Data Ijazah";
        $this->load->view('main/header', $data);
        $this->load->view('main/navbar');
        $this->load->view('ijazah/form_edit');
        $this->load->view('main/footer');
    }

    public function getData()
    {
        $id = $this->session->userdata('user_id');

        $operation = $this->Ijazah->read($id);

        echo json_encode($operation);
    }

    public function update()
    {
        $data = $this->input->post();
        // print_r($data);exit;
        $message = "";
        $tgl = strtr($data['siswa_tgl_lahir'], '/', '-');
        $data['siswa_tgl_lahir'] = date("Y-m-d", strtotime($tgl));
        $data['siswa_nama'] = strtoupper($data['siswa_nama']);
        
        $operation = $this->Ijazah->update($data['siswa_id'], $data);
        // $operation = $this->db->update('v_ijazah', $data, $data('siswa_id'));

        echo json_encode($operation);
    }
}
