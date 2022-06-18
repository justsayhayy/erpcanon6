<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnalumum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jurnalumum');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $topik['judul'] = 'Halaman Menu Jurnal Umum';
        // $data['produk'] = $this->m_jurnalumum->get_by_role();
        // if ($this->input->post('keyword')) {
        //     $data['produk'] = $this->m_jurnalumum->cariDataBarang();
        // }
        // $data['jurnalumum'] = $this->m_jurnalumum->tampil_data();
        // if ($this->input->post('keyword')) {
        //     $data['gudang'] = $this->m_gudang->cariDataGudang();
        // }
        if (isset($_POST['s'])) {
            $select = $_POST['s'];
        } else {
            $select = 'all';
        }
        $data['all'] = $this->m_jurnalumum->selectingData($select);
        $data['no_bukti'] = $this->m_jurnalumum->getBuktiTransaksi();
        $data['all_kas'] = $this->m_jurnalumum->getAllKas();

        // var_dump($this->m_jurnalumum->getAllKas());
        // die();
        $data['account'] = $this->getAllAccount();
        $data['weekending'] = $this->getWeekending();
        $this->load->view('admin/templates/header', $topik);
        $this->load->view('admin/jurnalumum/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function transaksiSearch()
    {
        $topik['judul'] = 'Halaman Menu Jurnal Umum';
        // $data['produk'] = $this->m_jurnalumum->get_by_role();
        // if ($this->input->post('keyword')) {
        //     $data['produk'] = $this->m_jurnalumum->cariDataBarang();
        // }
        // $data['jurnalumum'] = $this->m_jurnalumum->tampil_data();
        // if ($this->input->post('keyword')) {
        //     $data['gudang'] = $this->m_gudang->cariDataGudang();
        // }
        if (isset($_POST['search'])) {
            $select = $_POST['search'];
        } else {
            $select = '';
        }
        $data['all'] = $this->m_jurnalumum->getTransaksi($select);
        // var_dump($data['all']);
        // die();
        $data['account'] = $this->getAllAccount();
        $data['weekending'] = $this->getWeekending();
        $this->load->view('admin/templates/header', $topik);
        $this->load->view('admin/jurnalumum/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function getWeekending()
    {
        return $this->m_jurnalumum->getWeekending();
    }

    public function getLatestJPId()
    {
        echo json_encode($this->m_jurnalumum->getLatestJPId());
    }

    public function getLatestJRId()
    {
        echo json_encode($this->m_jurnalumum->getLatestJRId());
    }

    public function getData($weekending = NULL)
    {
        echo json_encode($this->m_jurnalumum->tampil_data($weekending));
    }

    public function getAllAccount()
    {
        return $this->m_jurnalumum->getAllAccount();
    }

    public function getAccountName($kode)
    {
        echo json_encode($this->m_jurnalumum->getAccountName($kode));
    }

    public function getDataById($id)
    {
        echo json_encode($this->m_jurnalumum->getDataById($id));
    }

    public function getDataByWord($word)
    {
        echo json_encode($this->m_jurnalumum->getDataByWord($word));
    }

    public function tambah()
    {

        $data['judul'] = 'Form Tambah Data';

        // var_dump($_POST);
        // die();

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('transaksi', 'Transaksi', 'required');
        $this->form_validation->set_rules('no_bukti', 'No_Bukti', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('kode_debit', 'Kode_Debit', 'required');
        $this->form_validation->set_rules('kode_kredit', 'Kode_Kredit', 'required');
        $this->form_validation->set_rules('akun_debit', 'Nama_Akundebit', 'required');
        $this->form_validation->set_rules('didebit', 'Didebit', 'required');
        $this->form_validation->set_rules('akun_kredit', 'Nama_Akunkredit', 'required');
        $this->form_validation->set_rules('dikredit', 'Dikredit', 'required');


        if ($this->form_validation->run() == FALSE) {            // echo "ada yg kosong";

            redirect('admin/jurnalumum');
        } else {
            // echo "ada semua";
            $kode_debit = substr($this->input->post('kode_debit'), 2, 3);
            $kode_kredit = substr($this->input->post('kode_kredit'),  2, 3);
            $table = 'jurnalumum';
            $data = array(
                'tgl' => $this->input->post('tgl'),
                'transaksi' => $this->input->post('transaksi'),
                'no_bukti' => $this->input->post('no_bukti'),
                'jumlah' => $this->input->post('jumlah'),
                'kode_kredit' => $kode_kredit,
                'kode_debit' => $kode_debit,
                'nama_akundebit' => $this->input->post('akun_debit'),
                'nama_akunkredit' => $this->input->post('akun_kredit'),
                'didebit' => $this->input->post('didebit'),
                'dikredit' => $this->input->post('dikredit'),
            );

            // var_dump($data);
            // die();
            $this->m_jurnalumum->tambahkanData($table, $data);
            // $this->m_jurnalumum->tambahDataJurnal();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/jurnalumum');
        }
    }
    public function edit()
    {
        $this->form_validation->set_rules('tgl2', 'Tanggal', 'required');
        $this->form_validation->set_rules('transaksi2', 'Transaksi', 'required');
        $this->form_validation->set_rules('no_bukti2', 'No_Bukti', 'required');
        $this->form_validation->set_rules('jumlah2', 'Jumlah', 'required');
        $this->form_validation->set_rules('kode_debit2', 'Kode_Debit', 'required');
        $this->form_validation->set_rules('kode_kredit2', 'Kode_Kredit', 'required');
        $this->form_validation->set_rules('nama_akundebit2', 'Nama_Akundebit', 'required');
        $this->form_validation->set_rules('didebit2', 'Didebit', 'required');
        $this->form_validation->set_rules('nama_akunkredit2', 'Nama_Akunkredit', 'required');
        $this->form_validation->set_rules('dikredit2', 'Dikredit', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/jurnalumum');
        } else {
            $this->m_jurnalumum->ubahDataJurnal();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/jurnalumum');
        }
    }
    public function hapus($id)
    {
        $this->m_jurnalumum->hapusDataJurnal($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/jurnalumum');
    }
}
