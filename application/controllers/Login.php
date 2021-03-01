<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(is_login())redirect(site_url('home'));
        $this->load->model('Login_model','login_model');
    }

    public function index(){
        $this->load->view('auth/login');
    }

    public function doLogin()
    {
        $username = $this->input->post('username');
        $p = $this->input->post('password');
        $password = password_verify($p,PASSWORD_DEFAULT);
        $query = $this->login_model->getLogin($username)->row_array();
        if($query){
            if(password_verify($p,$query['pswd'])){
                if ($query['status'] == 1){
                    $this->session->set_userdata($query);
                    echo json_encode(array('message'=>'Login Success'));
                }else{
                    echo json_encode(array('errorMsg'=>'Akun Tidak Aktif'));
                }
            }else{
                echo json_encode(array('errorMsg'=>'Password Salah'));
            }
        }else{
            echo json_encode(array('errorMsg'=>'User Tidak Ada'));
        }        
    }
}