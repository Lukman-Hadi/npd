<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Program_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getAll(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'tbl_program._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        $this->db->select('tbl_program.*,nama_bidang,(SELECT SUM(pagu) FROM tbl_rekening_kegiatan WHERE id_program = tbl_program._id) as total');
        $this->db->from('tbl_program');
        $this->db->join('tbl_bidang','tbl_bidang._id = tbl_program.id_bidang');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tbl_program.kode_program',$search,'both');
            $this->db->or_like('tbl_program.nama_program',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get()->num_rows();

        $this->db->select('tbl_program.*,nama_bidang,(SELECT SUM(pagu) FROM tbl_rekening_kegiatan WHERE id_program = tbl_program._id) as total');
        $this->db->from('tbl_program');
        $this->db->join('tbl_bidang','tbl_bidang._id = tbl_program.id_bidang');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tbl_program.kode_program',$search,'both');
            $this->db->or_like('tbl_program.nama_program',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }
    function getIsProgram(){
        $query=$this->db->get_where('tbl_program',array('status'=>'1'))->result();
        return $query;
    }
}