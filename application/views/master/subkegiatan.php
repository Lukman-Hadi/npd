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
					<h3 class="mb-0">List kegiatan</h3>
					<p class="text-sm mb-0">
						This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
					</p>
				</div>

				<div class="table-responsive py-2 px-4">
					<table id="table"
						   data-show-export="true"
						   data-export-types = '["excel"]'
						   data-toggle="table"
						   data-url="subkegiatan/getData"
						   data-pagination="true"
						   data-search="true"
						   data-click-to-select="true"
						   data-single-select="true"
						   class="table "
						   data-side-pagination="server">
						<thead class="thead-light">
							<tr>
								<th data-checkbox="true"></th>
								<!-- <th data-field="no" data-formatter="nomerFormatter" data-width="5" data-width-unit="%">No</th> -->
								<th data-field="kode_program" data-sortable="true" data-width="10" data-width-unit="%" >Kode Program</th>
								<th data-field="kode_kegiatan" data-sortable="true" data-width="10" data-width-unit="%" >Kode Kegiatan</th>
								<th data-field="kode_sub" data-sortable="true" data-width="10" data-width-unit="%" >Kode Sub Kegiatan</th>
								<th data-field="nama_sub" data-width="50" data-width-unit="%" >Nama Sub Kegiatan</th>
								<th data-field="total" data-width="10" data-width-unit="%" data-formatter="formatRupiah">Total Pagu</th>
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
								<input type="text" name="kode_sub" class="form-control" placeholder="Kode Sub Kegiatan" required>
							</div>
							<div class="form-group">
								<label>Nama Sub Kegiatan</label>
								<textarea name="nama_sub" class="form-control" cols="30" rows="10" required></textarea>
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
	})
</script>