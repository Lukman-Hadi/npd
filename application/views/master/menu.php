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
					<h3 class="mb-0"><?= $subtitle ?></h3>
					<p class="text-sm mb-0">
						<?= $description ?>
					</p>
				</div>

				<div class="table-responsive py-2 px-4">
					<table id="table"
						   data-toggle="table"
						   data-url="getdatamenu"
						   data-pagination="true" 
						   data-search="true"
						   data-click-to-select="true"
						   class="table table-sm" 
						   data-side-pagination="server">
						<thead class="thead-light">
							<tr>
								<th data-width="2" data-width-unit="%" data-checkbox="true"></th>
								<th data-field="judul" >Judul Menu</th>
								<th data-field="link" data-width="10" data-width-unit="%" >Link Menu</th>
								<th data-field="icon" data-width="10" data-width-unit="%" >Class Icon</th>
								<th data-field="main" data-sortable="true" data-width="10" data-width-unit="%" >Main Menu</th>
								<th data-field="status" data-sortable="true" data-width="5" data-width-unit="%" >Status</th>
								<th data-field="ordinal" data-width="5" data-width-unit="%" >Urutan</th>
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
						<div class="text-muted text-center mt-2 mb-3">Input Data Menu Baru</div>
					</div>
					<div class="card-body px-lg-5 py-lg-2">
						<form id="ff" method="post" enctype="multipart/form-data" class="needs-validation">
							<div class="form-group">
								<label>Nama Menu</label>
								<input type="text" name="judul" class="form-control form-control-sm" placeholder="Judul Menu" required>
							</div>
							<div class="form-group">
								<label>Link Menu</label>
								<input type="text" name="link" class="form-control form-control-sm" placeholder="ex: lorem/dolor/sit" required>
							</div>
							<div class="form-group">
								<label>Icon</label>
								<input id="icon" type="text" name="icon" class="form-control form-control-sm" placeholder="ex: fas fa-xx" required>
							</div>
							<div class="form-group">
								<label>Main Menu</label>
								<select id="main_menu" name="id_main" class="form-control select2-single" required><option></option></select>
							</div>
							<div class="form-group">
								<label>Urutan</label>
								<input type="number" name="ordinal" class="form-control form-control-sm" placeholder="Urutan Menu">
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
		$.ajax({
			url: 'ismainmenu',
			type: 'get',
			dataType: 'json',
			success: function (data){
				let res = data.map((d)=>{
					return {id:d._id,text:d.judul}
				})
				$('#main_menu').select2({
					placeholder: "Pilih Main Menu",
					allowClear: false,
					data: res
				});
			}
		})
	})
</script>
