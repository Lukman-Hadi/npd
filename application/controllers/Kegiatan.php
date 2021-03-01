<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!is_login())redirect(site_url('login'));
        $this->load->model('kegiatan_model','kmodel');
        $this->load->model('Program_model','pmodel');
        $this->load->model('Global_model','gmodel');
    }

	function index(){
        $data['title']  = 'Data Kegiatan';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        // $data['css_files'][] = base_url() . 'assets/admin/easyui/themes/icon.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $this->template->load('template','master/kegiatan',$data);
    }

    function getData(){
        $result =  $this->kmodel->getAll();
        echo json_encode($result);
    }

    function save(){
        $kode = $this->input->post('kode_kegiatan', TRUE);
        $nama = $this->input->post('nama_kegiatan', TRUE);
        $id_program = $this->input->post('id_program', TRUE);
        $data = array();
        $data = array(
            'kode_kegiatan' => $kode,
            'nama_kegiatan' => $nama,
            'id_program'    => $id_program
        );
        $result = $this->gmodel->insert('tbl_kegiatan',$data);
        if ($result){
            echo json_encode(array('message'=>'Update Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }

    function update(){
        $kode = $this->input->post('kode_kegiatan', TRUE);
        $nama = $this->input->post('nama_kegiatan', TRUE);
        $data = array();
        $data = array(
            'kode_kegiatan' => $kode,
            'nama_kegiatan' => $nama
        );
        $where = array('_id'=>$this->input->get('id'));
        $result = $this->gmodel->update('tbl_kegiatan',$data,$where);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function delete(){
        $data = $this->input->post('id',TRUE);
        $result = $this->gmodel->deleteBatch('tbl_kegiatan',$data);
        if ($result){
            echo json_encode(array('message'=>'Delete Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function aktif()
    {
        $id = $this->input->post('id',TRUE);
        $rows = $this->db->get_where('tbl_kegiatan', array('_id'=>$id))->row_array();
        if ($rows['status'] == 0){
            $aktif = '1';
        }else{
            $aktif = '0';
        }
        $result = $this->gmodel->update('tbl_kegiatan',array('status'=>$aktif), array('_id'=>$id));
        if ($result){
            echo json_encode(array('message'=> 'User  Aktif or Non Aktif Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function isProgram(){
        $this->output->set_content_type('application/json');
        $data = $this->pmodel->getIsProgram();
        echo json_encode($data);
    }
}
