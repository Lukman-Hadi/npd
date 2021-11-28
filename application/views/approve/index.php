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
<!-- Page content -->
<div class="container-fluid mt--6">
	<!-- Table -->
	<div class="row">
		<div class="col">
			<div class="card">
				<!-- Card header -->
				<div class="card-header">
					<h3 class="mb-0"><?= $subtitle ?></h3>
					<p class="text-sm mb-0">
						<?= $description; ?>,
					</p>
				</div>

				<div class="table-responsive py-2 px-4">
					<table id="table" data-toggle="table" data-url="approve/getApprove" data-pagination="true" data-search="true" data-click-to-select="true" class="table table-sm" data-side-pagination="server">
						<thead class="thead-light">
							<tr>
								<!-- <th data-checkbox="true" data-width="1" data-width-unit="%"></th> -->
								<th data-field="no" data-formatter="nomerFormatter" data-width="1" data-width-unit="%">No</th>
								<th data-field="kode_pengajuan" data-sortable="true" data-width="15" data-width-unit="%">Nomor Permohonan</th>
								<th data-field="nama_bidang" data-sortable="true" data-width="10" data-width-unit="%">Bidang</th>
								<th data-field="nama_user" data-sortable="true" data-width="10" data-width-unit="%">Diajukan Oleh</th>
								<th data-field="nama_pptk" data-sortable="true" data-width="10" data-width-unit="%">PPTK</th>
								<th data-field="total" data-width="15" data-width-unit="%" data-formatter="formatRupiah">Total Permintaan</th>
								<th data-field="nama_progress" data-width="5" data-width-unit="%">Status</th>
								<th data-field="status" data-width="10" data-width-unit="%" data-formatter="statusFormatter">Action</th>
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
					<div class="card-header bg-transparent p-0 m-0">
						<div class="text-muted text-center mt-2 mb-3">Berikan Catatan</div>
					</div>
					<div class="card-body px-lg-5 py-lg-2">
						<form id="ff" method="post" enctype="multipart/form-data" class="needs-validation">
							<div class="form-group">
								<input type="text" name="catatan" class="form-control" placeholder="Catatan">
							</div>
							<input id="id_pengajuan" type="text" name="id" class="form-control" placeholder="Catatan" hidden>
							<div class="text-center">
								<button type="submit" class="btn btn-primary my-4">Approve</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-form-acc" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary border-0 mb-0">
					<div class="card-header bg-transparent p-0 m-0">
						<div class="text-muted text-center mt-2 mb-3">Data Pencairan</div>
					</div>
					<div class="card-body px-lg-5 py-lg-2">
						<form id="ff" method="post" enctype="multipart/form-data" class="needs-validation">
							<div class="form-group">
								<input type="text" name="cair" class="form-control" placeholder="NOMOR PENCAIRAN">
							</div>
							<input id="id_pengajuan" type="text" name="id" class="form-control" placeholder="Catatan" hidden>
							<div class="text-center">
								<button type="submit" class="btn btn-primary my-4">Approve</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- timeline -->
<div class="modal fade" id="modal-form-timeline" role="dialog" aria-labelledby="modal-form" aria-hidden="true" data-focus="false">
	<div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card">
					<div class="card-header bg-transparent">
						<h5 class="mb-0">Riwayat Pengajuan</h5>
					</div>
					<div class="card-body">
						<div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
							<div id="content-timeline">

							</div>
							<!-- <div class="timeline-block mt-0 mb-0">
								<span class="timeline-step badge-success">
									<i class="ni ni-bell-55"></i>
								</span>
								<div class="timeline-content">
									<small class="text-muted font-weight-bold">Tanggal</small>
									<h5 class=" mt-1 mb-0">Di ACCC  OLEH</h5>
									<p class=" text-sm mt-0 mb-0">Catatan</p>
								</div>
							</div>
							<div class="timeline-block mt-0 mb-0">
								<span class="timeline-step badge-danger">
									<i class="ni ni-bell-55"></i>
								</span>
								<div class="timeline-content">
									<small class="text-muted font-weight-bold">Tanggal</small>
									<h5 class=" mt-1 mb-0">Di REJ  OLEH</h5>
									<p class=" text-sm mt-0 mb-0">Catatan</p>
								</div>
							</div>
							<div class="timeline-block mt-0 mb-0">
								<span class="timeline-step badge-info">
									<i class="ni ni-bell-55"></i>
								</span>
								<div class="timeline-content">
									<small class="text-muted font-weight-bold">Tanggal</small>
									<h5 class=" mt-1 mb-0">Input BKU  OLEH</h5>
									<p class=" text-sm mt-0 mb-0">Catatan</p>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	const urlTimeline = '<?= base_url() ?>approve/timeline';
</script>