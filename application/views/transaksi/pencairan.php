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
						<?= $description ?>
					</p>
				</div>

				<div class="table-responsive py-2 px-4">
					<table id="table"
						   data-toggle="table"
						   data-url="showPencairan"
						   data-pagination="true" 
						   data-search="true"
						   data-click-to-select="true"
						   class="table table-sm" 
						   data-side-pagination="server">
						<thead class="thead-light text-center">
							<tr>
								<th data-field="kode_pencairan" data-width="10" data-width-unit="%" >No Pencairan</th>
								<th data-field="kode_pengajuan" data-width="10" data-width-unit="%" >No Pengajuan</th>
								<th data-field="nama_user" data-sortable="true" >Diajukan Oleh</th>
								<th data-field="nama_pptk" data-sortable="true" >PPTK</th>
								<th data-field="nama_bidang" data-sortable="true" data-width="10" data-width-unit="%" >Bidang</th>
								<th data-field="total" data-width="15" data-width-unit="%" data-formatter="rupiahFormatter" >Total yang Diminta</th>
								<th data-field="tgl_pengajuan" data-width="5" data-width-unit="%" data-formatter="tglFormatter">Diajukan Tanggal</th>
								<th data-field="tgl_pencairan" data-width="5" data-width-unit="%" data-formatter="tglFormatter">Dicairkan Tanggal</th>
								<th data-field="status" data-width="5" data-width-unit="%">Status Pencairan</th>
								<th data-formatter="aksiFormatter" data-width="10" data-width-unit="%" >Aksi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
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
	const uang = new Intl.NumberFormat('ID-id', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    });
	$(document).ready(function(){
        $('#table').bootstrapTable();
	})
	const urlTimeline = '<?= base_url() ?>approve/timeline';
</script>