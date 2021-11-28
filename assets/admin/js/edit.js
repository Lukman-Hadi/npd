function showResponse(responseText, statusText, xhr, $form) {
    const result = eval('(' + responseText + ')');
    console.log('result', result)
    if (result.message) {
        Toast.fire({
            type: 'success',
            title: '' + result.message + '.'
        })
        $('#table').bootstrapTable('refresh');
        $("#kd_program").prop("disabled", true);
        $("#kd_kegiatan").prop("disabled", true);
        $("#kd_sub").prop("disabled", true);
        $("#pptk").prop("disabled", true);
    }else{
        Toast.fire({
            type: 'error',
            title: '' + result.message + '.'
        }) 
    }
}

function showRequest(formData, jqForm, options) {
    console.log('formData', formData)
    calculate();
    return true;
}
$('#jumlah').click(e => calculate());

function calculate() {
    let harga = parseInt($('input[name=harga]').val().replace(/[.]/g, ""), 10);
    let total = parseInt($('input[name=total]').val(), 10);
    let subtotal = harga * total;
    $('#jumlah').val(new Intl.NumberFormat('ID-id').format(subtotal));
}

function formatRupiah(val, row) {
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

function edit(){
    let row = $("#table").bootstrapTable('getSelections')[0];
    console.log('row', row)
    $('input[name=keterangan]').prop('readonly',false);
    $('input[name=satuan]').prop('readonly',false);
    $('input[name=harga]').prop('readonly',false);
    $('input[name=total]').prop('readonly',false);
    $('input[name=keterangan]').val(row.keterangan);
    $('input[name=satuan]').val(row.satuan);
    $('input[name=harga]').val(new Intl.NumberFormat('ID-id').format(row.harga));
    $('input[name=total]').val(row.total);
    $('input[name=id_pengajuan]').val(row.id_pengajuan);
    $('input[name=id_pengajuan_detail]').val(row.id_pengajuan_detail);
    $('input[name=id_pengajuan_rincian]').val(row.id_pengajuan_rincian);
    $('input[name=jumlah_lama]').val(row.jumlah);
}

function remove() {
    let row = $("#table").bootstrapTable('getSelections')[0];
    if (row) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.post('destroypengajuan', {
                    id: row.id_pengajuan_rincian,
                    idpengajuan: row.id_pengajuan,
                }, function(result) {
                    if (result.errorMsg) {
                        Toast.fire({
                            type: 'error',
                            title: '' + result.errorMsg + '.'
                        })
                    } else {
                        Toast.fire({
                            type: 'success',
                            title: '' + result.message + '.'
                        })
                        $('#table').bootstrapTable('refresh');
                    }
                }, 'json');
            }
        })
    }
}

function save() {
    const id = $('#table').bootstrapTable('getData')[0].id_pengajuan;
    console.log('id', id)
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {
            $.post('../approve/approve',{id}, function(result) {
                if (result.errorMsg) {
                    Toast.fire({
                        type: 'error',
                        title: '' + result.errorMsg + '.'
                    })
                } else {
                    Toast.fire({
                        type: 'success',
                        title: '' + result.message + '.'
                    })
                    $('#table').bootstrapTable('refresh');
                    window.location.replace('../approve');
                }
            }, 'json');
        }
    })
}