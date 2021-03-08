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
    let urlForm = 
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

    function fetchRekening(url) {
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                console.log('data', data)
                let res = data.map((d) => {
                    return {
                        id: d._id,
                        text: `(${d.kode_rekening}) - ${d.nama_rekening} - ${d.keterangan} - (${uang.format(parseInt(d.jumlah,10))})`,
                        kd: d.kode_rekening,
                        nm: d.nama_rekening,
                        idRek: d.id_rekening,
                        ket: d.keterangan,
                        harga: d.harga,
                        jumlah: d.jumlah,
                        satuan: d.satuan,
                        total: d.total,
                        idRinci: d.rincian_id
                    }
                })
                $('#id_pengajuan').select2({
                    placeholder: "Pilih Kode Rekening",
                    allowClear: false,
                    data: res
                });
            },
            error: function(e) {
                console.log('e', e)
            }
        });
    }
    function validate(url) {
        
    }

    function showResponse(responseText, statusText, xhr, $form) {
        console.log({
            responseText,
            statusText,
            xhr,
            $form
        });
        var result = eval('(' + responseText + ')');
        if (result.errorMsg) {
            Toast.fire({
                type: 'error',
                title: '' + result.errorMsg + '.'
            })
        } else {
            Toast.fire({
                type: 'success',
                title: '' + result.message + '.'
        })
        $('#table').bootstrapTable('refresh');
        $('#id_pengajuan').empty().trigger("change");
        fetchRekening(url);
        };
    }

    function showRequest(formData, jqForm, options) {
        calculate();
        const file = $("#fileBukti").val();
        const ext = file.split('.').pop().toLowerCase();
        if(file){
            if (ext == 'pdf') {
                return true;
            } else {
                Toast.fire({
                    type: 'error',
                    title: 'File Harus Pdf'
                })
                return false;
            }
        }else{
            return true;
        }
    }
    $('#id_pengajuan').on('select2:closing', function(e) {
        let rekening = $('#id_pengajuan').select2('data')[0];
        $('input[name=keterangan]').val(rekening.ket);
        $('input[name=satuan]').val(rekening.satuan);
        $('input[name=id_pengajuan_rincian]').val(rekening.idRinci);
        $('input[name=harga]').val(new Intl.NumberFormat('ID-id').format(rekening.harga));
        $('input[name=total]').val(rekening.total);
        $('input[name=jumlah]').val(new Intl.NumberFormat('ID-id').format(rekening.jumlah));
        $('input[name=penerima]').prop('readonly', false);
        $('input[name=pph21]').prop('readonly', false);
        $('input[name=pph22]').prop('readonly', false);
        $('input[name=pph23]').prop('readonly', false);
        $('input[name=pphd]').prop('readonly', false);
        $('input[name=ppn]').prop('readonly', false);
    });
    function calculate() {
        let pph21 = parseInt($('input[name=pph21]').val().replace(/[.]/g, ""), 10);
        let pph22 = parseInt($('input[name=pph22]').val().replace(/[.]/g, ""), 10);
        let pph23 = parseInt($('input[name=pph23]').val().replace(/[.]/g, ""), 10);
        let pphd = parseInt($('input[name=pphd]').val().replace(/[.]/g, ""), 10);
        let ppn = parseInt($('input[name=ppn]').val().replace(/[.]/g, ""), 10);
        let jumlah = parseInt($('input[name=jumlah]').val().replace(/[.]/g, ""), 10);
        let subtotal = jumlah - (pph21 + pph22 + pph23 + pphd + ppn);
        $('#subtotal').val(new Intl.NumberFormat('ID-id').format(subtotal));
    }

    function buktiFormatter(val, row) {
        if (val) {
            return `<button onclick="openpdf('${val}')" class="btn btn-info btn-sm py-0 m-0"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>`
        } else {
            return 'Belum Upload Bukti'
        }
    }

    function formatRupiah(val, row) {
        if (val) {
            return uang.format(val);
        } else {
            return '-'
        }
    };

    function footerJumlah(data, footerValue) {
        console.log('data', data)
        console.log('footerValue', footerValue)
        let sum = 0;
        data.map((e) => {
            sum += parseInt(e.jumlah, 10);
            console.log('e.jumlah', e.jumlah)
        })
        return uang.format(sum);
    };

    function remove() {
        let row = $("#table").bootstrapTable('getSelections');
        if (row) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    let data = row.map(r => r._id);
                    $.post('removebku', {
                        id: data[0]
                    }, function(result) {
                        if (result.errorMsg) {
                            Toast.fire({
                                type: 'error',
                                title: '' + result.errorMsg + '.'
                            })
                        } else {
                            Toast.fire({
                                type: 'success',
                                title: '' + result.message + '.'
                            })
                            $('#table').bootstrapTable('refresh');
                        }
                    }, 'json');
                }
            })
        }
    }

    function edit(){
        const row = $('#table').bootstrapTable('getSelections')[0];
        console.log('row', row);
        $('input[name=keterangan]').val(row.keterangan);
        $('input[name=id_pengajuan_detail]').val(row.id_pengajuan_detail);
        $('#id_pengajuan').prop('disabled',true);
        $('input[name=satuan]').val(row.satuan);
        $('input[name=id_pengajuan_rincian]').val(row._id);
        $('input[name=harga]').val(new Intl.NumberFormat('ID-id').format(row.harga));
        $('input[name=total]').val(row.total);
        $('input[name=jumlah]').val(new Intl.NumberFormat('ID-id').format(row.jumlah));
        $('input[name=penerima]').prop('readonly', false);
        $('input[name=pph21]').prop('readonly', false);
        $('input[name=pph22]').prop('readonly', false);
        $('input[name=pph23]').prop('readonly', false);
        $('input[name=pphd]').prop('readonly', false);
        $('input[name=ppn]').prop('readonly', false);
        $('input[name=penerima]').val(row.penerima);
        $('input[name=pph21]').val(row.pph21);
        $('input[name=pph22]').val(row.pph22);
        $('input[name=pph23]').val(row.pph23);
        $('input[name=pphd]').val(row.pphd);
        $('input[name=ppn]').val(row.ppn);
        $('input[name=bukti]').prop('required',false);
    } 

    function save(kode) {
        console.log('kode', kode)
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit!'
        }).then((result) => {
            if (result.value) {
                $.post('approve',{id: $('input[name=id_pengajuan_master]').val()},function(result) {
                    if (result.errorMsg) {
                        Toast.fire({
                            type: 'error',
                            title: '' + result.errorMsg + '.'
                        })
                    } else {
                        Toast.fire({
                            type: 'success',
                            title: '' + result.message + '.'
                        })
                        $('#table').bootstrapTable('refresh');
                        window.location.replace('../approve');
                    }
                }, 'json');
            }
        })
    }

    function openpdf(link) {
        eModal.iframe('../assets/bukti/' + link, 'Bukti');
    }
</script>