<!-- kop -->
<style>
    .kop {
        text-align: center;
        font-family: 'Bookman Old Style';
        margin: 0 0 0 0;
        padding: 0 0 0 0;
        color: black;
    }

    table {
        width: 100%;
        color: black;
    }
    p{
        color: black;
    }
    .body {
        font-family: 'Arial';
        margin: 0 0 0 0;
    }

    .no {
        width: 5%;
        text-align: center;
    }

    .title {
        width: 30%;
    }

    .br {
        margin-top: 10px;
    }

    .text {
        font-family: arial;
        font-size: 10pt;
    }

    .garis {
        border: 1px solid black;
        margin-bottom: 1px;
    }

    .garisbawah {
        border: 2px solid black;
    }
</style>
<table>
    <tr>
        <td style="width: 15%;" rowspan="5"><img style="float: right;" src="<?= base_url() . 'assets/avatars/logoh.png' ?>" alt="" width="125px"></td>
        <td style="width: 80%;">
            <h1 class="kop" style="font-size: 18pt;"><b>PEMERINTAH KABUPATEN PANDEGLANG</b></h1>
        </td>
        <td style="width: 5%;" rowspan="5"><img src="" alt=""></td>
    </tr>
    <tr>
        <td>
            <h2 class="kop" style="font-size: 24pt;"><b>DINAS PENANAMAN MODAL DAN PELAYANAN</b></h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2 class="kop" style="font-size: 24pt;"><b>TERPADU SATU PINTU<b></h2>
        </td>
    </tr>
    <tr>
        <td>
            <h5 class="kop" style="font-size: 9pt;">Jl. A. Satria Wijaya No. 1 Pandeglang, Kode Pos 42213, Telp/Fax : (0253) 201030</h5>
        </td>
    </tr>
    <tr>
        <td>
            <h5 class="kop" style="font-size: 9pt;">Website : www.dpmptsp.pandeglangkab.go.id, e-mail : bpptpandeglangkab.go.id</h5>
        </td>
    </tr>
</table>
<div class="garis"></div>
<div class="garisbawah"></div>
<table>
    <tr>
        <td>
            <div class="br"></div>
        </td>
    </tr>
    <tr>
        <td>
            <p class="body kop" style="font-size: 14pt; font-weight: bold" style="font-size: 12pt;">NOTA PENCAIRAN DANA (NPD)</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="body kop" style="font-size: 14pt; font-weight: bold" style="font-size: 12pt;"><?= $permohonan->kode_pencairan ?></p>
        </td>
    </tr>
    <tr>
        <td>
            <div class="br"></div>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td style="text-align: left; font-size: 11pt;">Bersama Ini Kami Mengajukan Pencairan Dana</td>
    </tr>
    <tr>
        <td style="text-align: left; font-size: 11pt;">Dengan Uraian Pencairan Sebagai Berikut :</td>
    </tr>
</table>
<table>
    <tr>
        <td class="no text">1</td>
        <td class="title">
            <div class="text">Pejabat Pelaksana Teknis Kegiatan</div>
        </td>
        <td>
            <div class="text">: <?= $permohonan->nama_pptk ?></div>
        </td>
    </tr>
    <tr class="text">
        <td class="no">2</td>
        <td>Program</td>
        <td>: <?= '('.$detail[0]->kode_program.') '.$detail[0]->nama_program ?></td>
    </tr>
    <tr class="text">
        <td class="no">3</td>
        <td>Kegiatan</td>
        <td>: <?= '('.$detail[0]->kode_kegiatan.') '.$detail[0]->nama_kegiatan ?></td>
    </tr>
    <tr class="text">
        <td class="no">4</td>
        <td>Sub Kegiatan</td>
        <td>: <?= '('.$detail[0]->kode_sub.') '.$detail[0]->nama_sub ?></td>
    </tr>
    <tr class="text">
        <td class="no">5</td>
        <td>Tahun Anggaran</td>
        <td>: <?= date('Y', strtotime($permohonan->created_at)) ?></td>
    </tr>
    <tr class="text">
        <td class="no">6</td>
        <td>Jumlah yang diminta</td>
        <td>: Rp. <?= number_format($permohonan->total, 2, ',', '.') ?></td>
    </tr>
    <tr class="text">
        <td class="no"></td>
        <td colspan="2"><i>(Terbilang : <?= terbilang($permohonan->total) ?> Rupiah)</i></td>
    </tr>
</table>
<table border="1">
    <tr>
        <td class="body kop">
            <h5 style="margin: 10px 10px 10px 10px;">Pembebanan Pada Kode Rekening : </h5>
        </td>
    </tr>
</table>
<table border="1" class="text">
    <thead>
        <tr style="text-align: center;">
            <th width="1%">No</th>
            <th width="8%">Kode Rekening</th>
            <th>Uraian</th>
            <th width="12%">Anggaran</th>
            <th width="12%">Akumulasi Pencairan</th>
            <th width="12%">Pencairan Saat Ini</th>
            <th width="12%">Sisa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $jpagu = 0;
        $jtotal = 0;
        $jjumlah = 0;
        $jsisa = 0;
        foreach ($detail as $d) {
            $sisa = $d->pagu - ($d->jumlah + $d->total);
            $pagu = number_format($d->pagu, 0, ',', '.');
            $total = number_format($d->total, 0, ',', '.');
            $jumlah = number_format($d->jumlah, 0, ',', '.');
            $sisaF = number_format($sisa, 0, ',', '.');
            echo "<tr>
            <td>
                $no
            </td>
            <td>
                $d->kode_rekening
            </td>
            <td>
                $d->nama_rekening
            </td>
            <td class='text-right'>
                Rp. $pagu
            </td>
            <td class='text-right'>
                Rp. $total
            </td>
            <td class='text-right'>
                Rp. $jumlah
            </td>
            <td class='text-right'>
                Rp. $sisaF
            </td>
        </tr>";
            $no++;
            $jpagu += $d->pagu;
            $jtotal += $d->total;
            $jjumlah += $d->jumlah;
            $jsisa += $sisa;
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" style="text-align: right;">Jumlah</td>
            <td class="text-right"><b>Rp. <?= number_format($jpagu, 0, ',', '.'); ?></b></td>
            <td class="text-right"><b>Rp. <?= number_format($jtotal, 0, ',', '.'); ?></b></td>
            <td class="text-right"><b>Rp. <?= number_format($jjumlah, 0, ',', '.'); ?></b></td>
            <td class="text-right"><b>Rp. <?= number_format($jsisa, 0, ',', '.'); ?></b></td>
        </tr>
    </tfoot>
</table>
<?php
$ppn = 0;
$pphd = 0;
$pph21 = 0;
$pph22 = 0;
$pph23 = 0;
foreach ($rincian as $r) {
    $ppn += $r->ppn;
    $pphd += $r->pphd;
    $pph21 += $r->pph21;
    $pph22 += $r->pph22;
    $pph23 += $r->pph23;
}
?>
<table class="text">
    <tr>
        <td><b>Potongan-Potongan</b></td>
    </tr>
</table>
<table class="text" border="1">
    <tr>
        <td width="15%">PPN</td>
        <td>: Rp. <?= number_format($ppn, 0, ',', '.'); ?></td>
    </tr>
    <tr>
        <td width="15%">PPh Pasal 21</td>
        <td>: Rp. <?= number_format($pph21, 0, ',', '.'); ?></td>
    </tr>
    <tr>
        <td width="15%">PPh Pasal 22</td>
        <td>: Rp. <?= number_format($pph22, 0, ',', '.'); ?></td>
    </tr>
    <tr>
        <td width="15%">PPh Pasal 23</td>
        <td>: Rp. <?= number_format($pph23, 0, ',', '.'); ?></td>
    </tr>
    <tr>
        <td width="15%">Pajak Daerah</td>
        <td>: Rp. <?= number_format($pphd, 0, ',', '.'); ?></td>
    </tr>
</table>
<table class="text">
    <tr>
        <td width="15%">Jumlah yang diminta</td>
        <td class="text-right"><b>Rp. <?= number_format($jjumlah, 0, ',', '.'); ?></b></td>
    </tr>
    <tr>
        <td width="15%">Potongan</td>
        <td class="text-right"><b>Rp. <?= number_format(($ppn + $pphd + $pph21 + $pph22 + $pph23), 0, ',', '.'); ?></b></td>
    </tr>
    <tr>
        <td width="15%">Jumlah yang Diterima</td>
        <td class="text-right"><b>Rp. <?= number_format($jjumlah - ($ppn + $pphd + $pph21 + $pph22 + $pph23), 0, ',', '.'); ?></b></td>
    </tr>
    <tr>
        <td width="15%"></td>
        <td class="text-right"><i>(Terbilang : <?= terbilang($jjumlah - ($ppn + $pphd + $pph21 + $pph22 + $pph23)) ?> Rupiah)</i></td>
    </tr>
</table>
<div class="ttd">
    <p class="text text-right mt-2 mr-5 p-0 mb-0">Pandeglang, <?= tgl_indo($permohonan->tgl_pencairan); ?></p>
    <table class="text text-center">
        <tr>
            <td width='30%'><?= $permohonan->nama_bidang == 'Sekertariat' ? 'Sekertaris Dinas' : 'Kepala Bidang ' . $permohonan->nama_bidang ?></td>
            <td width='30%'>Pejabat Pelaksana Teknis Kegiatan</td>
            <td width='30%'>Pembantu Bendahara Pengeluaran</td>
        </tr>
        <tr>
            <td><br><br><br><br></td>
            <td><br><br><br><br></td>
            <td><br><br><br><br></td>
        </tr>
        <tr>
            <td><u><?= kepalaBidang($permohonan->id_bidang)->nama_user ?></u></td>
            <td><u><?= $permohonan->nama_pptk ?></u></td>
            <td><u><?= $permohonan->nama_user ?></u></td>
        </tr>
        <tr>
            <td><?= kepalaBidang($permohonan->id_bidang)->uname ?></td>
            <td><?= $permohonan->uname_pptk ?></td>
            <td><?= $permohonan->uname_user ?></td>
        </tr>
    </table>
    <p class="text text-center mt-1 mb-0" style="border: 1px solid black;">LEMBAR PERSETUJUAN NOTA PENCAIRAN DANA</p>
    <table class="text" border="1">
        <thead class="text-center">
            <tr>
                <td rowspan="2">NO</td>
                <td rowspan="2">NAMA PEJABAT</td>
                <td colspan="2">PERSETUJUAN</td>
            </tr>
            <tr>
                <td>URAIAN PERSETUJUAN</td>
                <td>PARAF</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="3" class="text-center" width='2%'>1</td>
                <td width='30%'>Pengguna Anggaran/Barang (PA/B)</td>
                <td rowspan="3">
                    <p class="text text-center"></p>
                </td>
                <td width='30%' rowspan="3"></td>
            </tr>
            <tr>
                <td><?= kepalaDinas()->nama_user ?></td>
            </tr>
            <tr>
                <td><?= kepalaDinas()->uname ?></td>
            </tr>
            <tr>
                <td rowspan="3" class="text-center" width='2%'>2</td>
                <td width='30%'>Pejabat Penatausahaan Keuangan (PPK)</td>
                <td rowspan="3">
                    <p class="text text-center"></p>
                </td>
                <td width='30%' rowspan="3"></td>
            </tr>
            <tr>
                <td><?= auditor()->nama_user ?></td>
            </tr>
            <tr>
                <td><?= auditor()->uname ?></td>
            </tr>
        </tbody>
    </table>
</div>