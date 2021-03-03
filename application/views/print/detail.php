<!-- kop -->
<style>
    .kop{
        text-align: center;
        font-family: 'Bookman Old Style';
        margin: 0 0 0 0;
        padding: 0 0 0 0;
    }
    table{
        width: 100%;
    }
    .body{
        font-family: 'Arial';
        margin: 0 0 0 0;
    }
    .no{
        width: 5%;
        text-align: center;
    }
    .title{
        width: 30%;
    }
    .br{
        margin-top: 10px;
    }
    .text{
        font-family: arial;
        font-size: 10pt;
    }
</style>
<table border="1">
    <tr>
        <td style="width: 15%;" rowspan="5"><img style="float: right;" src="<?= base_url().'assets/avatars/logoh.png' ?>" alt="" width="100px"></td>
        <td style="width: 80%;"><h1 class="kop" style="font-size: 14pt;"><b>PEMERINTAH KABUPATEN PANDEGLANG</b></h1></td>
        <td style="width: 5%;" rowspan="5"><img src="" alt=""></td>
    </tr>
    <tr>
        <td><h2 class="kop" style="font-size: 18pt;"><b>DINAS PENANAMAN MODAL DAN PELAYANAN</b></h2></td>
    </tr>
    <tr>
        <td><h2 class="kop" style="font-size: 18pt;"><b>TERPADU SATU PINTU<b></h2></td>
    </tr>
    <tr>
        <td><h5 class="kop" style="font-size: 9pt;">Jl. KH. TB. Abdul Halim No. 3 Pandeglang, Kode Pos 42213, Telp/Fax : (0253) 201030</h5></td>
    </tr>
    <tr>
        <td><h5 class="kop" style="font-size: 9pt;">Website : www.dpmptsp.pandeglangkab.go.id, e-mail : bpptpandeglangkab.go.id</h5></td>
    </tr>
</table>
<hr style="margin: 2px 0 0 0;">
<hr style="margin: 2px 0 0 0;">
<hr style="margin: 2px 0 0 0;">
<table border="1">
    <tr>
        <td><div class="br"></div></td>
    </tr>
    <tr>
        <td><p class="body kop" style="font-size: 12pt; font-weight: bold">NOTA PENCAIRAN DANA (NPD)</p></td>
    </tr>
    <tr>
        <td><p class="body kop" style="font-size: 12pt; font-weight: bold"><?= $permohonan->kode_pencairan?></p></td>
    </tr>
    <tr>
        <td><div class="br"></div></td>
    </tr>
</table>
<table border="1">
    <tr>
        <td style="text-align: left; font-size: 11pt;">Bersama Ini Kami Mengajukan Pencairan Dana</td>
    </tr>
    <tr>
        <td style="text-align: left; font-size: 11pt;">Dengan Uraian Pencairan Sebagai Berikut :</td>
    </tr>
</table>
<table border="1">
    <tr>
        <td class="no text">1</td>
        <td class="title"><div class="text">Pejabat Pelaksana Teknis Kegiatan</div></td>
        <td><div class="text">: <?= $permohonan->nama_user ?></div></td>
    </tr>
    <tr>
        <td class="no text">2</td>
        <td class="text">Bidang</td>
        <td class="text">: <?= $permohonan->nama_bidang ?></td>
    </tr>
    <tr class="text">
        <td class="no">3</td>
        <td>Program</td>
        <td>: <?= $detail[0]->nama_program ?></td>
    </tr>
    <tr class="text">
        <td class="no">4</td>
        <td>Kegiatan</td>
        <td>: <?= $detail[0]->nama_kegiatan ?></td>
    </tr>
    <tr class="text">
        <td class="no">5</td>
        <td>Sub Kegiatan</td>
        <td>: <?= $detail[0]->nama_sub ?></td>
    </tr>
    <tr class="text">
        <td class="no">6</td>
        <td>Tahun Anggaran</td>
        <td>: <?= date('Y', strtotime($permohonan->created_at)) ?></td>
    </tr>
    <tr class="text">
        <td class="no">7</td>
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
        <td class="body kop"><h5 style="margin: 10px 10px 10px 10px;">Pembebanan Pada Kode Rekening : </h5></td>
    </tr>
</table>
<table border="1" class="text" >
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
<table border="1" class="text">
    <tr>
        <td><b>Potongan-Potongan</b></td>
    </tr>
</table>
