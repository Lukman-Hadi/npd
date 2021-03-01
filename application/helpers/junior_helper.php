<?php

function getInfo($field)
{
    $ci = get_instance();
    $ci->db->where('id_perusahaan', 1);
    $rs = $ci->db->get('tbl_perusahaan')->row_array();
    return $rs[$field];
}
function nomorPengajuan($idSub,$bidang){
    //P-bidang-nmkeg/no/bulan/tahun
    $ci = get_instance();
    $prefixx = 'P';
    $bidang = $ci->db->get_where('tbl_bidang',array('_id'=>$bidang))->row();
    $sub = $ci->db->get_where('tbl_sub_kegiatan',array('_id'=>$idSub))->row();
    $kode = $ci->db->get('tbl_pengajuan',array('id_bidang'=>$bidang->_id))->num_rows();
    $bulan  = date('m');
    $tahun  = date('Y');
    $no = $prefixx.'-'.$bidang->alias.'-'.singkat($sub->nama_sub).'/'.($kode+1).'/'.$bulan.'/'.$tahun;
    return $no;
}

function singkat($string){
    $abbreviation = "";
    $modif = str_replace('/', '', $string);
    $newS = ucwords($modif);
    $words = explode(" ", "$newS");
      foreach($words as $word){
        $abbreviation .= substr($word, 0, 1)."";
      }
   return $abbreviation; 
}

function nomorPencairan($urut,$kodeKeg){
    //urut/bpk-bidang-/bulan/tahun
    $kodeno = '900';
    $urutan = $urut+1;
    $kode   = $kodeKeg;
    $bulan  = date('m');
    $tahun  = date('Y');
    $no     = $kodeno.'/'.$urutan.'-'.$kode.'/'.$bulan.'/'.$tahun;
    return $no;
}

function terbilang($angka)
{
    $angka = (float)$angka;

    $bilangan = array(
        '',
        'Satu',
        'Dua',
        'Tiga',
        'Empat',
        'Lima',
        'Enam',
        'Tujuh',
        'Delapan',
        'Sembilan',
        'Sepuluh',
        'Sebelas'
    );

    if ($angka < 12) {
        return $bilangan[$angka];
    } else if ($angka < 20) {
        return $bilangan[$angka - 10] . ' Belas';
    } else if ($angka < 100) {
        $hasil_bagi = (int)($angka / 10);
        $hasil_mod = $angka % 10;
        return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
    } else if ($angka < 200) {
        return sprintf('seratus %s', terbilang($angka - 100));
    } else if ($angka < 1000) {
        $hasil_bagi = (int)($angka / 100);
        $hasil_mod = $angka % 100;
        return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
    } else if ($angka < 2000) {
        return trim(sprintf('seribu %s', terbilang($angka - 1000)));
    } else if ($angka < 1000000) {
        $hasil_bagi = (int)($angka / 1000); // karena hasilnya bisa ratusan jadi langsung digunakan rekursif
        $hasil_mod = $angka % 1000;
        return sprintf('%s Ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));
    } else if ($angka < 1000000000) {
        $hasil_bagi = (int)($angka / 1000000);
        $hasil_mod = $angka % 1000000;
        return trim(sprintf('%s Juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    } else if ($angka < 1000000000000) {
        $hasil_bagi = (int)($angka / 1000000000);
        $hasil_mod = fmod($angka, 1000000000);
        return trim(sprintf('%s Milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    } else if ($angka < 1000000000000000) {
        $hasil_bagi = $angka / 1000000000000;
        $hasil_mod = fmod($angka, 1000000000000);
        return trim(sprintf('%s Triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    } else {
        return 'Wow...';
    }
}

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('_id')) {
        return false;
    } else {
        return true;
    }
}
function alert($class, $title, $description)
{
    return '<div class="alert ' . $class . ' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> ' . $title . '</h4>
                ' . $description . '
              </div>';
}
// untuk chek akses level pada modul peberian akses
function checked_akses($id_user_level, $id_menu)
{
    $ci = get_instance();
    $ci->db->where('id_jabatan', $id_user_level);
    $ci->db->where('id_menu', $id_menu);
    $data = $ci->db->get('tbl_levels');
    if ($data->num_rows() > 0) {
        return "checked='checked'";
    }
}
function checked_privilege($idJabatan, $idProgress)
{
    $ci = get_instance();
    $ci->db->where('id_jabatan', $idJabatan);
    $ci->db->where('id_progress', $idProgress);
    $data = $ci->db->get('tbl_privilege');
    if ($data->num_rows() > 0) {
        return "checked='checked'";
    }
}
function privilegeCheck()
{
    $ci = get_instance();
    $ci->db->select('pr._id,nama_progress');
    $ci->db->from('tbl_privilege p');
    $ci->db->join('tbl_progress pr', 'pr._id = p.id_progress');
    $ci->db->where('p.id_jabatan', $ci->session->userdata('id_jabatan'));
    return $ci->db->get()->result();
}

function pptkCheck(){
    $ci = get_instance();
    $jab = $ci->session->id_jabatan;
    $res = $ci->db->get_where('tbl_jabatan',array('nama_jabatan'=>'PPTK'))->row();
    if($res->_id == $jab){
        return true;
    }else{
        return false;
    }
}

function superCheck(){
    $can = privilegeCheck();
    foreach($can as $c){
        $userCan[] = $c->nama_progress;
    }
    if(in_array('All',$userCan)){
        return true;
    }else{
        return false;
    }
}
function canApproveCheck(){
    $ci = get_instance();
    $ci->load->model('Approve_model','amodel');
    $can = privilegeCheck();
    $userCan = array();
    foreach($can as $c){
        $userCan[] = $c->_id;
    }
    $canApprove = $ci->amodel->canApproveCheckM($userCan);
    $userCanOrdinal = array();
    foreach($canApprove as $approve){
        $userCanOrdinal[] = $approve->ordinal-1;
    }
    // $test = $ci->amodel->getProgress($userCanOrdinal);
    // $userCanApprove = array();
    // foreach($test as $t){
    //     $userCanApprove[] = $t->id_progress;
    // }
    return $userCanOrdinal;
}
function cekAlur($ord){
    $ci = get_instance();
    $ci->db->select('status');
    $ci->db->from('tbl_alur');
    $ci->db->where('ordinal',$ord);
    return $ci->db->get()->row();
}
function cekAkhir(){
    $ci = get_instance();
    $ci->db->select('ordinal');
    $ci->db->from('tbl_alur');
    $ci->db->order_by('ordinal','DESC');
    $ci->db->limit(1,0);
    return $ci->db->get()->row();
}

function cekBku($status){
    $ci = get_instance();
    $ci->db->select('ordinal');
    $ci->db->from('tbl_alur');
    $ci->db->where('status',1);
    $ordinal = $ci->db->get()->row();
    if($status >= $ordinal->ordinal){
        return true;
    }else{
        return false;
    }
}


function seo_title($s)
{
    $c = array(' ');
    $d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+', '–');
    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}

function tgl_indo($tgl)
{
    $bln = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bln[(int)$bulan - 1] . ' ' . $tahun;
}

function bln_indo($tgl)
{
    $bln = array("Jan", "Feb", "Maret", "April", "Mei", "Juni", "Juli", "Agust", "Sep", "Okt", "Nov", "Des");
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bln[(int)$bulan - 1] . ' ' . $tahun;
}
function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
function jam($tgl)
{
    $jam = substr($tgl, 11, 2);
    $menit = substr($tgl, 14, 2);
    $detik = substr($tgl, 17, 2);
    return $jam . ':' . $menit . ':' . $detik;
}


if (!function_exists('time_ago')) {
    function time_ago($time)
    {
        $periods = array("Detik", "Menit", "Jam", "Hari", "Minggu", "Bulan", "Tahun", "Decade");
        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
        $now = time();
        $difference     = $now - $time;
        $tense         = "ago";
        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }
        $difference = round($difference);
        if ($difference != 1) {
            $periods[$j] .= "";
        }
        return "$difference $periods[$j] yang lalu";
    }
}



function antrian($id, $date)
{
    $ci = get_instance();
    $today = date('Y-m-d');
    $query = "SELECT count(_id)as maxantrian FROM tbl_counter where id_loket='$id' AND date = '$today'";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxantrian'];
    $noUrut = (int) substr($kode, -3);
    $noUrut += 1;
    $kodeBaru = sprintf("%03s", $noUrut);
    return $kodeBaru;
}

function jmlbooking($id)
{
    $ci = get_instance();
    $today = date('Y-m-d');
    $query = "SELECT count(id_layanan)as jml FROM tbl_booking INNER JOIN tbl_layanan ON tbl_booking.id_layanan=tbl_layanan._id INNER JOIN tbl_loket ON tbl_layanan.id_menumpp=tbl_loket.id_menumpp where tbl_loket.id_menumpp='$id' AND DATE_FORMAT(tbl_booking.createdate,'%Y-%m-%d') = '$today'";
    $data = $ci->db->query($query)->row_array();
    $jml = $data['jml'];
    return $jml;
}

function jmlantrian($id)
{
    $ci = get_instance();
    $today = date('Y-m-d');
    $query = "SELECT COUNT(id_loket) as jml FROM tbl_counter INNER JOIN tbl_loket ON tbl_counter.id_loket=tbl_loket._id where tbl_loket.id_menumpp='$id' AND tbl_counter.date= '$today'";
    $data = $ci->db->query($query)->row_array();
    $jml = $data['jml'];
    return $jml;
}

function allbooking()
{
    $ci = get_instance();
    $today = date('Y-m-d');
    $query = "SELECT count(id_layanan)as jml FROM tbl_booking INNER JOIN tbl_layanan ON tbl_booking.id_layanan=tbl_layanan._id INNER JOIN tbl_loket ON tbl_layanan.id_menumpp=tbl_loket.id_menumpp where DATE_FORMAT(tbl_booking.createdate,'%Y-%m-%d') = '$today'";
    $data = $ci->db->query($query)->row_array();
    $jml = $data['jml'];
    return $jml;
}
function allantrian()
{
    $ci = get_instance();
    $today = date('Y-m-d');
    $query = "SELECT COUNT(id_loket) as jml FROM tbl_counter INNER JOIN tbl_loket ON tbl_counter.id_loket=tbl_loket._id where tbl_counter.date= '$today'";
    $data = $ci->db->query($query)->row_array();
    $jml = $data['jml'];
    return $jml;
}
function allterlayani()
{
    $ci = get_instance();
    $today = date('Y-m-d');
    $query = "SELECT COUNT(antrian) as jml FROM tbl_counter INNER JOIN tbl_loket ON tbl_counter.id_loket=tbl_loket._id where tbl_counter.status <> 1 AND tbl_counter.date= '$today'";
    $data = $ci->db->query($query)->row_array();
    $jml = $data['jml'];
    return $jml;
}

function alltdkterlayani()
{
    $ci = get_instance();
    $today = date('Y-m-d');
    $query = "SELECT COUNT(antrian) as jml FROM tbl_counter INNER JOIN tbl_loket ON tbl_counter.id_loket=tbl_loket._id where tbl_counter.status = 1 AND tbl_counter.date= '$today'";
    $data = $ci->db->query($query)->row_array();
    $jml = $data['jml'];
    return $jml;
}
