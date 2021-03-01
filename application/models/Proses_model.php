<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proses_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getAll(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : '_id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'ASC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        if($this->input->get('search')){
            $this->db->like('nama_progress',$search,'both');
        }
        $result['total'] = $this->db->get('tbl_progress')->num_rows();

        if($this->input->get('search')){
            $this->db->like('nama_progress',$search,'both');
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get('tbl_progress');
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }
    function getMenus(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : '_id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'ASC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        $this->db->select('*,(SELECT judul FROM tbl_menus b WHERE b._id = a.id_main) as main');
        $this->db->from('tbl_menus a');
        if($this->input->get('search')){
            $this->db->like('judul',$search,'both');
        }
        $result['total'] = $this->db->get()->num_rows();

        $this->db->select('*,(SELECT judul FROM tbl_menus b WHERE b._id = a.id_main) as main');
        $this->db->from('tbl_menus a');
        if($this->input->get('search')){
            $this->db->like('judul',$search,'both');
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }
    function getIsMainMenu(){
        $query=$this->db->get_where('tbl_menus',array('id_main'=>'1'))->result();
        return $query;
    }
    function getAlur(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'a.ordinal';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'ASC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        $this->db->select('pg.nama_progress, a.ordinal');
        $this->db->from('tbl_alur a');
        $this->db->join('tbl_progress pg','pg._id = a.id_progress','LEFT');
        if($this->input->get('search')){
            $this->db->like('pg.nama_progress',$search,'both');
        }
        $result['total'] = $this->db->get()->num_rows();

        $this->db->select('pg.nama_progress, a.ordinal');
        $this->db->from('tbl_alur a');
        $this->db->join('tbl_progress pg','pg._id = a.id_progress','LEFT');
        if($this->input->get('search')){
            $this->db->like('pg.nama_progress',$search,'both');
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }
    function getProgress(){
        return $this->db->get('tbl_progress');
    }
}