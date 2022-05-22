<?php

class Team extends CI_Controller
{
    public function index(){
        $topik['judul'] = 'Team Page';
        $this->load->view('admin/templates2/header',$topik);
        $this->load->view('admin/team');
        $this->load->view('admin/templates2/footer');
    }
}