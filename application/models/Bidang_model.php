<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bidang_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getAll(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'tbl_bidang._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tbl_bidang.nama_bidang',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get('tbl_bidang')->num_rows();

        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tbl_bidang.nama_bidang',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get('tbl_bidang');
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }
    function getIsBidang(){
        $query=$this->db->get_where('tbl_bidang',array('status'=>'1'))->result();
        return $query;
    }
}