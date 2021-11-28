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
        <button class="btn btn-outline-primary btn-sm py-0 m-0" data-toggle="tooltip" data-placement="top" onclick="openMod('${row._id}')"  title="Track Pengajuan"><span class="btn-inner--icon"><i class="fa fa-poll"></i></span></button>
        <button class="btn btn-success btn-sm py-0 m-0 pengajuan" title="Lihat Pengajuan" onclick="detail('${row.kode_pengajuan}')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>
    </div>
    </div>`
}
function detail(n){
    window.location.replace("detail/"+n);
}