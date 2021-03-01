<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Approve_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function canApproveCheckM($idProgress){
        $this->db->select('ordinal');
        $this->db->from('tbl_alur');
        $this->db->where_in('id_progress',$idProgress);
        return $this->db->get()->result();
    }
    function getProgress($ordinal){
        $this->db->select('id_progress');
        $this->db->from('tbl_alur');
        $this->db->where_in('ordinal',$ordinal);
        return $this->db->get()->result();
    }
    function getApprovalByBidang($bidang,$hak){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 10;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'tp._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress,al.status as kunci, (SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        $this->db->where('tp.id_bidang',$bidang);
        $this->db->where_in('tp.status',$hak);
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tp.kode_pengajuan',$search,'both');
            $this->db->or_like('us.nama_user',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $result = $this->db->get();
        return $result;
    }

    function getApprovalByPPTK($id, $hak){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 10;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'tp._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress,al.status as kunci, (SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        $this->db->where('tp.id_pptk',$id);
        $this->db->where_in('tp.status',$hak);
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tp.kode_pengajuan',$search,'both');
            $this->db->or_like('us.nama_user',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get()->num_rows();
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress,al.status as kunci, (SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        $this->db->where('tp.id_pptk',$id);
        $this->db->where_in('tp.status',$hak);
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tp.kode_pengajuan',$search,'both');
            $this->db->or_like('us.nama_user',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }
    function getApprovalByPengaju($id, $hak){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 10;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'tp._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress,al.status as kunci, (SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        $this->db->where('tp.id_user',$id);
        $this->db->where_in('tp.status',$hak);
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tp.kode_pengajuan',$search,'both');
            $this->db->or_like('us.nama_user',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get()->num_rows();
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress,al.status as kunci, (SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        $this->db->where('tp.id_user',$id);
        $this->db->where_in('tp.status',$hak);
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tp.kode_pengajuan',$search,'both');
            $this->db->or_like('us.nama_user',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }

    function getApproveTotalByBidang($bidang,$hak){
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress, (SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        $this->db->where('tp.id_bidang',$bidang);
        $this->db->where_in('tp.status',$hak);
        $result = $this->db->get();
        return $result;
    }
    function getApproval($hak){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 10;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'tp._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress, al.status as kunci, (SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        $this->db->where_in('tp.status',$hak);
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tp.kode_pengajuan',$search,'both');
            $this->db->or_like('us.nama_user',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $result = $this->db->get();
        return $result;
    }
    function getApproveTotal($hak){
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress,(SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        $this->db->where_in('tp.status',$hak);
        $result = $this->db->get();
        return $result;
    }
    function getApprovals($id,$bidang,$jabatan){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 10;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'k._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';

        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tp.kode_pengajuan',$search,'both');
            $this->db->or_like('us.nama_user',$search,'both');
            $this->db->or_like('bd.nama_bidang',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get()->num_rows();

        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress as status');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('tp.kode_pengajuan',$search,'both');
            $this->db->or_like('us.nama_user',$search,'both');
            $this->db->or_like('bd.nama_bidang',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }
    function isRekeningRincian($kode){
        $this->db->select('p.*, pr._id as rincian_id, keterangan,satuan,harga,total, pr.jumlah, r.kode_rekening,r.nama_rekening');
        $this->db->from('tbl_pengajuan_detail p');
        $this->db->join('tbl_rekening_kegiatan r','p.id_rekening = r._id','LEFT');
        $this->db->join('tbl_pengajuan_rincian pr','pr.id_pengajuan_detail = p._id','LEFT');
        $this->db->where('kode_pengajuan',$kode);
        return $this->db->get();
    }
    function isRekeningRincianNew($kode){
        $this->db->select('p.*, pr._id as rincian_id, pr.*, r.kode_rekening,r.nama_rekening');
        $this->db->from('tbl_pengajuan_rincian pr');
        $this->db->join('tbl_pengajuan_detail p','p._id = pr.id_pengajuan_detail','LEFT');
        $this->db->join('tbl_rekening_kegiatan r','p.id_rekening = r._id','LEFT');
        $this->db->where('kode_pengajuan',$kode);
        $this->db->where('bukti is NULL',null, false);
        return $this->db->get();
    }
}