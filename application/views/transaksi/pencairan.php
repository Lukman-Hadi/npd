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
<script>
const uang = new Intl.NumberFormat('ID-id', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    });
	$(document).ready(function(){
        $('#table').bootstrapTable();
	})
	function rupiahFormatter(val, row){
		return uang.format(val);
	}
	function tglFormatter(val, row){
		let date =  new Date(val);
		return date.toLocaleDateString('id-ID',{year:'numeric',month:'long',day:'numeric'})
	}
	function aksiFormatter(val, row){
		console.log('{val,row}', {val,row})
		return `
        <div class="col-12 p-0 text-center">
        <div class="row d-flex justify-content-around">
            <button class="btn btn-outline-primary btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" title="Track Pengajuan"><span class="btn-inner--icon"><i class="fa fa-poll"></i></span></button>
            <button class="btn btn-success btn-sm py-0 m-0 pengajuan" title="Lihat Pengajuan" onclick="detail('${row.kode_pengajuan}')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>
        </div>
        </div>`
	}
	function detail(n){
		window.location.replace("detail/"+n);
	}
</script>