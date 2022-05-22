<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Return_supplier extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_returnsupplier');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index(){
        $topik['judul'] = 'Halaman Menu Return_supplier';
        $data['return_supplier'] = $this->m_returnsupplier->tampil_data();
        $this->load->view('admin/templates/header',$topik);
        $this->load->view('admin/return_supplier/index',$data);
        $this->load->view('admin/templates/footer');
    }

    public function getLatestNoReturn() {
        $result = $this->m_returnsupplier->getLatestNoReturn();
        if ($result == '') {
            echo json_encode("RS/".substr(date('Ymd'), 2)."/00001");
        } else {
            $result = (int)substr($result['no_return'], -1, 5) + 1;
            $firsthalf = "RS/".substr(date('Ymd'), 2)."/".str_repeat('0', 5 - strlen((string)$result)).$result;
            echo json_encode($firsthalf);
        }
    }

    public function tambah(){
        $data['judul'] = 'Form Tambah Data Return_supplier';

        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('no_faktur','No_Faktur','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');
        $this->form_validation->set_rules('kode','Kode','required');
        $this->form_validation->set_rules('barang','Barang','required');
        $this->form_validation->set_rules('gudang_asal','Gudang_asal','required');
        $this->form_validation->set_rules('supplier_tujuan','Supplier_tujuan','required');
        $this->form_validation->set_rules('jumlah','Jumlah','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/return_supplier/tambah');
        }else {
            $this->m_returnsupplier->tambahDataReturn_supplier();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('admin/return_supplier');
        }
        
    }

    public function tambahDataReturnSupplier() {
        $this->form_validation->set_rules('tgl_returnsuppl', 'Tgl', 'required');
        $this->form_validation->set_rules('no_return_returnsuppl', 'No Return', 'required');
        $this->form_validation->set_rules('keterangan_returnsuppl', 'Keterangan', 'required');
        $this->form_validation->set_rules('jenis_kendaraan_returnsuppl', 'Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('no_polisi_returnsuppl', 'No Polisi', 'required');
        $this->form_validation->set_rules('nama_driver_returnsuppl', 'Nama Driver', 'required');
        $this->form_validation->set_rules('nama_expedisi_returnsuppl', 'Nama Expedisi', 'required');
        $this->form_validation->set_rules('kode_returnsuppl', 'Kode', 'required');
        $this->form_validation->set_rules('barang_returnsuppl', 'Barang', 'required');
        $this->form_validation->set_rules('gudang_asal_returnsuppl', 'Gudang Asal', 'required');
        $this->form_validation->set_rules('supplier_tujuan_returnsuppl', 'Supplier Tujuan', 'required');
        $this->form_validation->set_rules('qty_asal_returnsuppl', 'Qty Asal', 'required');
        $this->form_validation->set_rules('jumlah_karton_returnsuppl', 'Jumlah Karton', 'required');
        $this->form_validation->set_rules('isi_karton_returnsuppl', 'Isi Karton', 'required');
        $this->form_validation->set_rules('qty_returnsuppl', 'Qty', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_error', validation_errors());
        } else {
            $this->m_returnsupplier->tambahDataReturn_supplier();
            $this->session->set_flashdata('flash_success','Return ke supplier <strong>berhasil</strong> dilakukan!');
            redirect('admin/barang/allBarang');
        }
    }

    public function hapus($id){
        $this->m_returnsupplier->hapusDataReturn_supplier($id);
        $this->session->set_flashdata('flash2','Dihapus');
        redirect('return_supplier');
    }
    public function edit($id){
        $topik['judul'] = 'Edit Data Return_supplier';
        $data['return_supplier'] = $this->m_returnsupplier->getReturn_supplierById($id);
        // $data['program'] = ['Teknik Informatika','Teknik Elektro','Bahasa Indonesia','Bahasa Inggris','Matematika','PKN'];

        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('no_faktur','No_Faktur','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');
        $this->form_validation->set_rules('kode','Kode','required');
        $this->form_validation->set_rules('barang','Barang','required');
        $this->form_validation->set_rules('gudang_asal','Gudang_asal','required');
        $this->form_validation->set_rules('supplier_tujuan','Supplier_tujuan','required');
        $this->form_validation->set_rules('jumlah','Jumlah','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header',$topik);
            $this->load->view('admin/return_supplier/edit',$data);
        }else {
            $this->m_returnsupplier->ubahDataReturn_supplier();
            $this->session->set_flashdata('flash','Diubah');
            redirect('admin/return_supplier');
        }
}
}