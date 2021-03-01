<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getAll(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'tp._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress, (SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
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
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress, (SELECT nama_user FROM tbl_users WHERE _id = tp.id_pptk) as nama_pptk');
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
    function getIsRekening($id){
        $this->db->select('*');
        $this->db->from('tbl_rekening_kegiatan');
        $this->db->where('id_sub',$id);
        $this->db->where('status','1');
        $query = $this->db->get();
        return $query;
    }
    function getDetail($nPermohonan){
        $this->db->select('pd.*,nama_program, kode_rekening, kode_program, kode_sub, kode_rekening, kode_kegiatan,r._id, nama_kegiatan, nama_sub, nama_rekening, jumlah, pagu, (SELECT SUM(pdd.jumlah) from tbl_pencairan pc JOIN tbl_pengajuan pjj ON pjj.kode_pengajuan = pc.kode_pengajuan JOIN tbl_pengajuan_detail pdd on pdd.kode_pengajuan = pjj.kode_pengajuan WHERE pdd.id_rekening = r._id GROUP BY pdd.id_rekening) as total');
        $this->db->from('tbl_pengajuan_detail pd');
        $this->db->join('tbl_program p','p._id = pd.id_program');
        $this->db->join('tbl_kegiatan k','k._id = pd.id_kegiatan');
        $this->db->join('tbl_sub_kegiatan s','s._id = pd.id_sub');
        $this->db->join('tbl_rekening_kegiatan r','r._id = pd.id_rekening');
        $this->db->where('pd.kode_pengajuan',$nPermohonan);
        return $this->db->get();
    }
    function getDetailPencairan($id){
        $this->db->select('pd.jumlah');
        $this->db->from('tbl_pencairan pc');
        $this->db->join('tbl_pengajuan p','p._id = pc.id_pengajuan');
        $this->db->join('tbl_pengajuan_detail pd','pd.kode_pengajuan = p.kode_pengajuan');
        $this->db->where('pc.id_pengajuan',$id);
        return $this->db->get();
    }
    function getDetailNew($nPermohonan){
        $this->db->select('kode_rekening, kode_program, kode_sub, kode_kegiatan, nama_rekening, keterangan, satuan, harga, total, pr.jumlah');
        $this->db->from('tbl_pengajuan_detail pd');
        $this->db->join('tbl_program p','p._id = pd.id_program');
        $this->db->join('tbl_kegiatan k','k._id = pd.id_kegiatan');
        $this->db->join('tbl_sub_kegiatan sk','sk._id = pd.id_sub');
        $this->db->join('tbl_rekening_kegiatan rk','rk._id = pd.id_rekening');
        $this->db->join('tbl_pengajuan_rincian pr','pr.id_pengajuan_detail = pd._id');
        $this->db->where('pd.kode_pengajuan', $nPermohonan);
        return $this->db->get();
    }
    function getDetailBku($nPermohonan){
        $this->db->select('kode_rekening, kode_program, kode_sub, kode_kegiatan, nama_rekening, pr.*');
        $this->db->from('tbl_pengajuan_detail pd');
        $this->db->join('tbl_program p','p._id = pd.id_program');
        $this->db->join('tbl_kegiatan k','k._id = pd.id_kegiatan');
        $this->db->join('tbl_sub_kegiatan sk','sk._id = pd.id_sub');
        $this->db->join('tbl_rekening_kegiatan rk','rk._id = pd.id_rekening');
        $this->db->join('tbl_pengajuan_rincian pr','pr.id_pengajuan_detail = pd._id');
        $this->db->where('pd.kode_pengajuan', $nPermohonan);
        return $this->db->get();
    }
    function getPengajuan($nPermohonan){
        $this->db->select('tp.*,us.nama_user,bd.nama_bidang,nama_progress');
        $this->db->from('tbl_pengajuan tp');
        $this->db->join('tbl_users us', 'us._id = tp.id_user','LEFT');
        $this->db->join('tbl_bidang bd', 'bd._id = tp.id_bidang','LEFT');
        $this->db->join('tbl_alur al', 'al.ordinal = tp.status','LEFT');
        $this->db->join('tbl_progress prg', 'prg._id = al.id_progress','LEFT');
        $this->db->where('tp.kode_pengajuan',$nPermohonan);
        return $this->db->get();
    }
    function getStatusProgress(){
        $this->db->select('*');
        $this->db->from('tbl_alur');
        $this->db->order_by('ordinal','ASC');
        $this->db->limit(1,1);
        return $this->db->get()->row();
    }
    function getPencairan(){
        $offset = $this->input->get('offset')!=null ? intval($this->input->get('offset')) : 0;
        $limit = $this->input->get('limit')!=null ? intval($this->input->get('limit')) : 20;
        $sort = $this->input->get('sort')!=null ? strval($this->input->get('sort')) : 'pr._id';
        $order = $this->input->get('order')!=null ? strval($this->input->get('order')) : 'DESC';
        $search = $this->input->get('search')!=null ? strval($this->input->get('search')) : '';
        $this->db->select('pr.*, nama_user, nama_bidang, pg.nama_progress as status, pj.created_at as tgl_pengajuan');
        $this->db->from('tbl_pencairan pr');
        $this->db->join('tbl_pengajuan pj','pj._id = pr.id_pengajuan');
        $this->db->join('tbl_users u','u._id = pj.id_user');
        $this->db->join('tbl_bidang b','b._id = pj.id_bidang');
        $this->db->join('tbl_alur a','a._id = pj.status');
        $this->db->join('tbl_progress pg','pg._id = a.id_progress');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('pr.kode_pencairan',$search,'both');
            $this->db->or_like('pr.kode_pengajuan',$search,'both');
            $this->db->or_like('b.nama_bidang',$search,'both');
            $this->db->or_like('u.nama_user',$search,'both');
            $this->db->group_end();
        }
        $result['total'] = $this->db->get()->num_rows();
        $this->db->select('pr.*, nama_user, nama_bidang, pg.nama_progress as status, pj.created_at as tgl_pengajuan');
        $this->db->from('tbl_pencairan pr');
        $this->db->join('tbl_pengajuan pj','pj._id = pr.id_pengajuan');
        $this->db->join('tbl_users u','u._id = pj.id_user');
        $this->db->join('tbl_bidang b','b._id = pj.id_bidang');
        $this->db->join('tbl_alur a','a._id = pj.status');
        $this->db->join('tbl_progress pg','pg._id = a.id_progress');
        if($this->input->get('search')){
            $this->db->group_start();
            $this->db->like('pr.kode_pencairan',$search,'both');
            $this->db->or_like('pr.kode_pengajuan',$search,'both');
            $this->db->or_like('b.nama_bidang',$search,'both');
            $this->db->or_like('u.nama_user',$search,'both');
            $this->db->group_end();
        }
        $this->db->order_by($sort,$order);
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        $item = $query->result_array();    
        $result = array_merge($result, ['rows' => $item]);
        return $result;
    }
    function getPPTK(){
        $this->db->select('_id as idpptk, nama_user as nama');
        $this->db->from('tbl_users');
        $this->db->where('id_jabatan',3);
        return $this->db->get();
    }
}