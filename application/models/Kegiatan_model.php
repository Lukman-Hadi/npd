<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getAll(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 10;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'k._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        $this->db->select('k.*,p.kode_program,(SELECT SUM(pagu) FROM tbl_rekening_kegiatan WHERE id_kegiatan = k._id) as total');
        $this->db->from('tbl_kegiatan k');
        $this->db->join('tbl_program p', 'p._id = k.id_program','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('k.kode_kegiatan',$search,'both');
            $this->db->or_like('k.nama_kegiatan',$search,'both');
            $this->db->or_like('p.kode_program',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get()->num_rows();

        $this->db->select('k.*,p.kode_program,(SELECT SUM(pagu) FROM tbl_rekening_kegiatan WHERE id_kegiatan = k._id) as total');
        $this->db->from('tbl_kegiatan k');
        $this->db->join('tbl_program p', 'p._id = k.id_program','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('k.kode_kegiatan',$search,'both');
            $this->db->or_like('k.nama_kegiatan',$search,'both');
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
        $this->db->from('tbl_kegiatan');
        $this->db->where('id_program',$id);
        $this->db->where('status','1');
        $query = $this->db->get();
        return $query;
    }
}