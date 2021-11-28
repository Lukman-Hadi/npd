<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!is_login())redirect(site_url('login'));
        $this->load->model('Jabatan_model','jmodel');
        $this->load->model('Global_model','gmodel');
    }

	function index(){
        $data['title']  = 'Data Jabatan';
        $data['title']  = 'Data Jabatan';
        $data['title']  = 'Data Jabatan';
        $data['link']  = 'jabatan/getData';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/js/jabatan.js';
        $this->template->load('template','master/jabatan',$data);
    }

    function getData(){
        $result =  $this->jmodel->getAll();
        echo json_encode($result);
    }

    function save(){
        $nama = $this->input->post('nama_jabatan', TRUE);
        $data = array();
        $data = array(
            'nama_jabatan' => $nama,
        );
        $result = $this->gmodel->insert('tbl_jabatan',$data);
        if ($result){
            echo json_encode(array('message'=>'Update Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }

    function update(){
        $nama = $this->input->post('nama_jabatan', TRUE);
        $data = array();
        $data = array(
            'nama_jabatan' => $nama,
        );
        $where = array('_id'=>$this->input->get('id'));
        $result = $this->gmodel->update('tbl_jabatan',$data,$where);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function delete(){
        $data = $this->input->post('id',TRUE);
        $result = $this->gmodel->deleteBatch('tbl_jabatan',$data);
        if ($result){
            echo json_encode(array('message'=>'Delete Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function aktif()
    {
        $id = $this->input->post('id',TRUE);
        $rows = $this->db->get_where('tbl_jabatan', array('_id'=>$id))->row_array();
        if ($rows['status'] == 0){
            $aktif = '1';
        }else{
            $aktif = '0';
        }
        $result = $this->gmodel->update('tbl_jabatan',array('status'=>$aktif), array('_id'=>$id));
        if ($result){
            echo json_encode(array('message'=> 'User  Aktif or Non Aktif Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function isJabatan(){
        $this->output->set_content_type('application/json');
        $data = $this->jmodel->getIsJabatan();
        echo json_encode($data);
    }
}
