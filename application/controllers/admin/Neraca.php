<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_neraca');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $topik['judul'] = 'Halaman Menu Neraca Lain';
        $this->load->view('admin/templates/header', $topik);
        $this->load->view('admin/neraca/index');
        $this->load->view('admin/templates/footer');
    }

    public function getData($weekending) {
        echo json_encode($this->m_neraca->tampil_data($weekending));
    }

    public function tambah() {
        $data['judul'] = 'Form Tambah Data Neraca Lain';

        $this->form_validation->set_rules('tgl', 'Tgl', 'required');
        $this->form_validation->set_rules('no_faktur', 'No_Faktur', 'required');
        $this->form_validation->set_rules('transaksi', 'Transaksi', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/neraca/tambah');
        } else {
            $this->m_neraca->tambahDataNeraca();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/neraca');
        }
        
    }

    public function hapus($id) {
        $this->m_neraca->hapusDataNeraca($id);
        $this->session->set_flashdata('flash2', 'Dihapus');
        redirect('admin/neraca');
    }

    public function edit($id) {
        $topik['judul'] = 'Edit Data Neraca Lain';
        $data['neraca'] = $this->m_neraca->getNeracaById($id);
        // $data['program'] = ['Teknik Informatika','Teknik Elektro','Bahasa Indonesia','Bahasa Inggris','Matematika','PKN'];

        $this->form_validation->set_rules('tgl', 'Tgl', 'required');
        $this->form_validation->set_rules('no_faktur', 'No_Faktur', 'required');
        $this->form_validation->set_rules('transaksi', 'Transaksi', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header', $topik);
            $this->load->view('admin/neraca/edit', $data);
        } else {
            $this->m_neraca->ubahDataNeraca();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/neraca');
        }
    }
}