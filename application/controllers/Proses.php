<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!is_login())redirect(site_url('login'));
        $this->load->model('Proses_model','pmodel');
        $this->load->model('Global_model','gmodel');
    }

	function index(){
        $data['title']  = 'DATA PROSES';
        $data['subtitle']  = 'List Proses Aplikasi';
        $data['description']  = 'Data ini digunakan untuk ';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        // $data['css_files'][] = base_url() . 'assets/admin/easyui/themes/icon.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        // $data['js_files'][] = base_url() . 'assets/admin/easyui/datagrid-groupview.js';
        // $data['js_files'][] = base_url() . 'assets/admin/easyui/plugins/datagrid-scrollview.js';
        // $data['js_files'][] = base_url() . 'assets/admin/js/menu.js';
        $this->template->load('template','master/proses',$data);
    }

    function getDataProses(){
        $result =  $this->pmodel->getAll();
        echo json_encode($result);
    }

    function saveProses(){
        $kode = $this->input->post('nama_progress', TRUE);
        $data = array();
        $data = array(
            'nama_progress' => $kode,
        );
        $result = $this->gmodel->insert('tbl_progress',$data);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }

    function updateProses(){
        $kode = $this->input->post('nama_progress', TRUE);
        $data = array();
        $data = array(
            'nama_progress' => $kode,
        );
        $where = array('_id'=>$this->input->get('id'));
        $result = $this->gmodel->update('tbl_progress',$data,$where);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function deleteProses(){
        $data = $this->input->post('id',TRUE);
        $result = $this->gmodel->deleteBatch('tbl_progress',$data);
        if ($result){
            echo json_encode(array('message'=>'Delete Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function aktif()
    {
        $id = $this->input->post('id',TRUE);
        $rows = $this->db->get_where('tbl_program', array('_id'=>$id))->row_array();
        if ($rows['status'] == 0){
            $aktif = '1';
        }else{
            $aktif = '0';
        }
        $result = $this->gmodel->update('tbl_program',array('status'=>$aktif), array('_id'=>$id));
        if ($result){
            echo json_encode(array('message'=> 'User  Aktif or Non Aktif Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function menu(){
        $data['title']  = 'DATA MENU';
        $data['subtitle']  = 'List Menu Aplikasi';
        $data['description']  = 'Data ini digunakan untuk ';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $this->template->load('template','master/menu',$data);
    }
    function getDataMenu(){
        $result =  $this->pmodel->getMenus();
        echo json_encode($result);
    }
    function isMainMenu(){
        $this->output->set_content_type('application/json');
        $data = $this->pmodel->getIsMainMenu();
        echo json_encode($data);
    }
    function saveMenu(){
        $judul = $this->input->post('judul', TRUE);
        $link = $this->input->post('link', TRUE);
        $icon = $this->input->post('icon', TRUE);
        $idMain = $this->input->post('id_main', TRUE);
        $ordinal = $this->input->post('ordinal', TRUE);
        $data = array();
        $data = array(
            'judul' => $judul,
            'link' => $link,
            'icon' => $icon,
            'id_main' => $idMain,
            'ordinal' => $ordinal,
        );
        $result = $this->gmodel->insert('tbl_menus',$data);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function updateMenu(){
        $judul = $this->input->post('judul', TRUE);
        $link = $this->input->post('link', TRUE);
        $icon = $this->input->post('icon', TRUE);
        $idMain = $this->input->post('id_main', TRUE);
        $ordinal = $this->input->post('ordinal', TRUE);
        $data = array();
        $data = array(
            'judul' => $judul,
            'link' => $link,
            'icon' => $icon,
            'id_main' => $idMain,
            'ordinal' => $ordinal,
        );
        $where = array('_id'=>$this->input->get('id'));
        $result = $this->gmodel->update('tbl_menus',$data,$where);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function destroyMenu(){
        $data = $this->input->post('id',TRUE);
        $result = $this->gmodel->deleteBatch('tbl_menus',$data);
        if ($result){
            echo json_encode(array('message'=>'Delete Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function aktifMenu(){
        $id = $this->input->post('id',TRUE);
        $rows = $this->db->get_where('tbl_menus', array('_id'=>$id))->row_array();
        if ($rows['status'] == 0){
            $aktif = '1';
        }else{
            $aktif = '0';
        }
        $result = $this->gmodel->update('tbl_menus',array('status'=>$aktif), array('_id'=>$id));
        if ($result){
            echo json_encode(array('message'=> 'User  Aktif or Non Aktif Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function hakAkses(){
        $data['title']  = 'Hak Akses User';
        $data['subtitle']  = 'List Jabatan yang akan diberi akses';
        $data['description']  = 'Data ini digunakan untuk ';
        $data['link']  = base_url().'jabatan/getData';
        $data['akses']  = true;
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $this->template->load('template','master/jabatan',$data);
    }

    function akses(){
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['title'] = 'Geser Untuk Memberikan Akses';
        $data['level'] = $this->db->get_where('tbl_levels',array('id_jabatan'=> $this->uri->segment(3)))->row_array();
        $data['menus'] = $this->db->get_where('tbl_menus',array('id_main !='=>null))->result();
        $this->template->load('template','master/akses',$data);
    }
    function approve(){
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['title'] = 'Geser Untuk Memberikan Akses';
        $data['level'] = $this->db->get_where('tbl_levels',array('id_jabatan'=> $this->uri->segment(3)))->row_array();
        $data['menus'] = $this->db->get('tbl_progress')->result();
        $this->template->load('template','master/approve',$data);
    }
    function aksesMenu(){
        $id_menu        = $this->input->get('menu_id');
        $id_jabatan     = $this->input->get('level');
        // chek data
        $params = array('id_menu'=>$id_menu,'id_jabatan'=>$id_jabatan);
        $akses = $this->db->get_where('tbl_levels',$params);
        if($akses->num_rows()<1){
            // insert data baru
            $this->db->insert('tbl_levels',$params);
        }else{
            $this->db->where('id_menu',$id_menu);
            $this->db->where('id_jabatan',$id_jabatan);
            $this->db->delete('tbl_levels');
        }
    }
    function aksesProgress(){
        $id             = $this->input->get('progress_id');
        $id_jabatan     = $this->input->get('level');
        // chek data
        $params = array('id_progress'=>$id,'id_jabatan'=>$id_jabatan);
        $akses = $this->db->get_where('tbl_privilege',$params);
        if($akses->num_rows()<1){
            // insert data baru
            $this->db->insert('tbl_privilege',$params);
        }else{
            $this->db->where('id_progress',$id);
            $this->db->where('id_jabatan',$id_jabatan);
            $this->db->delete('tbl_privilege');
        }
    }
    function alur(){
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $data['title'] = 'Data Alur Proses';
        $data['subtitle'] = 'Urutan Alur Pengajuan';
        $data['description'] = 'Hati Hati Merubah Data Ini Artinya Merubah Alur Pengajuan';
        $this->template->load('template','master/alur',$data);
    }
    function getDataAlur(){
        $result =  $this->pmodel->getAlur();
        echo json_encode($result);
    }
    function getProgress(){
        $this->output->set_content_type('application/json');
        $result = $this->pmodel->getProgress()->result();
        echo json_encode($result);
    }
    function saveAlur(){
        $id     = $this->input->post('id_progress', TRUE);
        $urutan = $this->input->post('urutan', TRUE);
        $data = array();
        $data = array(
            'id_progress'   => $id,
            'ordinal'       => $urutan,
        );
        $result = $this->gmodel->insert('tbl_alur',$data);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function updateAlur(){

    }
    function deleteAlur(){

    }
}
