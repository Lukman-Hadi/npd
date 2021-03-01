<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
}
