<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0"><?= $title ?></h6>
                </div>
                <!-- <div class="col-lg-6 col-5 col-md-12 text-right">
                    <button type="button" class="btn btn-md btn-neutral" onclick="newForm()">Entry Baru</button>
                    <button type="button" class="btn btn-md btn-danger" onclick="destroy()">Hapus Data</button>
                    <button type="button" class="btn btn-md btn-warning" onclick="editForm()">Edit Data</button>
                    <button type="button" class="btn btn-md btn-info" onclick="aktif()">Aktivasi</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <!-- <div class="card mb-4">
        <div class="card-header">
            <h3 class="mb-0">Pilih Rekening Kegiatan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive py-2 px-2">
                <table id="table1"
                        data-toggle="table"
                        class="table table-flush"
                        data-show-footer="true">
                    <thead class="thead-light">
                        <tr>
                            <th data-width="5" data-width-unit="%" >Kode Program</th>
                            <th data-width="5" data-width-unit="%" >Kode Kegiatan</th>
                            <th data-field="nm_sub" data-width="5" data-width-unit="%" >Kode Sub Kegiatan</th>
                            <th data-width="10" data-width-unit="%" >Kode Rekening Kegiatan</th>
                            <th data-width="30" data-width-unit="%" >Nama Rekening Kegiatan</th>
                            <th data-width="10" data-width-unit="%" data-formatter="formatRupiah" data-footer-formatter="footerJumlahFormat">Jumlah Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($detail as $d){?>
                        <tr>
                            <td><?= $d->kode_program ?></td>
                            <td><?= $d->kode_kegiatan ?></td>
                            <td><?= $d->kode_sub ?></td>
                            <td><?= $d->kode_rekening ?></td>
                            <td><?= $d->nama_rekening ?></td>
                            <td><?= $d->jumlah ?></td>
                        </tr>
                    <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
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
                            <input type="text" name="keterangan" class="form-control form-control-sm" placeholder="ex: Fotocopy, Honor">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="example3cols3Input">Penerima</label>
                            <input type="text" name="penerima" class="form-control form-control-sm" placeholder="ex: Toko anginribut, tn.xxx">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Satuan</label>
                                    <input type="text" name="satuan" class="form-control form-control-sm" placeholder="ex: dus, rim">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Harga</label>
                                    <input type="text" name="harga" class="form-control form-control-sm uang" placeholder="ex: 500000">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols2Input">Total</label>
                                    <input type="text" name="total" class="form-control form-control-sm" placeholder="ex: 10, 20">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="example4cols2Input">Subtotal</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-wallet fa-lg"></i></span>
                                </div>
                                <input id="subtotal" name="subtotal" type="text" class="form-control form-control-sm uang" placeholder="Sub Total" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Pph 21</label>
                                    <input type="text" name="pph21" class="form-control form-control-sm uang" name="jumlah" placeholder="PPH21">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Pph 22</label>
                                    <input type="text" name="pph22" class="form-control form-control-sm uang" name="jumlah" placeholder="PPH22">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Pph 23</label>
                                    <input type="text" name="pph23" class="form-control form-control-sm uang" name="jumlah" placeholder="PPH23">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Pphd</label>
                                    <input type="text" name="pphd" class="form-control form-control-sm uang" name="jumlah" placeholder="PPHD">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="example4cols2Input">Ppn</label>
                                    <input type="text" name="ppn" class="form-control form-control-sm uang" name="jumlah" placeholder="PPN">
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
                <input type="text" name="kd_rekening" hidden>
                <input type="text" name="nm_rekening" hidden>
                <input type="text" name="id_rekening" hidden>
                <input type="text" name="kd_pengajuan" value="<?=$permohonan->kode_pengajuan?>" hidden>
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
                    <button id="remove" class="btn btn-danger" onclick="remove()">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
                <table id="table"
                        data-toolbar="#toolbar"
                        data-toggle="table"
                        data-url="showbku?kode=<?=$permohonan->kode_pengajuan?>"
                        data-pagination="false"
                        data-search="false"
                        data-click-to-select="true"
                        data-group-by = "true"
                        data-group-by-field = "nmRekening"
                        class="table table-bordered table-sm"
                        data-show-footer="true"
                        data-side-pagination="client">
                    <thead class="thead-light table-bordered text-center">
                        <tr>
                            <th data-checkbox="true" rowspan="2" data-valign="middle"></th>
                            <th data-field="kdRekening" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2">Kode Rekening</th>
                            <!-- <th data-field="nmRekening" data-width="5" data-width-unit="%" >Nama Rekening</th> -->
                            <th data-field="keterangan" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2">Keterangan</th>
                            <th data-field="penerima" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2">Penerima</th>
                            <th colspan="3">Item Detail</th>
                            <th rowspan="2" data-valign="middle">Subtotal</th>
                            <th colspan="5">Pajak Detail</th>
                            <th data-field="jumlah" data-width="20" data-width-unit="%" data-formatter="formatRupiah" data-valign="middle" data-footer-formatter="footerJumlah" rowspan="2">Jumlah Pengajuan</th>
                            <th data-field="bukti" data-width="5" data-width-unit="%" data-valign="middle" rowspan="2" data-formatter="buktiFormatter">Bukti</th>
                        </tr>
                        <tr>
                            <th data-field="satuan" data-width="5" data-width-unit="%" >Satuan</th>
                            <th data-field="harga" data-width="50" data-width-unit="%" >Harga</th>
                            <th data-field="total" data-width="50" data-width-unit="%" >Total</th>
                            <th data-field="pph21" data-width="50" data-width-unit="%" >Pph 21</th>
                            <th data-field="pph22" data-width="50" data-width-unit="%" >Pph 22</th>
                            <th data-field="pph23" data-width="50" data-width-unit="%" >Pph 23</th>
                            <th data-field="pphd" data-width="50" data-width-unit="%" >Pphd</th>
                            <th data-field="ppn" data-width="50" data-width-unit="%" >Ppn</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-body">
            <button class="btn btn-success btn-block" onclick="save('<?=$permohonan->kode_pengajuan?>')">Ajukan</button>
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
        currency: 'IDR'
    });
    const url = '<?= "isrekening?kode=".$permohonan->kode_pengajuan ?>';
    $(document).ready(function() {
        $.fn.select2.defaults.set("theme", "bootstrap");
        $('#table1').bootstrapTable();
        $('.uang').mask('000.000.000.000.000', {
            reverse: true
        });
        fetchRekening(url);
        const options = {
            beforeSubmit: showRequest,
            url:'addtocartbku',
            success:showResponse,
            resetForm:true
        };
        $('#ff').ajaxForm(options);
        
        $('#fileBukti').change(function(e){
            console.log('e', e)
            calculate();
        });
    });
    function fetchRekening(url){
        $.ajax({
            url : url,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                console.log('data', data)
                let res = data.map((d) => {
                    return {
                        id: d._id,
                        text: `(${d.kode_rekening}) - ${d.nama_rekening} - ${keterangan} - (${uang.format(parseInt(d.jumlah,10))})`,
                        kd: d.kode_rekening,
                        nm: d.nama_rekening,
                        idRek: d.id_rekening,
                        ket: d.keterangan,
                        harga: d.harga,
                        jumlah: d.jumlah,
                        satuan: d.satuan,
                        total: d.total
                    }
                })
                $('#id_pengajuan').select2({
                    placeholder: "Pilih Kode Rekening",
                    allowClear: false,
                    data: res
                });
            },
            error: function(e){
                console.log('e', e)
            }
        });
    }
    function showResponse(responseText, statusText, xhr, $form){
        console.log({responseText, statusText, xhr, $form});
        $('#table').bootstrapTable('refresh');
        $('#id_pengajuan').empty().trigger("change");
        fetchRekening(url);
    };
    function showRequest(formData, jqForm, options) {
    calculate();  
    const file = $("#fileBukti").val();
    const ext = file.split('.').pop().toLowerCase();
    if(ext == 'pdf'){
        return true;
    }else{
        Toast.fire({
            type: 'error',
            title: 'File Harus Pdf'
        })
        return false;
    }
} 
    $('#id_pengajuan').on('select2:closing', function(e) {
        let rekening = $('#id_pengajuan').select2('data')[0];
        console.log('e', rekening)
        $('input[name=keterangan]').val(rekening.ket);
        $('input[name=keterangan]').prop('readonly',true);
    });
    // $('#ff').on('submit', function(e) {
    //     e.preventDefault();
    //     const string = $('#ff').serialize();
    //     $.ajax({
    //         type: "POST",
    //         url: 'transaksi/addToCart',
    //         data: string,
    //         success: (result) => {
    //             console.log('result', result)
    //             var result = eval('(' + result + ')');
    //             if (result.errorMsg) {
    //                 Toast.fire({
    //                     type: 'error',
    //                     title: '' + result.errorMsg + '.'
    //                 })
    //             } else {
    //                 Toast.fire({
    //                     type: 'success',
    //                     title: '' + result.message + '.'
    //             })
    //                 $('#table').bootstrapTable('refresh');
    //                 $("#kd_program").prop("disabled", true);
    //                 $("#kd_kegiatan").prop("disabled", true);
    //             }
    //             $('#table').bootstrapTable('refresh');
    //         },
    //     })
    // });
    
    function calculate(){
        let harga = parseInt($('input[name=harga]').val().replace(/[.]/g, ""),10);
        let total = parseInt($('input[name=total]').val(),10);
        let subtotal = harga*total;
        let pph21 = parseInt($('input[name=pph21]').val().replace(/[.]/g, ""),10);
        let pph22 = parseInt($('input[name=pph22]').val().replace(/[.]/g, ""),10);
        let pph23 = parseInt($('input[name=pph23]').val().replace(/[.]/g, ""),10);
        let pphd = parseInt($('input[name=pphd]').val().replace(/[.]/g, ""),10);
        let ppn = parseInt($('input[name=ppn]').val().replace(/[.]/g, ""),10);
        $('#subtotal').val(new Intl.NumberFormat('ID-id').format(subtotal));
        let grandTotal = subtotal+(pph21+pph22+pph23+pphd+ppn);
        $('#gtotal').val(new Intl.NumberFormat('ID-id').format(grandTotal));
    }

    function buktiFormatter(val, row){
        return `<button onclick="openpdf('${val}')" class="btn btn-info btn-sm py-0 m-0"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>`
    }

    function formatRupiah(val, row){
        console.log('row', row)
        console.log('val', val)
        // let num = row.jumlah
        // let numFor = 'Rp ' + num.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.");
	    return uang.format(val);
    };
    function footerJumlah(data, footerValue){
        console.log('data', data)
        console.log('footerValue', footerValue)
        let sum = 0;
        data.map((e)=>{
            sum+=parseInt(e.jumlah,10);
            console.log('e.jumlah', e.jumlah)
        })
        return uang.format(sum);
    };
    function remove(){
        let row = $("#table").bootstrapTable('getSelections');
		if(row){
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				if (result.value) {
					let data = row.map(r=>r._id);
					$.post('removebku',{id:data[0]},function(result){
						if (result.errorMsg){
							Toast.fire({
							type: 'error',
							title: ''+result.errorMsg+'.'
							})
						} else {
							Toast.fire({
							type: 'success',
							title: ''+result.message+'.'
							})
							$('#table').bootstrapTable('refresh');
						}
					},'json');
				}
			})
		}
    }
    function save(kode){
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
                $.get('approve/savebku',function(result){
                    if (result.errorMsg){
                        Toast.fire({
                        type: 'error',
                        title: ''+result.errorMsg+'.'
                        })
                    } else {
                        Toast.fire({
                        type: 'success',
                        title: ''+result.message+'.'
                        })
                        $('#table').bootstrapTable('refresh');
                    }
                },'json');
            }
        })
    }
    function openpdf(link){
        eModal.iframe('../assets/bukti/'+link,'Bukti');
    }   
</script>