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
function fetchTimeline(id){
    $.ajax({
        type: "GET",
        url : `${urlTimeline}?id=${id}`,
        success : (r)=>{
            return r;
        },
        error : (e)=>{
            console.log('e', e)
        }
    })
}
function approve(id) {
    $('#modal-form').modal('toggle');
    $('#ff').trigger("reset");
    $('#id_pengajuan').val(id);
    url = 'approve/approve';
}

function reject(id) {
    $('#modal-form').modal('toggle');
    $('#ff').trigger("reset");
    $('#id_pengajuan').val(id);
    url = 'approve/reject';
}
$('#ff').on('submit', function(e) {
    e.preventDefault();
    const string = $('#ff').serialize();
    $.ajax({
        type: "POST",
        url: url,
        data: string,
        success: (result) => {
            var result = eval('(' + result + ')');
            console.log('result', result)
            if (result.errorMsg) {
                Toast.fire({
                    type: 'error',
                    title: '' + result.errorMsg + '.'
                })
            } else if (result.openMsg) {
                console.log('testttttt');
                $('#modal-form').modal('toggle');
                $('#modal-form-acc').modal('toggle');
            } else {
                Toast.fire({
                    type: 'success',
                    title: '' + result.message + '.'
                })
                $('#modal-form').modal('toggle'); // close the dialog
                $('#table').bootstrapTable('refresh');
            }
        },
    })
})
const uang = new Intl.NumberFormat('ID-id', {
    style: 'currency',
    currency: 'IDR'
});

function nomerFormatter(value, row, i) {
    return i + 1;
}

function formatRupiah(val, row) {
    // let num = row.jumlah
    // let numFor = 'Rp ' + num.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.");
    return uang.format(row.total);
};

function statusFormatter(val, row) {
    console.log('row', row)
    if (row.kunci == 1) {
        return `
        <div class="col-12 p-0 text-center">
        <div class="row d-flex justify-content-around">
            <button class="btn btn-primary btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" title="Input BKU" onclick="bku('${row.kode_pengajuan}')"><span class="btn-inner--icon"><i class="fa fa-edit"></i></span></button>
            <button class="btn btn-outline-primary btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" onclick="openMod('${row._id}')" title="Track Pengajuan"><span class="btn-inner--icon"><i class="fa fa-poll"></i></span></button>
        </div>
        </div>`
    } else if (row.kunci == 0) {
        return `
        <div class="col-12 p-0 text-center">
        <div class="row d-flex justify-content-around">
            <button class="btn btn-primary btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" title="Edit Pengajuan" onclick="edit('${row.kode_pengajuan}')"><span class="btn-inner--icon"><i class="fa fa-edit"></i></span></button>
            <button class="btn btn-danger btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" title="Hapus Pengajuan" onclick="destroy('${row._id}','${row.kode_pengajuan}')"><span class="btn-inner--icon"><i class="fa fa-window-close"></i></span></button>
            <button class="btn btn-outline-primary btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" onclick="openMod('${row._id}')" title="Track Pengajuan"><span class="btn-inner--icon"><i class="fa fa-poll"></i></span></button>
        </div>
        </div>`
    } else {
        return `
        <div class="col-12 p-0 text-center">
        <div class="row d-flex justify-content-around">
            <button class="btn btn-primary btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" title="Approve" onclick="approve('${row._id}')"><span class="btn-inner--icon"><i class="fa fa-check"></i></span></button>
            <button class="btn btn-danger btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" title="Tolak" onclick="reject('${row._id}')"><span class="btn-inner--icon"><i class="fa fa-window-close"></i></span></button>
            <button class="btn btn-outline-primary btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" onclick="openMod('${row._id}')" title="Track Pengajuan"><span class="btn-inner--icon"><i class="fa fa-poll"></i></span></button>
            <button class="btn btn-success btn-sm py-0 m-0 pengajuan" title="Lihat Pengajuan" onclick="detail('${row.kode_pengajuan}')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>
        </div>
        </div>`
    }
}

function detail(n) {
    window.location.replace("approve/detail/" + n);
}

function bku(id) {
    window.location.replace("approve/bku?id=" + id);
}

function edit(id) {
    window.location.replace("transaksi/edit?id=" + id);
}

function destroy(id, kodePengajuan) {
    const data = {
        id,
        kodePengajuan
    }
    console.log('data', data)
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete!'
    }).then((result) => {
        if (result.value) {
            $.post('transaksi/destroypengajuanmaster', data, function(result) {
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
