<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!is_login())redirect(site_url('login'));
        $this->load->model('Statistik_model','smodel');
    }

	function index(){
        $data['title']  = 'Cka Pot';
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . '';
        // $data['css_files'][] = base_url() . 'assets/admin/easyui/themes/icon.css';
        $data['js_files'][] = base_url() . '';
        // $data['js_files'][] = base_url() . 'assets/admin/easyui/datagrid-groupview.js';
        // $data['js_files'][] = base_url() . 'assets/admin/easyui/plugins/datagrid-scrollview.js';
        // $data['js_files'][] = base_url() . 'assets/admin/js/menu.js';
        $this->template->load('template','dashboard',$data);
    }

    function getPencairanBulan(){
        $this->output->set_content_type('application/json');
        $data = $this->smodel->pencairanBulan();
        $result = array();
        $bulan = array_keys($data);
        $i = 0;
        foreach($data as $d){   
            $result[]=array(
                "month" => $bulan[$i],
                "value" => $d
            );
            $i++;
        }
        echo json_encode($result);
    }

}
