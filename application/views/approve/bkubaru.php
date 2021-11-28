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
            <h3 class="mb-0">Input Detail Bku</h3>
        </div>
        <div class="card-body">
            <form id="ff" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols1Input">Kode Rekening Kegiatan</label>
                            <select id="id_pengajuan" name="id_pengajuan_detail" class="form-control form-control-sm select2-single" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols1Input">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control form-control-sm" placeholder="ex: Fotocopy, Honor" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols3Input">Penerima</label>
                            <input type="text" name="penerima" class="form-control form-control-sm" placeholder="ex: Toko anginribut, tn.xxx" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Satuan</label>
                                    <input type="text" name="satuan" class="form-control form-control-sm" placeholder="ex: dus, rim" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Harga</label>
                                    <input type="text" name="harga" class="form-control form-control-sm uang" placeholder="ex: 500000" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Total</label>
                                    <input type="text" name="total" class="form-control form-control-sm" placeholder="ex: 10, 20" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="example4cols2Input">Jumlah Yang Diterima</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-wallet fa-lg"></i></span>
                                </div>
                                <input id="subtotal" name="subtotal" type="text" class="form-control form-control-sm uang" placeholder="Jumlah Yang Diterima" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Pph 21</label>
                                    <input type="text" name="pph21" class="form-control form-control-sm uang" name="jumlah" placeholder="PPH21" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Pph 22</label>
                                    <input type="text" name="pph22" class="form-control form-control-sm uang" name="jumlah" placeholder="PPH22" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Pph 23</label>
                                    <input type="text" name="pph23" class="form-control form-control-sm uang" name="jumlah" placeholder="PPH23" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Pphd</label>
                                    <input type="text" name="pphd" class="form-control form-control-sm uang" name="jumlah" placeholder="PPHD" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Ppn</label>
                                    <input type="text" name="ppn" class="form-control form-control-sm uang" name="jumlah" placeholder="PPN" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="example4cols2Input">Grandtotal</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-wallet fa-lg"></i></span>
                                </div>
                                <input type="text" id="gtotal" name="jumlah" class="form-control form-control-sm uang" placeholder="Grandtotal" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-control-label">Bukti</label>
                            <input type="file" name="bukti" id="fileBukti" class="form-control" required>
                        </div>
                    </div>
                </div>
                <input type="text" name="id_pengajuan_rincian" hidden>
                <input type="text" name="id_pengajuan_master" value="<?= $permohonan->_id ?>" hidden>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="mb-0">Detail Bku</h3>
            <div class="table-responsive py-2 px-2">
                <div id="toolbar">
                    <button id="Edit" class="btn btn-info btn-rounded" onclick="edit()">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                </div>
                <table id="table" data-toolbar="#toolbar" data-toggle="table" data-url="getdetailbku/<?= $permohonan->kode_pengajuan ?>" data-pagination="false" data-single-select="true" data-search="false" data-click-to-select="true" data-group-by="true" data-group-by-field="nama_rekening" class="table table-bordered table-sm" data-show-footer="true" data-side-pagination="client">
                    <thead class="thead-light table-bordered text-center">
                        <tr>
                            <th data-checkbox="true" rowspan="2" data-valign="middle"></th>
                            <th data-field="kode_rekening" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2">Kode Rekening</th>
                            <!-- <th data-field="nmRekening" data-width="5" data-width-unit="%" >Nama Rekening</th> -->
                            <th data-field="keterangan" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2">Keterangan</th>
                            <th data-field="penerima" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2">Penerima</th>
                            <th colspan="3">Item Detail</th>
                            <th data-field="subtotal" rowspan="2" data-formatter="formatRupiah" data-valign="middle">Subtotal</th>
                            <th colspan="5">Pajak Detail</th>
                            <th data-field="jumlah" data-width="20" data-width-unit="%" data-formatter="formatRupiah" data-valign="middle" data-footer-formatter="footerJumlah" rowspan="2">Jumlah Pengajuan</th>
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
                </table>
            </div>
        </div>
        <div class="card-body">
            <button id="btn-aju" class="btn btn-success btn-block" onclick="save('<?= $permohonan->kode_pengajuan ?>')">Ajukan</button>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-3">Bukti</div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-2">
                        <div id="pdfcontainer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const uang = new Intl.NumberFormat('ID-id', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    });
    const url = '<?= "isrekening?kode=" . $permohonan->kode_pengajuan ?>';
    $(document).ready(function() {
        $.fn.select2.defaults.set("theme", "bootstrap");
        $('#table1').bootstrapTable();
        $('.uang').mask('000.000.000.000.000', {
            reverse: true
        });
        fetchRekening(url);
        const validat = validate(url);
        console.log('validat', validat)
        if(validat){
            console.log('url', url)
            $('#btn-aju').prop('disabled',false)
        }
        const options = {
            beforeSubmit: showRequest,
            url: 'addtocartbku',
            success: showResponse,
            resetForm: true
        };
        $('#ff').ajaxForm(options);

        $('#fileBukti').change(function(e) {
            console.log('e', e)
            calculate();
        });
    });
</script>