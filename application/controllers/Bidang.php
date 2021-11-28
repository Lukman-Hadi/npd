<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!is_login())redirect(site_url('login'));
        $this->load->model('Bidang_model','bmodel');
        $this->load->model('Global_model','gmodel');
    }

	function index(){
        $data['title']  = 'DATA BIDANG';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/js/bidang.js';
        $this->template->load('template','master/bidang',$data);
    }

    function getData(){
        $result =  $this->bmodel->getAll();
        echo json_encode($result);
    }

    function save(){
        $nama = $this->input->post('nama_bidang', TRUE);
        $data = array();
        $data = array(
            'nama_bidang' => $nama
        );
        $result = $this->gmodel->insert('tbl_bidang',$data);
        // $result = $this->db->insert('tbl_bidang',$data);
        // $insert_id = $this->db->insert_id();
        // var_dump($insert_id);
        if ($result){
            echo json_encode(array('message'=>'Update Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }

    function update(){
        $nama = $this->input->post('nama_bidang', TRUE);
        $data = array();
        $data = array(
            'nama_bidang' => $nama
        );
        $where = array('_id'=>$this->input->get('id'));
        $result = $this->gmodel->update('tbl_bidang',$data,$where);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function delete(){
        $data = $this->input->post('id',TRUE);
        $result = $this->gmodel->deleteBatch('tbl_bidang',$data);
        if ($result){
            echo json_encode(array('message'=>'Delete Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function aktif()
    {
        $id = $this->input->post('id',TRUE);
        $rows = $this->db->get_where('tbl_bidang', array('_id'=>$id))->row_array();
        if ($rows['status'] == 0){
            $aktif = '1';
        }else{
            $aktif = '0';
        }
        $result = $this->gmodel->update('tbl_bidang',array('status'=>$aktif), array('_id'=>$id));
        if ($result){
            echo json_encode(array('message'=> 'User  Aktif or Non Aktif Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function isBidang(){
        $this->output->set_content_type('application/json');
        $data = $this->bmodel->getIsBidang();
        echo json_encode($data);
    }
}
