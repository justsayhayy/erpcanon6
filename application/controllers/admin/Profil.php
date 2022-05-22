<?php

class Profil extends CI_Controller
{
    public function index(){
        $topik['judul'] = 'Halaman Profil Perusahaan';
        $this->load->view('admin/templates/header',$topik);
        $this->load->view('admin/landingpage');
        $this->load->view('admin/templates/footer');
    }
}
