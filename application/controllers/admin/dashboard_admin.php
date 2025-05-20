<?php

class Dashboard_admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        // Load models
        $this->load->model('model_makanan');
        $this->load->model('model_transaksi');
        $this->load->model('model_user');

        // Session validation
        if (empty($this->session->userdata('id_level')) || $this->session->userdata('id_level') != '2') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['total_menu'] = $this->model_makanan->hitungJumlahMenu();
        $data['total_transaksi'] = $this->model_transaksi->hitungJumlahTransaksi();
        $data['total_user'] = $this->model_user->hitungJumlahUser();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail($id_makanan = null)
    {
        if (!$id_makanan) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> ID Makanan Tidak Ditemukan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/dashboard');
        }

        $data['makanan'] = $this->model_makanan->detail_makanan($id_makanan);
        if (!$data['makanan']) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Data Makanan Tidak Ditemukan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/dashboard');
        }

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_makanan', $data);
        $this->load->view('templates_admin/footer');
    }
}
?>
