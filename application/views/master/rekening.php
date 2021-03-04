<style>
    td {white-space: normal !important;};
</style>
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0"><?= $title ?></h6>
				</div>
				<div class="col-lg-6 col-5 col-md-12 text-right">
				<?php $hak = privilegeCheck(); foreach($hak as $ha){
                        $can = $ha->nama_progress;?>
					<?php if($can == 'Entry Data Baru'){
						echo '<button type="button" class="btn btn-md btn-neutral" onclick="newForm()">Entry Baru</button>';
					}else if($can == 'Edit Data'){
						echo '<button type="button" class="btn btn-md btn-warning" onclick="editForm()">Edit Data</button>';
					}else if($can == 'Hapus Data'){
						echo '<button type="button" class="btn btn-md btn-danger" onclick="destroy()">Hapus Data</button>';
					}else if($can == 'Aktivasi'){
						echo '<button type="button" class="btn btn-md btn-info" onclick="aktif()">Aktivasi</button>';
					}
					?>
				<?php };?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
	<!-- Table -->
	<div class="row">
		<div class="col">
			<div class="card">
				<!-- Card header -->
				<div class="card-header">
					<h3 class="mb-0">List Rekening Kegiatan</h3>
					<p class="text-sm mb-0">
						This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
					</p>
				</div>

				<div class="table-responsive py-2 px-4">
					<table id="table"
						   data-toggle="table"
						   data-url="rekening/getData"
						   data-pagination="true"
						   data-search="true"
						   data-click-to-select="true"
						   class="table "
						   data-side-pagination="server">
						<thead class="thead-light">
							<tr>
								<th data-checkbox="true"></th>
								<!-- <th data-field="no" data-formatter="nomerFormatter" data-width="5" data-width-unit="%">No</th> -->
								<th data-field="kode_program" data-sortable="true" data-width="5" data-width-unit="%" >Kode Program</th>
								<th data-field="kode_kegiatan" data-sortable="true" data-width="5" data-width-unit="%" >Kode Kegiatan</th>
								<th data-field="kode_sub" data-sortable="true" data-width="5" data-width-unit="%" >Kode Sub Kegiatan</th>
								<th data-field="kode_rekening" data-sortable="true" data-width="5" data-width-unit="%" >Kode Rekening Kegiatan</th>
								<th data-field="nama_rekening" data-width="50" data-width-unit="%" >Nama Rekening Kegiatan</th>
								<th data-field="pagu" data-width="20" data-width-unit="%" data-sortable="true" data-formatter="formatRupiah">Pagu Kegiatan</th>
								<th data-field="status" data-width="10" data-width-unit="%" data-formatter="statusFormatter">Status</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-form" role="dialog" aria-labelledby="modal-form" aria-hidden="true" data-focus="false">
	<div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary border-0 mb-0">
					<div class="card-header bg-transparent pb-5">
						<div class="text-muted text-center mt-2 mb-3">Input Data Kegiatan Baru</div>
					</div>
					<div class="card-body px-lg-5 py-lg-2">
						<form id="ff" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Kode Program</label>
								<select id="kd_program" name="id_program" class="form-control select2-single" required><option></option></select>
							</div>
							<div class="form-group">
								<label>Kode Kegiatan</label>
								<select id="kd_kegiatan" name="id_kegiatan" class="form-control select2-single" required><option></option></select>
							</div>
							<div class="form-group">
								<label>Kode Sub Kegiatan</label>
								<select id="kd_sub" name="id_sub" class="form-control select2-single" required><option></option></select>
							</div>
							<div class="form-group">
								<label>Kode Rekening Kegiatan</label>
								<input type="text" name="kode_rekening" class="form-control" placeholder="Kode Sub Kegiatan" required>
							</div>
							<div class="form-group">
								<label>Pagu Kegiatan</label>
								<input type="text" id="pagu" name="pagu" class="form-control" placeholder="Kode Sub Kegiatan" required onchange="onChng()">
							</div>
							<div class="form-group">
								<label>Nama Rekening Kegiatan</label>
								<textarea name="nama_rekening" class="form-control" cols="30" rows="10" required></textarea>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary my-4">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$.fn.select2.defaults.set( "theme", "bootstrap" );
        $('#table').bootstrapTable();
        $('#pagu').mask('000.000.000.000.000', {reverse: true});
		fetchProgram();
    })
    function onChng(){
        console.log($('#pagu').val());
    }
	function nomerFormatter(value, row, i) {
		return i+1;
	}
	function formatRupiah(val, row){
        let num = 'Rp ' + (row.pagu).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.");
	    return num;
	}
	function statusFormatter(val,r){
		return r.status==1?'<span class="badge badge-pill badge-success">Active</span>':'<span class="badge badge-pill badge-danger">Innactive</span>'
	}
	function destroy(){
        let row = $("#table").bootstrapTable('getSelections');
        console.log('row', row)
		if(row.length>0){
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
					console.log('data', data)
					$.post('rekening/delete',{id:data},function(result){
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
	function aktif(){
        let row = $("#table").bootstrapTable('getSelections')[0];
        console.log('row', row)
		if(row){
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes'
				}).then((result) => {
				if (result.value) {
					$.post('rekening/aktif',{id:row._id},function(result){
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
	function editForm(){
		var row = $("#table").bootstrapTable('getSelections')[0];
		console.log('row', row);

		if (row){
			$('#modal-form').modal('toggle');
			$('#kd_program').val(row.id_program).trigger('change.select2');
			fetchKegiatan(row.id_program);
			$('#kd_kegiatan').val(row.id_kegiatan).trigger('change.select2');
			fetchSub(row.id_kegiatan);
			$('#kd_sub').val(row.id_sub).trigger('change.select2');
			$('input[name=pagu]').val(new Intl.NumberFormat('id-ID').format(row.pagu))
			$('input[name=kode_rekening]').val(row.kode_rekening);
			$('textarea[name=nama_rekening]').val(row.nama_rekening);
			url = 'rekening/update?id='+row._id;
		}
	}
	function newForm(){
		$('#modal-form').modal('toggle');
		$('#ff').trigger("reset");
		url = 'rekening/save';
	}
	function fetchProgram(){
		$.ajax({
			url: 'kegiatan/isprogram',
			type: 'get',
			dataType: 'json',
			success: function (data){
				let res = data.map((d)=>{
					return {id:d._id,text:`(${d.kode_program}) - ${d.nama_program}`}
				})
				$('#kd_program').select2({
					placeholder: "Pilih Kode Program",
					allowClear: false,
					data: res
				});
			}
        });
	}
	function fetchKegiatan(id){
		$.ajax({
			url: `subkegiatan/iskegiatan?id=${id}`,
			type: 'get',
			dataType: 'json',
			success: function (data){
				let res = data.map((d)=>{
					return {id:d._id,text:`(${d.kode_kegiatan}) - ${d.nama_kegiatan}`}
				})
				console.log('res', res);
				$('#kd_kegiatan').select2({
					placeholder: "Pilih Kode Kegiatan",
					allowClear: false,
					data: [{id:'', text:''},...res]
				})
			}
		});
	}
	function fetchSub(id){
		$.ajax({
			url: `rekening/issub?id=${id}`,
			type: 'get',
			dataType: 'json',
			success: function (data){
				let res = data.map((d)=>{
					return {id:d._id,text:`(${d.kode_sub}) - ${d.nama_sub}`}
                })
                console.log('res', res);
				$('#kd_sub').select2({
					placeholder: "Pilih Kode Sub Kegiatan",
					allowClear: false,
					data: [{id:'', text:''},...res]
				});
                }
            })
	}
		
	$('#kd_program').on('select2:closing', function (e) {
		$('#kd_kegiatan').empty().trigger("change");
		let id = $('#kd_program').val();
		fetchKegiatan(id);
	});
	$('#kd_kegiatan').on('select2:closing', function (e) {
		$('#kd_sub').empty().trigger("change");
		let id = $('#kd_kegiatan').val();
		fetchSub(id);
	});
	$('#ff').on('submit', function (e) {
	e.preventDefault();
	const string = $('#ff').serialize();
		$.ajax({
			type: "POST",
			url: url,
			data: string,
			success: (result)=>{
				console.log('result', result)
				var result = eval('('+result+')');
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
					$('#modal-form').modal('toggle');		// close the dialog
					$('#table').bootstrapTable('refresh');
				}
			},
		})
	})
</script>