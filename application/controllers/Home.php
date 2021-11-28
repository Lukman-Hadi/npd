<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_Model','tmodel');
        if(!is_login())redirect(site_url('login'));
    }

	function index(){
        $data['dataPPTK'] = $this->tmodel->getTotalPencairanPPTK();
        $data['title']  = 'Cka Pot';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['data'] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/js/dashboard.js';
        $this->template->load('template','dashboard',$data);
    }
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        $this->load->view('auth/login', 'refresh');
    }
}
