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
					}?>
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
					<h3 class="mb-0">List Pegawai</h3>
					<p class="text-sm mb-0">
						This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
					</p>
				</div>

				<div class="table-responsive py-2 px-4">
					<table id="table"
						   data-toggle="table"
						   data-url="user/getData"
						   data-pagination="true"
						   data-search="true"
						   data-click-to-select="true"
						   data-single-select="true"
						   class="table table-sm"
						   data-side-pagination="server">
						<thead class="thead-light">
							<tr>
								<th data-checkbox="true"></th>
								<th data-field="nama_user" data-sortable="true" data-width="30" data-width-unit="%" >Nama</th>
								<th data-field="uname" data-sortable="true" data-width="20" data-width-unit="%" >Username</th>
								<th data-field="nama_jabatan" data-sortable="true" data-width="10" data-width-unit="%" >Jabatan</th>
								<th data-field="nama_bidang" data-sortable="true" data-width="10" data-width-unit="%" >Bidang</th>
								<th data-field="email" data-sortable="true" data-width="10" data-width-unit="%" >Email</th>
								<th data-field="foto" data-sortable="true" data-width="10" data-width-unit="%" data-formatter="imageFormatter" >Foto</th>
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
						<div class="text-muted text-center mt-2 mb-3">Input Data Pegawai Baru</div>
					</div>
					<div class="card-body px-lg-5 py-lg-2">
						<form id="ff" method="post" enctype="multipart/form-data" class="needs-validation">
							<div class="form-group mb-1">
								<label>Nama Pegawai</label>
								<input type="text" name="nama_user" class="form-control form-control-sm" placeholder="Nama Pegawai" required>
							</div>
							<div class="form-group mb-1">
								<label>Username</label>
								<input type="text" name="username" class="form-control form-control-sm" placeholder="Username" required>
							</div>
							<div class="form-group mb-1">
								<label>Password</label>
								<input type="password" name="pswd" class="form-control form-control-sm" placeholder="Password">
							</div>
							<div class="form-group mb-1">
								<label>Email</label>
								<input type="email" name="email" class="form-control form-control-sm" placeholder="ex: example@email.com" required>
							</div>
							<div class="form-group mb-1">
								<label>Telfon</label>
								<input type="number" name="no_hp" class="form-control form-control-sm" placeholder="ex: 0884xxxxx" required>
							</div>
							<div class="form-group mb-1">
								<label>Alamat</label>
								<textarea type="text" name="alamat" class="form-control form-control-sm" placeholder="Alamat" required></textarea>
							</div>
							<div class="form-group mb-1">
								<label>Bidang</label>
								<select id="bidang" name="id_bidang" class="form-control select2-single" required><option></option></select>
							</div>
							<div class="form-group mb-1">
								<label>Jabatan</label>
								<select id="jabatan" name="id_jabatan" class="form-control select2-single" required><option></option></select>
							</div>
							<div class="form-group mb-1">
								<label>Foto</label>
								<input type="file" name="foto" class="form-control">
							</div>
							<!-- <div class="form-group mb-1">
								<label>Foto</label>
								<div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang" lang="en" name="foto">
                                    <label class="custom-file-label" for="customFileLang">Pilih File</label>
                                </div>
							</div> -->
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
		$.ajax({
			url: 'bidang/isbidang',
			type: 'get',
			dataType: 'json',
			success: function (data){
				let res = data.map((d)=>{
					return {id:d._id,text:d.nama_bidang}
				})
				$('#bidang').select2({
					placeholder: "Pilih Bidang",
					allowClear: false,
					data: res
				});
			}
        });
        $.ajax({
			url: 'jabatan/isjabatan',
			type: 'get',
			dataType: 'json',
			success: function (data){
				let res = data.map((d)=>{
					return {id:d._id,text:d.nama_jabatan}
				})
				$('#jabatan').select2({
					placeholder: "Pilih Jabatan",
					allowClear: false,
					data: res
				});
			}
		});
	})
	function nomerFormatter(value, row, i) {
		return i+1;
	}
	function statusFormatter(val,r){
		return r.status==1?'<span class="badge badge-pill badge-success">Active</span>':'<span class="badge badge-pill badge-danger">Innactive</span>'
	}
	function imageFormatter(val,r){
		if (r.foto == '' || r.foto == null){
		return '<img class="rounded-circle" src="<?= base_url() ?>/assets/avatars/profil.png" width="25">';		
	}else{
		return '<img class="rounded-circle" src="<?= base_url() ?>/assets/avatars/'+r.foto+'" width="25">';
	}
	}
	function destroy(){
		let row = $("#table").bootstrapTable('getSelections')[0];
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
					let data = row._id;
					console.log('data', data)
					$.post('user/delete',{id:data},function(result){
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
					$.post('user/aktif',{id:row._id},function(result){
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
			$('input[name=nama_user]').val(row.nama_user);
			$('input[name=username]').val(row.uname);
			$('input[name=email]').val(row.email);
			$('input[name=no_hp]').val(row.no_hp);
			$('textarea[name=alamat]').val(row.alamat);
			$('input[name=id_bidang]').val(row.id_bidang);
			url = 'user/update?id='+row._id;
		}
	}
	function newForm(){
		$('#modal-form').modal('toggle');
		$('#ff').trigger("reset");
        url = 'user/save';
	}
	$('form#ff').on('submit', function (e) {
        e.preventDefault();
		let data = new FormData(this);
		$.ajax({
			type: "POST",
			url: url,
            data: data,
			cache: false,
			enctype: 'multipart/form-data',
            processData: false,  // Important!
			contentType: false,
			cache: false,
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