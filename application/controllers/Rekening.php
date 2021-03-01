<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!is_login())redirect(site_url('login'));
        $this->load->model('Rekening_model','rmodel');
        $this->load->model('Subkegiatan_model','smodel');
        $this->load->model('Global_model','gmodel');
    }

	function index(){
        $data['title']  = 'Data Rekening Kegiatan';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $this->template->load('template','master/rekening',$data);
    }

    function getData(){
        $result =  $this->rmodel->getAll();
        echo json_encode($result);
    }

    function save(){
        $idp = $this->input->post('id_program', TRUE);
        $idk = $this->input->post('id_kegiatan', TRUE);
        $ids = $this->input->post('id_sub', TRUE);
        $kode = $this->input->post('kode_rekening', TRUE);
        $nama = $this->input->post('nama_rekening', TRUE);
        $pagu = $this->input->post('pagu', TRUE);
        $data = array();
        $data = array(
            'id_sub'        => $ids,
            'id_program'    => $idp,
            'id_kegiatan'   => $idk,
            'nama_rekening' => $nama,
            'kode_rekening' => $kode,
            'pagu'          => str_replace('.','',$pagu),
        );
        $result = $this->gmodel->insert('tbl_rekening_kegiatan',$data);
        if ($result){
            echo json_encode(array('message'=>'Update Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }

    function update(){
        $idp = $this->input->post('id_program', TRUE);
        $idk = $this->input->post('id_kegiatan', TRUE);
        $ids = $this->input->post('id_sub', TRUE);
        $kode = $this->input->post('kode_rekening', TRUE);
        $nama = $this->input->post('nama_rekening', TRUE);
        $pagu = $this->input->post('pagu', TRUE);
        $data = array();
        $data = array(
            'id_sub'        => $ids,
            'id_program'    => $idp,
            'id_kegiatan'   => $idk,
            'nama_rekening' => $nama,
            'kode_rekening' => $kode,
            'pagu'          => str_replace('.','',$pagu),
        );
        $where = array('_id'=>$this->input->get('id'));
        $result = $this->gmodel->update('tbl_rekening_kegiatan',$data,$where);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function delete(){
        $data = $this->input->post('id',TRUE);
        $result = $this->gmodel->deleteBatch('tbl_rekening_kegiatan',$data);
        if ($result){
            echo json_encode(array('message'=>'Delete Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function aktif()
    {
        $id = $this->input->post('id',TRUE);
        $rows = $this->db->get_where('tbl_rekening_kegiatan', array('_id'=>$id))->row_array();
        if ($rows['status'] == 0){
            $aktif = '1';
        }else{
            $aktif = '0';
        }
        $result = $this->gmodel->update('tbl_rekening_kegiatan',array('status'=>$aktif), array('_id'=>$id));
        if ($result){
            echo json_encode(array('message'=> 'User  Aktif or Non Aktif Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }

    function isSub(){
        $id = $this->input->get('id');
        $this->output->set_content_type('application/json');
        $data = $this->smodel->getIsKegiatan($id)->result();
        echo json_encode($data);
    }
}
