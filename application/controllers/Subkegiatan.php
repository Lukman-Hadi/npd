<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkegiatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!is_login())redirect(site_url('login'));
        $this->load->model('Kegiatan_model','kmodel');
        $this->load->model('Subkegiatan_model','smodel');
        $this->load->model('Global_model','gmodel');
    }

	function index(){
        $data['title']  = 'Data Sub Kegiatan';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $this->template->load('template','master/subkegiatan',$data);
    }

    function getData(){
        $result =  $this->smodel->getAll();
        echo json_encode($result);
    }

    function save(){
        $idp = $this->input->post('id_program', TRUE);
        $idk = $this->input->post('id_kegiatan', TRUE);
        $kode = $this->input->post('kode_sub', TRUE);
        $nama = $this->input->post('nama_sub', TRUE);
        $data = array();
        $data = array(
            'id_program' => $idp,
            'id_kegiatan' => $idk,
            'nama_sub' => $nama,
            'kode_sub' => $kode
        );
        $result = $this->gmodel->insert('tbl_sub_kegiatan',$data);
        if ($result){
            echo json_encode(array('message'=>'Update Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }

    function update(){
        $idp = $this->input->post('id_program', TRUE);
        $idk = $this->input->post('id_kegiatan', TRUE);
        $kode = $this->input->post('kode_sub', TRUE);
        $nama = $this->input->post('nama_sub', TRUE);
        $data = array();
        $data = array(
            'id_program' => $idp,
            'id_kegiatan' => $idk,
            'nama_sub' => $nama,
            'kode_sub' => $kode
        );
        $where = array('_id'=>$this->input->get('id'));
        $result = $this->gmodel->update('tbl_sub_kegiatan',$data,$where);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function delete(){
        $data = $this->input->post('id',TRUE);
        $result = $this->gmodel->deleteBatch('tbl_sub_kegiatan',$data);
        if ($result){
            echo json_encode(array('message'=>'Delete Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function aktif()
    {
        $id = $this->input->post('id',TRUE);
        $rows = $this->db->get_where('tbl_sub_kegiatan', array('_id'=>$id))->row_array();
        if ($rows['status'] == 0){
            $aktif = '1';
        }else{
            $aktif = '0';
        }
        $result = $this->gmodel->update('tbl_sub_kegiatan',array('status'=>$aktif), array('_id'=>$id));
        if ($result){
            echo json_encode(array('message'=> 'User  Aktif or Non Aktif Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }

    function isKegiatan(){
        $id = $this->input->get('id');
        $this->output->set_content_type('application/json');
        $data = $this->kmodel->getIsKegiatan($id)->result();
        echo json_encode($data);
    }
}
