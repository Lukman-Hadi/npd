<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0"><?= $title ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="mb-0">Input Pengajuan Baru</h3>
        </div>
        <div class="card-body">
            <form id="ff" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols1Input">PPTK</label>
                            <select id="pptk" name="id_pptk" class="form-control form-control-sm select2-single" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols1Input">Program</label>
                            <select id="kd_program" name="id_program" class="form-control form-control-sm select2-single" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols2Input">Kegiatan</label>
                            <select id="kd_kegiatan" name="id_kegiatan" class="form-control form-control-sm select2-single" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols3Input">Sub Kegiatan</label>
                            <select id="kd_sub" name="id_sub" class="form-control form-control-sm select2-single" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="example4cols1Input">Rekening Kegiatan</label>
                            <select id="kd_rekening" name="id_rekening" class="form-control form-control-sm select2-single" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols1Input">Keterangan</label>
                            <input type="text" name="keterangan" required class="form-control form-control-sm" placeholder="ex: Fotocopy, Honor">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Satuan</label>
                                    <input type="text" name="satuan" required class="form-control form-control-sm" placeholder="ex: dus, rim">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Harga</label>
                                    <input type="text" name="harga" required class="form-control form-control-sm uang" placeholder="ex: 500000">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Total</label>
                                    <input type="text" name="total" required class="form-control form-control-sm" placeholder="ex: 10, 20">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example4cols2Input">Jumlah Yang Akan Dicairkan</label>
                            <input type="text" required class="form-control form-control-sm uang" id="jumlah" name="jumlah" placeholder="Jumlah Yang Akan Dicairkan" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="example4cols2Input">Jumlah Yang Tersedia</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-wallet fa-lg"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm uang" id="tersedia" placeholder="Jumlah Yang Tersedia" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" name="nm_program" hidden>
                <input type="text" name="nm_kegiatan" hidden>
                <input type="text" name="nm_sub" hidden>
                <input type="text" name="nm_rekening" hidden>
                <input type="text" name="ma_rekening" hidden>
                <input type="text" name="id_bidang" hidden>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="mb-0">Detail Pengajuan</h3>
            <div class="table-responsive py-2 px-2">
                <div id="toolbar">
                    <button id="remove" class="btn btn-danger" onclick="remove()">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
                <table id="table"
                    data-toolbar="#toolbar"
                    data-toggle="table"
                    data-url="transaksi/show"
                    data-pagination="false"
                    data-search="false"
                    data-click-to-select="true"
                    class="table table-flush"
                    data-show-footer="true"
                    data-group-by = "true"
                    data-group-by-field = "ma_rekening"
                    data-side-pagination="client">
                    <thead class="thead-light text-center" style="white-space: normal;word-wrap:break-word;">
                        <tr>
                            <th data-checkbox="true" rowspan="2" data-valign="middle"></th>
                            <!-- <th data-field="no" data-formatter="nomerFormatter" data-width="5" data-width-unit="%">No</th> -->
                            <th data-field="nm_program" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Program</th>
                            <th data-field="nm_kegiatan" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Kegiatan</th>
                            <th data-field="nm_sub" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Sub Kegiatan</th>
                            <th data-field="nm_rekening" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Rekening Kegiatan</th>
                            <th data-field="ma_rekening" data-width="10" data-width-unit="%" rowspan="2" data-valign="middle">Nama Rekening Kegiatan</th>
                            <th colspan="4">Item Detail</th>
                            <th data-field="jumlah" data-width="10" data-width-unit="%" data-formatter="formatRupiah" data-footer-formatter="footerJumlah" rowspan="2" data-valign="middle">Jumlah Pengajuan</th>
                        </tr>
                        <tr>
                            <th data-field="keterangan" data-width="10" data-width-unit="%">Keterangan</th>
                            <th data-field="satuan" data-width="10" data-width-unit="%">Satuan</th>
                            <th data-field="harga" data-width="10" data-width-unit="%">Harga</th>
                            <th data-field="total" data-width="10" data-width-unit="%">Total</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-body">
            <button class="btn btn-success btn-block" onclick="save()">Ajukan</button>
        </div>
    </div>
</div>
<script>
    const uang = new Intl.NumberFormat('ID-id', {
        style: 'currency',
        currency: 'IDR'
    });
    var idProgram = '';
    var idBidang = '';
    var idKegiatan = '';
    var idSub = '';
    var nmProgram = '';
    var nmKegiatan = '';
    var nmSub = '';
    $(document).ready(function() {
        $.fn.select2.defaults.set("theme", "bootstrap");
        // $('#table').bootstrapTable();
        $('.uang').mask('000.000.000.000.000', {
            reverse: true
        });
        const options = {
            beforeSubmit: showRequest,
            url: 'transaksi/addToCartNew',
            success: showResponse,
            clearForm: true,
            resetForm: true,
        };
        $('#ff').ajaxForm(options);

        $.ajax({
            url: 'kegiatan/isprogram',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                let res = data.map((d) => {
                    return {
                        id: d._id,
                        text: `(${d.kode_program}) - ${d.nama_program}`,
                        nm: d.kode_program,
                        bidang: d.id_bidang
                    }
                })
                $('#kd_program').select2({
                    placeholder: "Pilih Kode Program",
                    allowClear: false,
                    data: res
                });
            }
        });
        $.ajax({
            url: 'transaksi/getpptk',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                let res = data.map((d) => {
                    return {
                        id: d.idpptk,
                        text: `${d.uname} - ${d.nama}`,
                        nm: d.nama
                    }
                })
                $('#pptk').select2({
                    placeholder: "Pilih PPTK",
                    allowClear: false,
                    data: res
                });
            }
        });
    });
</script>