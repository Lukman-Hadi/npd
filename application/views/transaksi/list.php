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
					<h3 class="mb-0">Daftar Pengajuan</h3>
					<p class="text-sm mb-0">
						This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
					</p>
				</div>

				<div class="table-responsive py-2 px-4">
					<table id="table"
						   data-toggle="table"
						   data-url="showAll"
						   data-pagination="true" 
						   data-search="true"
						   data-click-to-select="true"
						   class="table table-sm" 
						   data-side-pagination="server">
						<thead class="thead-light">
							<tr>
								<!-- <th data-checkbox="true" data-width="1" data-width-unit="%"></th> -->
								<th data-field="no" data-formatter="nomerFormatter" data-width="1" data-width-unit="%">No</th>
								<th data-field="kode_pengajuan" data-sortable="true" data-width="15" data-width-unit="%" >Nomor Permohonan</th>
								<th data-field="nama_bidang" data-sortable="true" data-width="10" data-width-unit="%" >Bidang</th>
								<th data-field="nama_pptk" data-sortable="true" data-width="10" data-width-unit="%" >PPTK</th>
								<th data-field="nama_user" data-sortable="true" data-width="10" data-width-unit="%" >Yang Mengajukan</th>
								<th data-field="total" data-width="15" data-width-unit="%" data-formatter="formatRupiah">Total Permintaan</th>
								<th data-field="nama_progress" data-width="5" data-width-unit="%">Status</th>
								<th data-field="status" data-width="5" data-width-unit="%" data-formatter="statusFormatter">Action</th>
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
	const urlTimeline = '<?= base_url() ?>approve/timeline';
	function openMod(id){
		$('#modal-form-timeline').modal('toggle');
		let innerH = '';		
		$.ajax({
			type: "GET",
			url : `${urlTimeline}?id=${id}`,
			success : (r)=>{
				r.map((e)=>{
					innerH += `<div class="timeline-block mt-0 mb-0">
								<span class="timeline-step badge-success">
									<i class="ni ni-bell-55"></i>
								</span>
								<div class="timeline-content">
									<small class="text-muted font-weight-bold">${e.tgl}</small>
									<h5 class=" mt-1 mb-0">${e.nama_progress} oleh ${e.nama_user}</h5>
									<p class=" text-sm mt-0 mb-0">${e.catatan}</p>
								</div>
							</div>`
				});
				$('#content-timeline').html(innerH);
			},
			error : (e)=>{
				console.log('e', e)
			}
		})
	}
    const uang = new Intl.NumberFormat('ID-id', {
        style: 'currency',
        currency: 'IDR'
    });
    function nomerFormatter(value, row, i) {
		return i+1;
	}
    function formatRupiah(val, row){
        // let num = row.jumlah
        // let numFor = 'Rp ' + num.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.");
	    return uang.format(row.total);
    };
    function statusFormatter(val, row){
        return `
        <div class="col-12 p-0 text-center">
        <div class="row d-flex justify-content-around">
            <button class="btn btn-outline-primary btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" onclick="openMod('${row._id}')" title="Track Pengajuan"><span class="btn-inner--icon"><i class="fa fa-poll"></i></span></button>
            <button class="btn btn-success btn-sm py-0 m-0 pengajuan" title="Lihat Pengajuan" onclick="detail('${row.kode_pengajuan}')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>
        </div>
        </div>`
	}
	function detail(n){
		window.location.replace("detail/"+n);
	}
</script>