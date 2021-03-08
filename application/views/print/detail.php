<style>
    html{
        width: 8.5in;
        height: 13in;
        color: black;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11pt;
    }
    .detail td {white-space: normal !important;}
    table{
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
<table class="text-center kop">
    <tr>
        <td>DAFTAR NOMINATIF KEGIATAN PENYELENGGARAAN PELAYANAN PERIZINAN</td>
    </tr>
    <tr>
        <td>DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU KABUPATEN PANDEGLANG</td>
    </tr>
    <tr>
        <td>TAHUN ANGGARAN</td>
    </tr>
</table>
<br>
<table id="table" data-toolbar="#toolbar" data-toggle="table" data-url="../approve/getdetailbkuprint/<?= $permohonan->kode_pengajuan ?>" data-pagination="false" data-single-select="true" data-search="false" data-group-by="true" data-group-by-field="nama_rekening" data-group-by-formatter="groupFormat" class="table table-bordered table-sm text detail" style="color: black;" data-show-footer="true" data-side-pagination="client">
    <thead class="table-bordered text-center">
        <tr>
            <th data-field="keterangan" data-valign="middle" rowspan="2">Keterangan</th>
            <th data-field="penerima" data-valign="middle" rowspan="2">Penerima</th>
            <th colspan="3">Item Detail</th>
            <th data-field="jumlah" data-formatter="formatRupiah" data-valign="middle" data-footer-formatter="footerJumlah" rowspan="2">Jumlah Pengajuan</th>
            <th rowspan="2" data-formatter="pajakFormat" data-valign="middle" data-footer-formatter="footerPajak">Pajak</th>
            <th data-field="subtotal" rowspan="2" data-formatter="formatRupiah" data-valign="middle" data-footer-formatter="footerRupiah">Jumlah Yang Diterima</th>
        </tr>
        <tr>
            <th data-field="total">Total</th>
            <th data-field="satuan">Satuan</th>
            <th data-field="harga" data-formatter="formatRupiah">Harga</th>
        </tr>
    </thead>
    <tfoot>
        <td colspan="5">Total</td>
        <td colspan="1"></td>
        <td colspan="1"></td>
        <td colspan="2"></td>
    </tfoot>
</table>
<br>
<p class="text text-right mt-2 mr-5 p-0 mb-0">Pandeglang, <?= tgl_indo($permohonan->tgl_pencairan); ?></p>
<br>
<table class="text text-center">
        <tr>
            <td width='30%'>Pejabat Pelaksana Teknis Kegiatan</td>
            <td width='30%'>Pembantu Bendahara Pengeluaran</td>
        </tr>
        <tr>
            <td><br><br><br><br></td>
            <td><br><br><br><br></td>
        </tr>
        <tr>
            <td><u><?= $permohonan->nama_pptk ?></u></td>
            <td><u><?= $permohonan->nama_user ?></u></td>
        </tr>
        <tr>
            <td><?= nipFormat($permohonan->uname_pptk) ?></td>
            <td><?= nipFormat($permohonan->uname_user) ?></td>
        </tr>
    </table>
<script>
    const uang = new Intl.NumberFormat('ID-id');
    function pajakFormat(v,r){
        let ppn = parseInt(r.ppn,10);
        let pph21 = parseInt(r.pph21,10);
        let pph22 = parseInt(r.pph22,10);
        let pph23 = parseInt(r.pph23,10);
        let pphd = parseInt(r.pphd,10);
        return uang.format(ppn+pph21+pph22+pph23+pphd)
    }
    function groupFormat(v,i,d){
        console.log('{v,i,d}', {v,i,d})
        return `(${d[0].kode_rekening}) - ${d[0].nama_rekening}`
    }
    function approve(id){
        $('#modal-form').modal('toggle');
        $('#ff').trigger("reset");
        $('#id_pengajuan').val(id);
        $('#inrbtn').text('Approve');
        url = '../approve/approve';
    }
    function reject(id) {
        $('#modal-form').modal('toggle');
        $('#ff').trigger("reset");
        $('#id_pengajuan').val(id);
        $('#inrbtn').text('Reject');
        url = '../approve/reject';
    }
    $('#ff').on('submit', function(e) {
        e.preventDefault();
        const string = $('#ff').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: string,
            success: (result) => {
                var result = eval('(' + result + ')');
                if (result.errorMsg) {
                    Toast.fire({
                        type: 'error',
                        title: '' + result.errorMsg + '.'
                    })
                } else if (result.openMsg) {
                    $('#modal-form').modal('toggle');
                    $('#modal-form-acc').modal('toggle');
                } else {
                    Toast.fire({
                        type: 'success',
                        title: '' + result.message + '.'
                    })
                    $('#modal-form').modal('toggle'); // close the dialog
                    $('#table').bootstrapTable('refresh');
                    window.location.replace('../../');
                }
            },
        })
    })

    function formatRupiah(val, row) {
        return uang.format(val);
    };

    function footerRupiah(val, row){
        let sum = 0;
        val.map((e) => {
            sum += parseInt(e.subtotal, 10);
        })
        return uang.format(sum);
    }
    function footerPajak(data, row){
        let sum = 0;
        data.map((e) => {
            sum += parseInt(e.ppn, 10);
            sum += parseInt(e.pph21, 10);
            sum += parseInt(e.pph22, 10);
            sum += parseInt(e.pph23, 10);
            sum += parseInt(e.pphd, 10);
        });
        return uang.format(sum);
    }

    function footerJumlah(data, footerValue) {
        let sum = 0;
        data.map((e) => {
            sum += parseInt(e.jumlah, 10);
        })
        return uang.format(sum);
    };
    function buktiFormatter(val, row) {
        if (val) {
            return `<button onclick="openpdf('${val}')" class="btn btn-info btn-sm py-0 m-0"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>`
        } else {
            return 'Belum Upload Bukti'
        }
    }
    function openpdf(link) {
        eModal.iframe('../../assets/bukti/' + link, 'Bukti');
    }
</script>