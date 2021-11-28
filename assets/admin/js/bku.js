function fetchRekening(url) {
	$.ajax({
		url: url,
		type: "get",
		dataType: "json",
		success: function (data) {
			console.log("data", data);
			let res = data.map((d) => {
				return {
					id: d._id,
					text: `(${d.kode_rekening}) - ${d.nama_rekening} - ${
						d.keterangan
					} - (${uang.format(parseInt(d.jumlah, 10))})`,
					kd: d.kode_rekening,
					nm: d.nama_rekening,
					idRek: d.id_rekening,
					ket: d.keterangan,
					harga: d.harga,
					jumlah: d.jumlah,
					satuan: d.satuan,
					total: d.total,
					idRinci: d.rincian_id,
				};
			});
			$("#id_pengajuan").select2({
				placeholder: "Pilih Kode Rekening",
				allowClear: false,
				data: res,
			});
		},
		error: function (e) {
			console.log("e", e);
		},
	});
}

function showResponse(responseText, statusText, xhr, $form) {
	console.log({
		responseText,
		statusText,
		xhr,
		$form,
	});
	var result = eval("(" + responseText + ")");
	if (result.errorMsg) {
		Toast.fire({
			type: "error",
			title: "" + result.errorMsg + ".",
		});
	} else {
		Toast.fire({
			type: "success",
			title: "" + result.message + ".",
		});
		$("#table").bootstrapTable("refresh");
		$("#id_pengajuan").empty().trigger("change");
		fetchRekening(url);
	}
}

function showRequest(formData, jqForm, options) {
	calculate();
	const file = $("#fileBukti").val();
	const ext = file.split(".").pop().toLowerCase();
	if (file) {
		if (ext == "pdf") {
			return true;
		} else {
			Toast.fire({
				type: "error",
				title: "File Harus Pdf",
			});
			return false;
		}
	} else {
		return true;
	}
}
$("#id_pengajuan").on("select2:closing", function (e) {
	let rekening = $("#id_pengajuan").select2("data")[0];
	$("input[name=keterangan]").val(rekening.ket);
	$("input[name=satuan]").val(rekening.satuan);
	$("input[name=id_pengajuan_rincian]").val(rekening.idRinci);
	$("input[name=harga]").val(
		new Intl.NumberFormat("ID-id").format(rekening.harga)
	);
	$("input[name=total]").val(rekening.total);
	$("input[name=jumlah]").val(
		new Intl.NumberFormat("ID-id").format(rekening.jumlah)
	);
	$("input[name=penerima]").prop("readonly", false);
	$("input[name=pph21]").prop("readonly", false);
	$("input[name=pph22]").prop("readonly", false);
	$("input[name=pph23]").prop("readonly", false);
	$("input[name=pphd]").prop("readonly", false);
	$("input[name=ppn]").prop("readonly", false);
});
function calculate() {
	let pph21 = parseInt($("input[name=pph21]").val().replace(/[.]/g, ""), 10);
	let pph22 = parseInt($("input[name=pph22]").val().replace(/[.]/g, ""), 10);
	let pph23 = parseInt($("input[name=pph23]").val().replace(/[.]/g, ""), 10);
	let pphd = parseInt($("input[name=pphd]").val().replace(/[.]/g, ""), 10);
	let ppn = parseInt($("input[name=ppn]").val().replace(/[.]/g, ""), 10);
	let jumlah = parseInt($("input[name=jumlah]").val().replace(/[.]/g, ""), 10);
	let subtotal = jumlah - (pph21 + pph22 + pph23 + pphd + ppn);
	$("#subtotal").val(new Intl.NumberFormat("ID-id").format(subtotal));
}

function buktiFormatter(val, row) {
	if (val) {
		return `<button onclick="openpdf('${val}')" class="btn btn-info btn-sm py-0 m-0"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>`;
	} else {
		return "Belum Upload Bukti";
	}
}

function formatRupiah(val, row) {
	if (val) {
		return uang.format(val);
	} else {
		return "-";
	}
}
function validate(url) {}

function footerJumlah(data, footerValue) {
	console.log("data", data);
	console.log("footerValue", footerValue);
	let sum = 0;
	data.map((e) => {
		sum += parseInt(e.jumlah, 10);
		console.log("e.jumlah", e.jumlah);
	});
	return uang.format(sum);
}

function remove() {
	let row = $("#table").bootstrapTable("getSelections");
	if (row) {
		Swal.fire({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!",
		}).then((result) => {
			if (result.value) {
				let data = row.map((r) => r._id);
				$.post(
					"removebku",
					{
						id: data[0],
					},
					function (result) {
						if (result.errorMsg) {
							Toast.fire({
								type: "error",
								title: "" + result.errorMsg + ".",
							});
						} else {
							Toast.fire({
								type: "success",
								title: "" + result.message + ".",
							});
							$("#table").bootstrapTable("refresh");
						}
					},
					"json"
				);
			}
		});
	}
}

function edit() {
	const row = $("#table").bootstrapTable("getSelections")[0];
	console.log("row", row);
	$("input[name=keterangan]").val(row.keterangan);
	$("input[name=id_pengajuan_detail]").val(row.id_pengajuan_detail);
	$("#id_pengajuan").prop("disabled", true);
	$("input[name=satuan]").val(row.satuan);
	$("input[name=id_pengajuan_rincian]").val(row._id);
	$("input[name=harga]").val(new Intl.NumberFormat("ID-id").format(row.harga));
	$("input[name=total]").val(row.total);
	$("input[name=jumlah]").val(
		new Intl.NumberFormat("ID-id").format(row.jumlah)
	);
	$("input[name=penerima]").prop("readonly", false);
	$("input[name=pph21]").prop("readonly", false);
	$("input[name=pph22]").prop("readonly", false);
	$("input[name=pph23]").prop("readonly", false);
	$("input[name=pphd]").prop("readonly", false);
	$("input[name=ppn]").prop("readonly", false);
	$("input[name=penerima]").val(row.penerima);
	$("input[name=pph21]").val(row.pph21);
	$("input[name=pph22]").val(row.pph22);
	$("input[name=pph23]").val(row.pph23);
	$("input[name=pphd]").val(row.pphd);
	$("input[name=ppn]").val(row.ppn);
	$("input[name=bukti]").prop("required", false);
}

function save(kode) {
	console.log("kode", kode);
	Swal.fire({
		title: "Are you sure?",
		text: "You won't be able to revert this!",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, Submit!",
	}).then((result) => {
		if (result.value) {
			$.post(
				"approve",
				{ id: $("input[name=id_pengajuan_master]").val() },
				function (result) {
					if (result.errorMsg) {
						Toast.fire({
							type: "error",
							title: "" + result.errorMsg + ".",
						});
					} else {
						Toast.fire({
							type: "success",
							title: "" + result.message + ".",
						});
						$("#table").bootstrapTable("refresh");
						window.location.replace("../approve");
					}
				},
				"json"
			);
		}
	});
}

function openpdf(link) {
	eModal.iframe("../assets/bukti/" + link, "Bukti");
}
