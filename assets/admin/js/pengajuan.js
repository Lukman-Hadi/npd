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
$('#kd_program').on('select2:closing', function(e) {
    $('#kd_kegiatan').empty().trigger("change");
    $('#kd_sub').empty().trigger("change");
    $('#kd_rekening').empty().trigger("change");
    $('#tersedia').val('');
    let program = $('#kd_program').select2('data')[0];
    idProgram = program.id;
    nmProgram = program.nm;
    idBidang = program.bidang;
    console.log('program', program)
    $.ajax({
        url: `subkegiatan/iskegiatan?id=${program.id}`,
        type: 'get',
        dataType: 'json',
        success: function(data) {
            let res = data.map((d) => {
                return {
                    id: d._id,
                    text: `(${d.kode_kegiatan}) - ${d.nama_kegiatan}`,
                    nm: d.kode_kegiatan
                }
            })
            console.log('res', res);
            $('#kd_kegiatan').select2({
                placeholder: "Pilih Kode Kegiatan",
                allowClear: false,
                data: res
            })
        }
    });
});
$('#kd_kegiatan').on('select2:closing', function(e) {
    $('#kd_sub').empty().trigger("change");
    $('#kd_rekening').empty().trigger("change");
    $('#tersedia').val('');
    let kegiatan = $('#kd_kegiatan').select2('data')[0];
    idKegiatan = kegiatan.id;
    nmKegiatan = kegiatan.nm;
    $.ajax({
        url: `rekening/issub?id=${kegiatan.id}`,
        type: 'get',
        dataType: 'json',
        success: function(data) {
            let res = data.map((d) => {
                return {
                    id: d._id,
                    text: `(${d.kode_sub}) - ${d.nama_sub}`,
                    nm: d.kode_sub
                }
            })
            console.log('res', res);
            $('#kd_sub').select2({
                placeholder: "Pilih Kode Sub Kegiatan",
                allowClear: false,
                data: res
            });
        }
    })
});
$('#kd_sub').on('select2:closing', function(e) {
    $('#kd_rekening').empty().trigger("change");
    $('#tersedia').val('');
    let sub = $('#kd_sub').select2('data')[0];
    idSub = sub.id;
    nmSub = sub.nm;
    $.ajax({
        url: `transaksi/isrekening?id=${sub.id}`,
        type: 'get',
        dataType: 'json',
        success: function(data) {
            let res = data.map((d) => {
                return {
                    id: d._id,
                    text: `(${d.kode_rekening}) - ${d.nama_rekening}`,
                    nm: d.kode_rekening,
                    ma: d.nama_rekening,
                    p: d.pagu
                }
            })
            console.log('data', data)
            $('#kd_rekening').select2({
                placeholder: "Pilih Kode Sub Kegiatan",
                allowClear: false,
                data: res
            });
        }
    })
});
$('#kd_rekening').on('select2:closing', function(e) {
    let tersedia = $('#kd_rekening').select2('data')[0];
    $('#tersedia').val(uang.format(tersedia.p));
    $('input[name=nm_program]').val(nmProgram);
    $('input[name=id_program]').val(idProgram);
    $('input[name=id_kegiatan]').val(idKegiatan);
    $('input[name=nm_kegiatan]').val(nmKegiatan);
    $('input[name=id_sub]').val(idSub);
    $('input[name=nm_sub]').val(nmSub);
    $('input[name=nm_rekening]').val(tersedia.nm);
    $('input[name=ma_rekening]').val(tersedia.ma);
    $('input[name=id_bidang]').val(idBidang);
});
// $('#ff').on('submit', function(e) {
//     e.preventDefault();
//     const string = $('#ff').serialize();
//     $.ajax({
//         type: "POST",
//         url: 'transaksi/addToCartNew',
//         data: string,
//         success: (result) => {
//             console.log('result', result)
//             var result = eval('(' + result + ')');
//             if (result.errorMsg) {
//                 Toast.fire({
//                     type: 'error',
//                     title: '' + result.errorMsg + '.'
//                 })
//             } else {
//                 Toast.fire({
//                     type: 'success',
//                     title: '' + result.message + '.'
//                 })
//                 $('#table').bootstrapTable('refresh');
//                 $("#kd_program").prop("disabled", true);
//                 $("#kd_kegiatan").prop("disabled", true);
//             }
//             $('#table').bootstrapTable('refresh');
//         },
//     })
// });

function formatRupiah(val, row) {
    console.log('row', row)
    // let num = row.jumlah
    // let numFor = 'Rp ' + num.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.");
    return uang.format(row.jumlah);
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

function remove() {
    let row = $("#table").bootstrapTable('getSelections');
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
                let data = row.map(r => r._id);
                $.post('transaksi/remove', {
                    id: data[0]
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
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {
            $.get('transaksi/save', function(result) {
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