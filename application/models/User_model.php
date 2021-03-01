<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getAll(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'u._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        $this->db->select('u.*,b.nama_bidang,j.nama_jabatan');
        $this->db->from('tbl_users u');
        $this->db->join('tbl_bidang b','b._id = u.id_bidang','LEFT');
        $this->db->join('tbl_jabatan j','j._id = u.id_jabatan','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('u.nama_user',$search,'both');
            $this->db->or_like('j.nama_jabatan',$search,'both');
            $this->db->or_like('b.nama_bidang',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get()->num_rows();
        $this->db->select('u.*,b.nama_bidang,j.nama_jabatan');
        $this->db->from('tbl_users u');
        $this->db->join('tbl_bidang b','b._id = u.id_bidang','LEFT');
        $this->db->join('tbl_jabatan j','j._id = u.id_jabatan','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('u.nama_user',$search,'both');
            $this->db->or_like('j.nama_jabatan',$search,'both');
            $this->db->or_like('b.nama_bidang',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }
}