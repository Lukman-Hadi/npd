<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approve extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!is_login())redirect(site_url('login'));
        $this->load->model('Approve_model','amodel');
        $this->load->model('Transaksi_model','tmodel');
        $this->load->model('Global_model','gmodel');
    }

	function index(){
        $data['title']  = 'Pengajuan Dalam Proses';
        $data['subtitle']  = 'Daftar Pengajuan Dalam Proses';
        $data['description'] = 'Pengajuan yang menunggu untuk ditinjau oleh dirimu';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $this->template->load('template','approve/index',$data);
    }

    function getApprove(){
        $idBidang   = $this->session->id_bidang;
        $userCanApprove = canApproveCheck();
        // var_dump($userCanApprove);
        $who = superCheck();
        $ispptk = pptkCheck();
        if($who){
            $result['total'] = $this->amodel->getApproveTotal($userCanApprove)->num_rows();
            $item = $this->amodel->getApproval($userCanApprove)->result();
            $result = array_merge($result, ['rows' => $item]);
        }else if($ispptk){
            $result = $this->amodel->getApprovalByPPTK($this->session->_id,$userCanApprove);
        }else if($this->session->id_jabatan == 6){
            $result = $this->amodel->getApprovalByPengaju($this->session->_id,$userCanApprove);  
        }else{
            $result['total'] = $this->amodel->getApproveTotalByBidang($idBidang,$userCanApprove)->num_rows();
            $item = $this->amodel->getApprovalByBidang($idBidang,$userCanApprove)->result();
            $result = array_merge($result, ['rows' => $item]);   
        }
        $this->output->set_content_type('application/json');
        echo json_encode($result);
    }
    function detail(){
        $nPermohonan = $this->uri->segment(3);
        $data['permohonan']= $this->tmodel->getPengajuan($nPermohonan)->row();
        $data['detail']= $this->tmodel->getDetail($nPermohonan)->result();
        $data['title'] = 'PENGAJUAN NO'.$nPermohonan;
        $data['approve'] = true;
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/form/form.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/pdfobject/pdfobject.min.js';
        $this->template->load('template','transaksi/detail',$data);
        // $this->output->set_content_type('application/json');
        // echo json_encode($this->tmodel->getDetailNew($nPermohonan)->result());
    }
    function getDetail(){
        $nPermohonan = $this->uri->segment(3);
        $data = $this->tmodel->getDetailNew($nPermohonan)->result();
        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }
    function getDetailBku(){
        $nPermohonan = $this->uri->segment(3);
        $data = $this->tmodel->getDetailBku($nPermohonan)->result();
        $modified = array();
        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }
    function getDetailBkuPrint(){
        $nPermohonan = $this->uri->segment(3);
        $data = $this->tmodel->getDetailBku($nPermohonan)->result();
        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }
    //insert to tbl-progress, update tbl pengajuan,
    function approve(){
        $idPengajuan    = $this->input->post('id');
        $note           = $this->input->post('catatan');
        $idUser         = $this->session->_id;
        $old            = $this->db->get_where('tbl_pengajuan',array('_id'=>$idPengajuan))->row();
        if($old->status == 0){
            $status     = $old->status+2;
        }else{
            $status     = $old->status+1;
        }
        
        if(cekAlur($status)->status != null){
            $kegiatan = $this->tmodel->getDetail($old->kode_pengajuan)->row();
            $pencairan = $this->db->get_where('tbl_pencairan',array('prefix'=>$kegiatan->kode_kegiatan))->num_rows();
            $nomor = nomorPencairan($pencairan,$kegiatan->kode_kegiatan);
            $data = array(
                'id_pengajuan'      =>$idPengajuan,
                'kode_pencairan'    =>$nomor,
                'kode_pengajuan'    =>$old->kode_pengajuan,
                'total'             =>$old->total,
                'id_auditor'        =>$idUser,
                'prefix'            =>$kegiatan->kode_kegiatan,
                'tgl_pencairan'     =>date('Y-m-d'),
            );
            $this->gmodel->insert('tbl_pencairan',$data);
        }
        $result         = $this->gmodel->update('tbl_pengajuan',array('status'=>$status),array('_id'=>$idPengajuan));
        if($result){
            $result     = $this->gmodel->insert('tbl_progress_pengajuan',array('id_pengajuan'=>$idPengajuan,'ordinal'=>$status,'id_user'=>$idUser,'catatan'=>$note));
            if($result){
                echo json_encode(array('message'=>'Add Success'));
            }
        }else{
            echo json_encode(array('errorMsg'=>'Gagal'));
        } 
    }
    function approveCair($data){
        
    }

    function reject(){
        $idPengajuan    = $this->input->post('id');
        $note           = $this->input->post('catatan');
        $idUser         = $this->session->_id;
        $old            = $this->db->get_where('tbl_pengajuan',array('_id'=>$idPengajuan))->row();
        $spj            = $this->db->get_where('tbl_alur',array('status'=>1))->row()->ordinal;
        if($old->status <= $spj){
            $status = 0;
        }else{
            $status = $spj;
        }
        $result         = $this->gmodel->update('tbl_pengajuan',array('status'=>$status),array('_id'=>$idPengajuan));
        if($result){
            $result     = $this->gmodel->insert('tbl_progress_pengajuan',array('id_pengajuan'=>$idPengajuan,'ordinal'=>$status,'id_user'=>$idUser,'catatan'=>$note));
            if($result){
                echo json_encode(array('message'=>'Add Success'));
            }
        }else{
            echo json_encode(array('errorMsg'=>'Gagal'));
        }
    }
    function bku(){
        $nPermohonan = $this->input->get('id');
        $data['permohonan']= $this->tmodel->getPengajuan($nPermohonan)->row();
        $data['detail']= $this->tmodel->getDetail($nPermohonan)->result();
        $data['title']  = 'PENGAJUAN NO '.$nPermohonan;
        $data['collapsed'] = '';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2.min.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/select2/dist/css/select2-bootstrap.css';
        $data['css_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.css';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/bootstrap-table.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/select2/dist/js/select2.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/form/form.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/pdfobject/pdfobject.min.js';
        $data['js_files'][] = base_url() . 'assets/admin/vendor/emodal/eModal.min.js';
        $this->template->load('template','approve/bkubaru',$data);
    }
    function isRekening(){
        $kode = $this->input->get('kode');
        $rekening = $this->amodel->isRekeningRincianNew($kode)->result();
        $data = array();
        // if($this->session->has_userdata('cartbku')){
        //     foreach($rekening as $d){
        //         $idRekening = $d->id_rekening;
        //         $jumlah = $d->jumlah;
        //         $cartbku = unserialize($this->session->userdata('cartbku'));
        //         foreach($cartbku as $c){
        //             $index = $this->cartIsExist($idRekening);
        //             if($index != -1){
        //                 $jumlahOnCart = $c['jumlah'];
        //                 $jumlah -= $jumlahOnCart;
        //             }
        //         }
        //         $data[] = array(
        //             '_id'=>$d->_id,
        //             'kode_rekening'=>$d->kode_rekening,
        //             'nama_rekening'=>$d->nama_rekening,
        //             'id_rekening'=>$d->id_rekening,
        //             'jumlah'=>$jumlah,
        //         );
        //     };
        if($this->session->has_userdata('cartbku')){
            $cartbku = unserialize($this->session->userdata('cartbku'));
            foreach($rekening as $r){
                $jumlah = $r->jumlah;
                $jumlahOnCart = 0;
                foreach($cartbku as $c){
                    if($r->_id == $c['idPengajuan'] && $c['idRekening']==$r->id_rekening){
                        $jumlahOnCart += $c['jumlah'];
                    }
                }
                $data[] = array(
                    '_id'=>$r->_id,
                    'kode_rekening'=>$r->kode_rekening,
                    'nama_rekening'=>$r->nama_rekening,
                    'id_rekening'=>$r->id_rekening,
                    'jumlah'=>$jumlah-$jumlahOnCart,
                );
            }
        }else{
            $data = $rekening;
        };
        $this->output->set_content_type('application/json');
        echo json_encode($data);
        // echo json_encode($kode);
    }
    function cartIsExist($id)
    {
        $cartbku = array_values(unserialize($this->session->userdata('cartbku')));
        for ($i = 0; $i < count($cartbku); $i ++) {
            if ($cartbku[$i]['idRekening'] == $id) {
                return $i;
            }
        }
        return -1;
    }
    function addToCartBkuOld(){
        $idPengajuan    = $this->input->post('id_pengajuan_detail');
        $kdPengajuan    = $this->input->post('kd_pengajuan');
        $keterangan     = $this->input->post('keterangan');
        $penerima       = $this->input->post('penerima');
        $satuan         = $this->input->post('satuan');
        $harga          = str_replace('.','',$this->input->post('harga'));
        $total          = str_replace('.','',$this->input->post('total'));
        $pph21          = str_replace('.','',$this->input->post('pph21'));
        $pph22          = str_replace('.','',$this->input->post('pph22'));
        $pph23          = str_replace('.','',$this->input->post('pph23'));
        $pphd           = str_replace('.','',$this->input->post('pphd'));
        $ppn            = str_replace('.','',$this->input->post('ppn'));
        $subtotal       = $total*$harga;
        $jumlah         = $subtotal+$pph21+$pph22+$pph23+$pphd+$ppn;
        $kdRekening     = $this->input->post('kd_rekening');
        $nmRekening     = $this->input->post('nm_rekening');
        $idRekening     = $this->input->post('id_rekening');
        $bukti          = $this->uploadBukti();
        $data = array();
        $data = array(
            '_id'=>uniqid('bku'),
            'idPengajuan'=>$idPengajuan,
            'kdPengajuan'=>$kdPengajuan,
            'keterangan'=>$keterangan,
            'penerima'=>$penerima,
            'satuan'=>$satuan,
            'harga'=>$harga,
            'total'=>$total,
            'pph21'=>$pph21,
            'pph22'=>$pph22,
            'pph23'=>$pph23,
            'pphd'=>$pphd,
            'ppn'=>$ppn,
            'subtotal'=>$subtotal,
            'jumlah'=>$jumlah,
            'kdRekening'=>$kdRekening,
            'nmRekening'=>$nmRekening,
            'idRekening'=>$idRekening,
            'bukti'=>$bukti['file_name']
        );
        if(!$this->session->has_userdata('cartbku')) {
            $cartbku = array($data);
            $result = $this->session->set_userdata('cartbku', serialize($cartbku));
        } else {
            $cartbku = array_values(unserialize($this->session->userdata('cartbku')));
            array_push($cartbku, $data);
            $result = $this->session->set_userdata('cartbku', serialize($cartbku));
        }
        echo json_encode(array('message'=>'Add Success'));
    }
    function addToCartBku(){
        $idPengajuan    = $this->input->post('id_pengajuan_rincian');
        $penerima       = $this->input->post('penerima');
        $pph21          = str_replace('.','',$this->input->post('pph21'));
        $pph22          = str_replace('.','',$this->input->post('pph22'));
        $pph23          = str_replace('.','',$this->input->post('pph23'));
        $pphd           = str_replace('.','',$this->input->post('pphd'));
        $ppn            = str_replace('.','',$this->input->post('ppn'));
        $jumlah         = str_replace('.','',$this->input->post('jumlah'));
        $subtotal       = $jumlah-($pph21+$pph22+$pph23+$pphd+$ppn);
        $buktiOld       = $this->db->get_where('tbl_pengajuan_rincian',array('_id'=>$idPengajuan))->row()->bukti;
        $bukti          = $this->uploadBukti();
        $data           = array();
        if($buktiOld != ''){
            if($bukti['file_name']!=''){
                $path = './assets/bukti/';
                unlink($path.$buktiOld);
                $data = array(
                    'penerima'=>$penerima,
                    'pph21'=>$pph21,
                    'pph22'=>$pph22,
                    'pph23'=>$pph23,
                    'pphd'=>$pphd,
                    'ppn'=>$ppn,
                    'subtotal'=>$subtotal,
                    'bukti'=>$bukti['file_name']
                );
            }else{
                $data = array(
                    'penerima'=>$penerima,
                    'pph21'=>$pph21,
                    'pph22'=>$pph22,
                    'pph23'=>$pph23,
                    'pphd'=>$pphd,
                    'ppn'=>$ppn,
                    'subtotal'=>$subtotal,
                );
            }
        }else{
            $data = array(
                'penerima'=>$penerima,
                'pph21'=>$pph21,
                'pph22'=>$pph22,
                'pph23'=>$pph23,
                'pphd'=>$pphd,
                'ppn'=>$ppn,
                'subtotal'=>$subtotal,
                'bukti'=>$bukti['file_name']
            );
        }
        $result = $this->gmodel->update('tbl_pengajuan_rincian',$data,array('_id'=>$idPengajuan));
        if($result){
            echo json_encode(array('message'=>'Add Success'));
        }else{
            echo json_encode(array('errorMsg'=>'Whoops Something Went Wrong'));
        }
    }

    function uploadBukti(){
        $config['upload_path']          = './assets/bukti/';
        $config['allowed_types']        = 'pdf';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('bukti');
        return $this->upload->data();
    }
    function showBku(){
        $cartbku = array();
        if($this->session->userdata('cartbku')){
            $cartbku = array_values(unserialize($this->session->userdata('cartbku')));
            $match = array_values(array_filter($cartbku, function($var){
                return ($var['kdPengajuan']== $this->input->get('kode'));
            }));
            echo json_encode($match);
        }else{
            echo json_encode($cartbku);
        }
    }
    function removeBku(){
        $id = $this->input->post('id');
        $path = './assets/bukti/';
        $cartbku = array_values(unserialize($this->session->userdata('cartbku')));
        for ($i = 0; $i < count($cartbku); $i ++) {
            if ($cartbku[$i]['_id'] == $id) {
                $bukti = $cartbku[$i]['bukti'];
                unlink($path.$bukti);
                unset($cartbku[$i]);
                $this->session->set_userdata('cartbku', serialize($cartbku));
                echo json_encode(array('message'=>'Delete Success'));
                break;
            }
        }
    }
    function saveBku(){
        
    }
    function saveBkuOld(){
        $data = array();
        if($this->session->userdata('cartbku')){
            $cartbku = array_values(unserialize($this->session->userdata('cartbku')));
            $match = array_values(array_filter($cartbku, function($var){
                return ($var['kdPengajuan']== $this->input->get('kode'));
            }));
            foreach($match as $m){
                $data[] = array(
                    'id_pengajuan_detail'=>$m->idPengajuan,
                    'keterangan'=>$m->keterangan,
                    'satuan'=>$m->satuan,
                    'harga'=>$m->harga,
                    'penerima'=>$m->penerima,
                    'total'=>$m->total,
                    'subtotal'=>$m->subtotal,
                    'pph21'=>$m->pph21,
                    'pph22'=>$m->pph22,
                    'pph23'=>$m->pph23,
                    'pphd'=>$m->pphd,
                    'ppn'=>$m->ppn,
                    'jumlah'=>$m->jumlah,
                    'bukti'=>$m->bukti,
                );
            }
            $result = $this->gmodel->insertbatch('tbl_pengajuan_rincian',$data);
            if($result){
                echo json_encode(array('message'=>'Add Success'));
            }else{
                echo json_encode(array('errorMsg'=>'Save Gagal'));
            }
            // echo json_encode($match);
        }else{
            echo json_encode(array('errorMsg'=>'Anda Belum Menginput Rincian'));
        }
    }
    function testsesi(){
        // $this->session->unset_userdata('cartbku');
        $this->output->set_content_type('application/json');
        echo json_encode(unserialize($this->session->cart));
    }

    // untuk Temporary Folder
    // function test(){
    //     unlink('./assets/bukti/');
    //     $t = copy('./assets/bukti/009bc78c40ec20fecd7e4ea22f2b5c1a.pdf','./assets/temp/test.pdf');
    //     if($t){
    //         echo 'masuk';
    //         unlink('./assets/bukti/009bc78c40ec20fecd7e4ea22f2b5c1a.pdf');
    //     }else{
    //         echo 'error';
    //     }
    // }
    function testFilter(){
        $this->output->set_content_type('application/json');
        $kode = $this->input->get('kode');
        $cartbku = array_values(unserialize($this->session->userdata('cartbku')));
        $match = array_filter($cartbku, function($var){
            return ($var['kdPengajuan']== $this->input->get('kode'));
        });
        echo json_encode($match);
    }

    function deleteTemp(){
        $files = glob('./assets/temp/bukti /*');
        foreach($files as $file){
            if(is_file($file)){
                unlink($file);
            }
        }
    }

    function testMove(){
        $id = $this->input->post('id');
        $path = './assets/temp/bukti/';
        $cartbku = array_values(unserialize($this->session->userdata('cartbku')));
        for ($i = 0; $i < count($cartbku); $i ++) {
            if ($cartbku[$i]['_id'] == $id) {
                $bukti = $cartbku[$i]['bukti'];
                unlink($path.$bukti);
                $this->session->set_userdata('cartbku', serialize($cartbku));
                echo json_encode(array('message'=>'Delete Success'));
                break;
            }
        }
    }

    function timeline(){
        $id = $this->input->get('id');
        $data = $this->tmodel->getTimeline($id);
        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }
}
