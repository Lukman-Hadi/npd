<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subkegiatan_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getAll(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 's._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        $this->db->select('s.*,k.kode_kegiatan, p.kode_program, (SELECT SUM(pagu) FROM tbl_rekening_kegiatan WHERE id_sub = s._id) as total');
        $this->db->from('tbl_sub_kegiatan s');
        $this->db->join('tbl_kegiatan k', 'k._id = s.id_kegiatan','LEFT');
        $this->db->join('tbl_program p', 'p._id = k.id_program','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('s.kode_sub',$search,'both');
            $this->db->or_like('s.nama_sub',$search,'both');
            $this->db->or_like('k.kode_kegiatan',$search,'both');
            $this->db->or_like('p.kode_program',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get()->num_rows();

        $this->db->select('s.*,k.kode_kegiatan, p.kode_program,(SELECT SUM(pagu) FROM tbl_rekening_kegiatan WHERE id_sub = s._id) as total');
        $this->db->from('tbl_sub_kegiatan s');
        $this->db->join('tbl_kegiatan k', 'k._id = s.id_kegiatan','LEFT');
        $this->db->join('tbl_program p', 'p._id = k.id_program','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('s.kode_sub',$search,'both');
            $this->db->or_like('s.nama_sub',$search,'both');
            $this->db->or_like('k.kode_kegiatan',$search,'both');
            $this->db->or_like('p.kode_program',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }

    function getIsKegiatan($id){
        $this->db->select('*');
        $this->db->from('tbl_sub_kegiatan');
        $this->db->where('id_kegiatan',$id);
        $this->db->where('status','1');
        $query = $this->db->get();
        return $query;
    }
}