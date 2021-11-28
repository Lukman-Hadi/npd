function kasi_akses(id_menu) {
	//alert(id_menu);

	//alert(level);
	$.ajax({
		url: "<?=base_url()?>proses/aksesmenu",
		data: "menu_id=" + id_menu + "&level=" + level,
	});
}

function nomerFormatter(value, row, i) {
	return i + 1;
}
function statusFormatter(val, r) {
	return r.status == 1
		? '<span class="badge badge-pill badge-success">Active</span>'
		: '<span class="badge badge-pill badge-danger">Innactive</span>';
}
function aksesMenu() {
	let row = $("#table").bootstrapTable("getSelections")[0];
	if (row) {
		window.location.replace("akses/" + row._id);
	}
}
function aksesProses() {
	let row = $("#table").bootstrapTable("getSelections")[0];
	if (row) {
		window.location.replace("approve/" + row._id);
	}
}
function destroy() {
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
				console.log("data", data);
				$.post(
					"jabatan/delete",
					{ id: data },
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
function aktif() {
	let row = $("#table").bootstrapTable("getSelections")[0];
	if (row) {
		Swal.fire({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes",
		}).then((result) => {
			if (result.value) {
				$.post(
					"jabatan/aktif",
					{ id: row._id },
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
function editForm() {
	var row = $("#table").bootstrapTable("getSelections")[0];
	console.log("row", row);
	if (row) {
		$("#modal-form").modal("toggle");
		$("input[name=nama_jabatan]").val(row.nama_jabatan);
		url = "jabatan/update?id=" + row._id;
	}
}
function newForm() {
	$("#modal-form").modal("toggle");
	$("#ff").trigger("reset");
	url = "jabatan/save";
}
$("#ff").on("submit", function (e) {
	e.preventDefault();
	const string = $("#ff").serialize();
	$.ajax({
		type: "POST",
		url: url,
		data: string,
		success: (result) => {
			console.log("result", result);
			var result = eval("(" + result + ")");
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
				$("#modal-form").modal("toggle"); // close the dialog
				$("#table").bootstrapTable("refresh");
			}
		},
	});
});
