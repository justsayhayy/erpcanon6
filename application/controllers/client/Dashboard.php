<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang');
        $this->load->model('M_kategori');
        $this->load->model('M_gudang');
        $this->load->model('M_karyawan');
        // $this->check_login();
        if ($this->session->userdata('id_role') != 2) {
            redirect('admin/auth/login', 'refresh');
        }
    }
	public function index()
	{
        $topik['judul'] = 'Halaman Dashboard';
        $data['produk'] = $this->M_barang->hitungJumlahAsset();
        $data['tbl_category'] = $this->M_kategori->hitungJumlahAsset();
        $data['gudang'] = $this->M_gudang->hitungJumlahAsset();
        $data['karyawan'] = $this->M_karyawan->hitungJumlahAsset();

		$this->load->view('admin/templates/header',$topik);
        $this->load->view('admin/dashboard/index',$data);
        $this->load->view('admin/templates/footer');
    }
   
}
