<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0"><?= $title ?></h6>
				</div>
				<div class="col-lg-6 col-5 text-right">
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
					<h3 class="mb-0">List Program</h3>
					<p class="text-sm mb-0">
						This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
					</p>
				</div>

				<div class="table-responsive py-2 px-4">
					<table id="table"
						   data-toggle="table"
						   data-url="bidang/getData"
						   data-pagination="true" 
						   data-search="true"
						   data-click-to-select="true"
						   class="table table-sm" 
						   data-side-pagination="server">
						<thead class="thead-light">
							<tr>
								<th data-checkbox="true"></th>
								<th data-field="no" data-formatter="nomerFormatter" data-width="5" data-width-unit="%">No</th>
								<th data-field="nama_bidang" data-width="85" data-width-unit="%" >Nama Bidang</th>
								<th data-field="status" data-width="10" data-width-unit="%" data-formatter="statusFormatter">Status</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary border-0 mb-0">
					<div class="card-header bg-transparent pb-5">
						<div class="text-muted text-center mt-2 mb-3">Input Data Bidang Baru</div>
					</div>
					<div class="card-body px-lg-5 py-lg-2">
						<form id="ff" method="post" enctype="multipart/form-data" class="needs-validation">
							<div class="form-group">
								<label>Nama Bidang</label>
								<input type="text" name="nama_bidang" class="form-control" placeholder="Nama Bidang" required>
								<div class="invalid-feedback">
									Please choose a username.
								</div>
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
	function nomerFormatter(value, row, i) {
		return i+1;
	}
	function statusFormatter(val,r){
		return r.status==1?'<span class="badge badge-pill badge-success">Active</span>':'<span class="badge badge-pill badge-danger">Innactive</span>'
	}
	function destroy(){
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
					console.log('data', data)
					$.post('bidang/delete',{id:data},function(result){
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
					$.post('bidang/aktif',{id:row._id},function(result){
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
		console.log('row', row)
		if (row){
			$('#modal-form').modal('toggle');
			$('input[name=nama_bidang]').val(row.nama_bidang);
			url = 'bidang/update?id='+row._id;
		}
	}
	function newForm(){
		$('#modal-form').modal('toggle');
		$('#ff').trigger("reset");
		url = 'bidang/save';
	}
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