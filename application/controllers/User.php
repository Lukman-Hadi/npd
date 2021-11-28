<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!is_login())redirect(site_url('login'));
        $this->load->model('User_model','umodel');
        $this->load->model('Global_model','gmodel');
    }

	function index(){
        $data['title']  = 'Data User';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/js/user.js';
        $this->template->load('template','master/user',$data);
    }

    function getData(){
        $result =  $this->umodel->getAll();
        echo json_encode($result);
    }


    function save()
    {
        $nama           = $this->input->post('nama_user', TRUE);
        $username       = $this->input->post('username', TRUE);
        $password       = $this->input->post('pswd',TRUE);
        $options        = array("cost"=>4);
        $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
        $email          = $this->input->post('email', TRUE);
        $alamat         = $this->input->post('alamat', TRUE);
        $phone          = $this->input->post('no_hp', TRUE);
        $id_bidang      = $this->input->post('id_bidang', TRUE);
        $id_jabatan     = $this->input->post('id_jabatan', TRUE);
        $image          = $this->upload_users();
        if ($image['file_name'] == '') {
             $data = array(
                'uname'        => $username,
                'pswd'         => $hashPassword,
                'email'        => $email,
                'nama_user'    => $nama,
                'alamat'       => $alamat,
                'no_hp'        => $phone,
                'id_bidang'    => $id_bidang,
                'id_jabatan'   => $id_jabatan
            );
        }else{
             $data = array(
                'uname'        => $username,
                'pswd'         => $hashPassword,
                'email'        => $email,
                'nama_user'    => $nama,
                'alamat'       => $alamat,
                'no_hp'        => $phone,
                'id_bidang'    => $id_bidang,
                'id_jabatan'   => $id_jabatan,
                'foto'         => $image['file_name']
            );
        }
        $result = $this->gmodel->insert('tbl_users',$data);
        if ($result){
            echo json_encode(array('message'=>'Save Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function upload_users(){
        $config['upload_path']          = './assets/avatars';
        $config['allowed_types']        = 'gif|jpg|jpeg|bmp|png|PNG|JPEG|JPG|GIF|BMP';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        return $this->upload->data();
    }
    function delete()
    {
        $id = $this->input->post('id');
        $search=$this->db->get_where('tbl_users',array('_id'=>$id))->row_array();
        $img=$search['foto'];
        $path='./assets/avatars/';
        if ($img != ''){
           unlink($path.$img); 
        }
        $result = $this->gmodel->delete('tbl_users',array('_id'=>$id));
        if ($result){
            echo json_encode(array('message'=>'Deleted Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function aktif()
    {
        $id = $this->input->post('id',TRUE);
        $rows = $this->db->get_where('tbl_users', array('_id'=>$id))->row_array();
        if ($rows['status'] == 0){
            $aktif = '1';
        }else{
            $aktif = '0';
        }
        $result = $this->gmodel->update('tbl_users',array('status'=>$aktif), array('_id'=>$id));
        if ($result){
            echo json_encode(array('message'=> 'User  Aktif or Non Aktif Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
    function update()
    {
        $nama           = $this->input->post('nama_user', TRUE);
        $username       = $this->input->post('username', TRUE);
        $password       = $this->input->post('pswd',TRUE);
        $options        = array("cost"=>4);
        $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
        $email          = $this->input->post('email', TRUE);
        $alamat         = $this->input->post('alamat', TRUE);
        $phone          = $this->input->post('no_hp', TRUE);
        $id_bidang      = $this->input->post('id_bidang', TRUE);
        $id_jabatan     = $this->input->post('id_jabatan', TRUE);
        $image          = $this->upload_users();
        if ($image['file_name'] == '') {
            if ($password == ''){
                $data = array(
                    'uname'        => $username,
                    'email'        => $email,
                    'nama_user'    => $nama,
                    'alamat'       => $alamat,
                    'no_hp'        => $phone,
                    'id_bidang'    => $id_bidang,
                    'id_jabatan'   => $id_jabatan
                );
            }else{
                $data = array(
                    'uname'        => $username,
                    'pswd'         => $hashPassword,
                    'email'        => $email,
                    'nama_user'    => $nama,
                    'alamat'       => $alamat,
                    'no_hp'        => $phone,
                    'id_bidang'    => $id_bidang,
                    'id_jabatan'   => $id_jabatan
                );
            }        
        }else{
            if ($password == ''){
                $data = array(
                    'uname'        => $username,
                    'email'        => $email,
                    'nama_user'    => $nama,
                    'alamat'       => $alamat,
                    'no_hp'        => $phone,
                    'id_bidang'    => $id_bidang,
                    'id_jabatan'   => $id_jabatan,
                    'foto'         => $image['file_name']
                );
            }else{
                $data = array(
                    'uname'        => $username,
                    'pswd'         => $hashPassword,
                    'email'        => $email,
                    'nama_user'    => $nama,
                    'alamat'       => $alamat,
                    'no_hp'        => $phone,
                    'id_bidang'    => $id_bidang,
                    'id_jabatan'   => $id_jabatan,
                    'foto'         => $image['file_name']
                );
            }
             
        }
        $where = array('_id'=>$this->input->get('id'));
        $result = $this->gmodel->update('tbl_users',$data, $where);
        if ($result){
            echo json_encode(array('message'=>'Update Success'));
        } else {
            echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
    }
}