<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller
{


    public function __construct(){
        parent::__construct();
        $this->load->model('M_daftar');
        $this->load->library('form_validation');
    }

    public function index(){
        $topik['judul'] = 'Halaman Profil Perusahaan';


        $data['daftarmitra'] = $this->M_daftar->getdaftar_mitraById('10');
        $this->load->view('admin/templates/header',$topik);
        $this->load->view('admin/profil_perusahaan/index', $data);
        $this->load->view('admin/templates/footer');
    }
}
