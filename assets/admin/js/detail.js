const uang = new Intl.NumberFormat('ID-id', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
});
function approve(id){
    $('#modal-form').modal('toggle');
    $('#ff').trigger("reset");
    $('#id_pengajuan').val(id);
    $('#inrbtn').text('Approve');
    url = '../approve';
}
function reject(id) {
    $('#modal-form').modal('toggle');
    $('#ff').trigger("reset");
    $('#id_pengajuan').val(id);
    $('#inrbtn').text('Reject');
    url = '../reject';
}
$('#ff').on('submit', function(e) {
    e.preventDefault();
    const string = $('#ff').serialize();
    $.ajax({
        type: "POST",
        url: url,
        data: string,
        success: (result) => {
			console.log(url);
            var result = eval('(' + result + ')');
            if (result.errorMsg) {
                Toast.fire({
                    type: 'error',
                    title: '' + result.errorMsg + '.'
                })
            } else if (result.openMsg) {
                $('#modal-form').modal('toggle');
                $('#modal-form-acc').modal('toggle');
            } else {
                Toast.fire({
                    type: 'success',
                    title: '' + result.message + '.'
                })
                $('#modal-form').modal('toggle'); // close the dialog
                $('#table').bootstrapTable('refresh');
                window.location.replace('../../');
            }
        },
    })
})

function formatRupiah(val, row) {
    return uang.format(val);
};

function footerRupiah(val, row){
    let sum = 0;
    val.map((e) => {
        sum += parseInt(e.subtotal, 10);
    })
    return uang.format(sum);
}
function footerPajak(val, row){
    console.log('{val, row}', {val, row})
}

function footerJumlah(data, footerValue) {
    let sum = 0;
    data.map((e) => {
        sum += parseInt(e.jumlah, 10);
    })
    return uang.format(sum);
};
function buktiFormatter(val, row) {
    if (val) {
        return `<button onclick="openpdf('${val}')" class="btn btn-info btn-sm py-0 m-0"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>`
    } else {
        return 'Belum Upload Bukti'
    }
}
function openpdf(link) {
    eModal.iframe('../../assets/bukti/' + link, 'Bukti');
}
