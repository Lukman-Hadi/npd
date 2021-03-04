<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekening_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getAll(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'r._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        $this->db->select('r.*,k.kode_kegiatan, p.kode_program, s.kode_sub');
        $this->db->from('tbl_rekening_kegiatan r');
        $this->db->join('tbl_sub_kegiatan s', 's._id = r.id_sub','LEFT');
        $this->db->join('tbl_kegiatan k', 'k._id = s.id_kegiatan','LEFT');
        $this->db->join('tbl_program p', 'p._id = k.id_program','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('r.kode_rekening',$search,'both');
            $this->db->or_like('r.nama_rekening',$search,'both');
            $this->db->or_like('s.kode_sub',$search,'both');
            $this->db->or_like('k.kode_kegiatan',$search,'both');
            $this->db->or_like('p.kode_program',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get()->num_rows();

        $this->db->select('r.*,k.kode_kegiatan, p.kode_program, s.kode_sub');
        $this->db->from('tbl_rekening_kegiatan r');
        $this->db->join('tbl_sub_kegiatan s', 's._id = r.id_sub','LEFT');
        $this->db->join('tbl_kegiatan k', 'k._id = s.id_kegiatan','LEFT');
        $this->db->join('tbl_program p', 'p._id = k.id_program','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('r.kode_rekening',$search,'both');
            $this->db->or_like('r.nama_rekening',$search,'both');
            $this->db->or_like('s.kode_sub',$search,'both');
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
    function getIsRekening($id){
        $this->db->select('*');
        $this->db->from('tbl_rekening_kegiatan');
        $this->db->where('id_sub',$id);
        $this->db->where('status','1');
        $query = $this->db->get();
        return $query;
    }
    function getAkumulasi($id){
        $this->db->select('pd.jumlah');
        $this->db->from('tbl_pencairan pr');
        $this->db->join('tbl_pengajuan pj','pj._id = pr.id_pengajuan','LEFT');
        $this->db->join('tbl_pengajuan_detail pd','pd.kode_pengajuan = pj.kode_pengajuan','LEFT');
        $this->db->where('pd.id_rekening',$id);
        return $this->db->get();
    }
}