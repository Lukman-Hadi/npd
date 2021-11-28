<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Permohonan NPD No : <?= $permohonan->kode_pengajuan ?></h6><br>
					<h6 class="h2 text-white d-inline-block mb-0">Status Pengajuan : <?= $permohonan->nama_progress ?></h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            Diajukan Oleh  
                        </div>
                        <div class="col-sm-9 col-md-9">
                            : <?= $permohonan->nama_user ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            Bidang  
                        </div>
                        <div class="col-sm-9 col-md-9">
                            : <?= $permohonan->nama_bidang ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            Program
                        </div>
                        <div class="col-sm-9 col-md-9">
                            : <?= $detail[0]->nama_program ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            Kegiatan 
                        </div>
                        <div class="col-sm-9 col-md-9">
                            : <?= $detail[0]->nama_kegiatan ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            Nomor DPA-/DPAL-/DPPA-SKPD 
                        </div>
                        <div class="col-sm-9 col-md-9">
                            : <?= $permohonan->nama_user ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            Tahun Anggaran 
                        </div>
                        <div class="col-sm-9 col-md-9">
                            : <?= date('Y',strtotime($permohonan->created_at)) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            Jumlah yang diminta 
                        </div>
                        <div class="col-sm-9 col-md-9">
                            : Rp. <?= number_format($permohonan->total,2,',','.') ?> (<?= terbilang($permohonan->total)?> Rupiah)
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                        <table id="table"
                                data-toolbar="#toolbar"
                                data-toggle="table"
                                data-url="/npd/approve/getDetail/<?= $permohonan->kode_pengajuan ?>"
                                data-pagination="false"
                                data-search="false"
                                data-click-to-select="false"
                                class="table table-flush"
                                data-show-footer="true"
                                data-group-by = "true"
                                data-group-by-field = "nama_rekening"
                                data-side-pagination="client">
                                <thead class="thead-light text-center" style="white-space: normal;word-wrap:break-word;">
                                    <tr>
                                        <!-- <th data-field="no" data-formatter="nomerFormatter" data-width="5" data-width-unit="%">No</th> -->
                                        <th data-field="kode_program" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Program</th>
                                        <th data-field="kode_kegiatan" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Kegiatan</th>
                                        <th data-field="kode_sub" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Sub Kegiatan</th>
                                        <th data-field="kode_rekening" data-width="5" data-width-unit="%" rowspan="2" data-valign="middle">Kode Rekening Kegiatan</th>
                                        <th data-field="nama_rekening" data-width="10" data-width-unit="%" rowspan="2" data-valign="middle">Nama Rekening Kegiatan</th>
                                        <th colspan="4">Item Detail</th>
                                        <th data-field="jumlah" data-width="10" data-width-unit="%" data-formatter="formatRupiah" data-footer-formatter="footerJumlah" rowspan="2" data-valign="middle">Jumlah Pengajuan</th>
                                    </tr>
                                    <tr>
                                        <th data-field="keterangan" data-width="10" data-width-unit="%">Keterangan</th>
                                        <th data-field="satuan" data-width="10" data-width-unit="%">Satuan</th>
                                        <th data-field="harga" data-width="10" data-formatter="formatRupiah" data-width-unit="%">Harga</th>
                                        <th data-field="total" data-width="10" data-width-unit="%">Total</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <button class="btn btn-block btn-primary">
                                <span class="btn-inner--icon"><i class="fa fa-check"></i></span>
                                <span class="btn-inner--text">Approve</span>
                            </button>
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
        currency: 'IDR'
    });
function formatRupiah(val, row) {
        console.log('row', val)
        return uang.format(val);
    };

    function footerJumlah(data, footerValue) {
        console.log('data', data)
        console.log('footerValue', footerValue)
        let sum = 0;
        data.map((e) => {
            sum += parseInt(e.jumlah, 10);
            console.log('e.jumlah', e.jumlah)
        })
        return uang.format(sum);
    };
</script>