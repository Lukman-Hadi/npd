<div class="header">
    <h1>INI UNTUK KOP SURAT</h1>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>NOTA PENCAIRAN DANA</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h2>INI NOMOR PENCAIRAN</h2>
        </div>
    </div>
</div>
<hr>
<div class="col-12">
    <div class="row">
        <div class="col-12">Bersama Ini Kami Mengajukan Pencairan Dana</div>
    </div>
    <div class="row">
        <div class="col-12">Dengan Uraian Pencairan Sebagai Berikut</div>
    </div>
</div>
<hr>
<div class="col-12">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            Pejabat Pelaksana Teknis Kegiatan
        </div>
        <div class="col-sm-9 col-md-9">
            : <?= $permohonan->nama_user ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            Program
        </div>
        <div class="col-sm-9 col-md-9">
            : <?= $detail[0]->nama_program ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            Kegiatan
        </div>
        <div class="col-sm-9 col-md-9">
            : <?= $detail[0]->nama_kegiatan ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            Nomor DPA-/DPAL-/DPPA-SKPD
        </div>
        <div class="col-sm-9 col-md-9">
            : no prog/kegiatan/subkegiatan
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            Tahun Anggaran
        </div>
        <div class="col-sm-9 col-md-9">
            : <?= date('Y', strtotime($permohonan->created_at)) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            Jumlah yang diminta
        </div>
        <div class="col-sm-9 col-md-9">
        <div class="row">
        <div class="col-12">
        : Rp. <?= number_format($permohonan->total, 2, ',', '.') ?> 
        </div>
        </div>
        <div class="row">
        <div class="col-12">
          (<?= terbilang($permohonan->total) ?> Rupiah)
        </div>
        </div>
        </div>
    </div>
</div>

<table class="table table-bordered align-items-center table-hover table-sm">
    <thead class="thead-light text-center">
        <tr>
            <th width="1%">No</th>
            <th width="10%">Kode Rekening</th>
            <th>Uraian</th>
            <th width="10%">Anggaran</th>
            <th width="10%">Akumulasi Pencairan</th>
            <th width="10%">Pencairan Saat Ini</th>
            <th width="10%">Sisa</th>
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
            $pagu = number_format($d->pagu, 2, ',', '.');
            $total = number_format($d->total, 2, ',', '.');
            $jumlah = number_format($d->jumlah, 2, ',', '.');
            $sisaF = number_format($sisa, 2, ',', '.');
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
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right"><b>Rp. <?= number_format($jpagu, 2, ',', '.'); ?></b></td>
            <td class="text-right"><b>Rp. <?= number_format($jtotal, 2, ',', '.'); ?></b></td>
            <td class="text-right"><b>Rp. <?= number_format($jjumlah, 2, ',', '.'); ?></b></td>
            <td class="text-right"><b>Rp. <?= number_format($jsisa, 2, ',', '.'); ?></b></td>
        </tr>
    </tfoot>
</table>
<table id="table" data-toolbar="#toolbar" data-toggle="table" data-url="/npd/approve/getdetailbku/<?= $permohonan->kode_pengajuan ?>" data-pagination="false" data-single-select="true" data-search="false" data-click-to-select="true" data-group-by="true" data-group-by-field="nama_rekening" class="table table-bordered table-sm" data-show-footer="true" data-side-pagination="client">
    <thead class="thead-light table-bordered text-center">
        <tr>
            <th data-field="kode_rekening" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2">Kode Rekening</th>
            <!-- <th data-field="nmRekening" data-width="5" data-width-unit="%" >Nama Rekening</th> -->
            <th data-field="keterangan" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2">Keterangan</th>
            <th data-field="penerima" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2">Penerima</th>
            <th colspan="3">Item Detail</th>
            <th data-field="jumlah" data-width="20" data-width-unit="%" data-formatter="formatRupiah" data-valign="middle" data-footer-formatter="footerJumlah" rowspan="2">Jumlah Pengajuan</th>
            <th colspan="5">Pajak Detail</th>
            <th data-field="subtotal" rowspan="2" data-formatter="formatRupiah" data-valign="middle" data-footer-formatter="footerRupiah">Jumlah Yang Diterima</th>
            <th data-field="bukti" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2" data-formatter="buktiFormatter">Bukti</th>
        </tr>
        <tr>
            <th data-field="satuan" data-width="5" data-width-unit="%">Satuan</th>
            <th data-field="harga" data-width="50" data-width-unit="%" data-formatter="formatRupiah">Harga</th>
            <th data-field="total" data-width="50" data-width-unit="%">Total</th>
            <th data-field="pph21" data-width="50" data-width-unit="%" data-formatter="formatRupiah">Pph 21</th>
            <th data-field="pph22" data-width="50" data-width-unit="%" data-formatter="formatRupiah">Pph 22</th>
            <th data-field="pph23" data-width="50" data-width-unit="%" data-formatter="formatRupiah">Pph 23</th>
            <th data-field="pphd" data-width="50" data-width-unit="%" data-formatter="formatRupiah">Pphd</th>
            <th data-field="ppn" data-width="50" data-width-unit="%" data-formatter="formatRupiah">Ppn</th>
        </tr>
    </thead>
    <tfoot>
        <td colspan="6">Total</td>
        <td colspan="1"></td>
        <td colspan="5"></td>
        <td colspan="2"></td>
    </tfoot>
</table>