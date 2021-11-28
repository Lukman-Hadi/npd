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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols1Input">Keterangan</label>
                            <input type="text" name="keterangan" required class="form-control form-control-sm" placeholder="ex: Fotocopy, Honor" readonly>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Satuan</label>
                                    <input type="text" name="satuan" required class="form-control form-control-sm" placeholder="ex: dus, rim" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Harga</label>
                                    <input type="text" name="harga" required class="form-control form-control-sm uang" placeholder="ex: 500000" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Total</label>
                                    <input type="text" name="total" required class="form-control form-control-sm" placeholder="ex: 10, 20" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="example4cols2Input">Jumlah Yang Akan Dicairkan</label>
                            <input type="text" required class="form-control form-control-sm uang" id="jumlah" name="jumlah" placeholder="Jumlah Yang Akan Dicairkan" readonly>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_pengajuan">
                <input type="hidden" name="id_pengajuan_detail">
                <input type="hidden" name="id_pengajuan_rincian">
                <input type="hidden" name="jumlah_lama">
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
                    <button id="edit" class="btn btn-info" onclick="edit()">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                </div>
                <table id="table"
                    data-toolbar="#toolbar"
                    data-toggle="table"
                    data-url="showedit?id=<?= $kode ?>"
                    data-pagination="false"
                    data-search="false"
                    data-click-to-select="true"
                    data-single-select="true"
                    class="table table-flush"
                    data-show-footer="true"
                    data-group-by = "true"
                    data-group-by-field = "nama_rekening"
                    data-side-pagination="client">
                    <thead class="thead-light text-center" style="white-space: normal;word-wrap:break-word;">
                        <tr>
                            <th data-checkbox="true" rowspan="2" data-valign="middle"></th>
                            <!-- <th data-field="no" data-formatter="nomerFormatter" data-width="5" data-width-unit="%">No</th> -->
                            <th data-field="kode_program" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Program</th>
                            <th data-field="kode_kegiatan" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Kegiatan</th>
                            <th data-field="kode_sub" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Sub Kegiatan</th>
                            <th data-field="kode_rekening" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Rekening Kegiatan</th>
                            <th data-field="nama_rekening" data-width="10" data-width-unit="%" rowspan="2" data-valign="middle">Nama Rekening Kegiatan</th>
                            <th colspan="4">Item Detail</th>
                            <th data-field="jumlah" data-width="10" data-width-unit="%" data-formatter="formatRupiah" data-footer-formatter="footerJumlah" rowspan="2" data-valign="middle">Jumlah Pengajuan</th>
                        </tr>
                        <tr>
                            <th data-field="keterangan" data-width="10" data-width-unit="%">Keterangan</th>
                            <th data-field="satuan" data-width="10" data-width-unit="%">Satuan</th>
                            <th data-field="harga" data-width="10" data-width-unit="%" data-formatter="formatRupiah">Harga</th>
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
        currency: 'IDR',
        minimumFractionDigits: 0,
    });
    $(document).ready(function() {
        $.fn.select2.defaults.set("theme", "bootstrap");
        // $('#table').bootstrapTable();
        $('.uang').mask('000.000.000.000.000', {
            reverse: true
        });
        const options = {
            beforeSubmit: showRequest,
            url: 'updatepengajuan',
            success: showResponse,
            clearForm: true,
            resetForm: true,
        };
        $('#ff').ajaxForm(options);
    });
</script>