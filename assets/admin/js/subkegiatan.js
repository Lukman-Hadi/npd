function nomerFormatter(value, row, i) {
    return i+1;
}
function formatRupiah(val, row){
    if(row.total){
        let num = 'Rp ' + (row.total).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.");
        return num;
    }else{
        return '-'
    }
}
function statusFormatter(val,r){
    return r.status==1?'<span class="badge badge-pill badge-success">Active</span>':'<span class="badge badge-pill badge-danger">Innactive</span>'
}
function destroy(){
    let row = $("#table").bootstrapTable('getSelections');
    if(row.length>0){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                let data = row.map(r=>r._id);
                $.post('subkegiatan/delete',{id:data},function(result){
                    if (result.errorMsg){
                        Toast.fire({
                        type: 'error',
                        title: ''+result.errorMsg+'.'
                        })
                    } else {
                        Toast.fire({
                        type: 'success',
                        title: ''+result.message+'.'
                        })
                        $('#table').bootstrapTable('refresh');
                    }
                },'json');
            }
        })
    }
}
function aktif(){
    let row = $("#table").bootstrapTable('getSelections')[0];
    if(row){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.value) {
                $.post('subkegiatan/aktif',{id:row._id},function(result){
                    if (result.errorMsg){
                        Toast.fire({
                        type: 'error',
                        title: ''+result.errorMsg+'.'
                        })
                    } else {
                        Toast.fire({
                        type: 'success',
                        title: ''+result.message+'.'
                        })
                        $('#table').bootstrapTable('refresh');
                    }
                },'json');
            }
        })
    }
}
function editForm(){
    var row = $("#table").bootstrapTable('getSelections')[0];
    fetchData();
    if (row){
        $('#modal-form').modal('toggle');
        $('#kd_program').val(row.id_program).trigger('change.select2');
        fetchKegiatan(row.id_program);
        $('#kd_kegiatan').val(row.id_kegiatan).trigger('change.select2');
        $('input[name=kode_sub]').val(row.kode_sub);
        $('textarea[name=nama_sub]').val(row.nama_sub);
        url = 'subkegiatan/update?id='+row._id;
    }
}
$('#modal-form').on('hidden.bs.modal',function(){
    $('#ff').trigger("reset");
    $('#ff').trigger("clear");
})
function newForm(){
    $('#modal-form').modal('toggle');
    $('#ff').trigger("reset");
    url = 'subkegiatan/save';
    fetchData();
}
function fetchData(){
    $.ajax({
        url: 'kegiatan/isprogram',
        type: 'get',
        dataType: 'json',
        success: function (data){
            let res = data.map((d)=>{
                return {id:d._id,text:`(${d.kode_program}) - ${d.nama_program}`}
            })
            $('#kd_program').select2({
                placeholder: "Pilih Kode Program",
                allowClear: false,
                data: res
            });
        }
    });
}
function fetchKegiatan(id){
    $.ajax({
        url: `subkegiatan/iskegiatan?id=${id}`,
        type: 'get',
        dataType: 'json',
        success: function (data){
            let res = data.map((d)=>{
                return {id:d._id,text:`(${d.kode_kegiatan}) - ${d.nama_kegiatan}`}
            })
            $('#kd_kegiatan').select2({
                placeholder: "Pilih Kode Kegiatan",
                allowClear: false,
                data: [{id:'',text:''},...res]
            });
        }
    });
}
$('#kd_program').on('change', function (e) {
    $('#kd_kegiatan').empty().trigger("change");
    let id = $('#kd_program').val();
    fetchKegiatan(id);
});

$('#ff').on('submit', function (e) {
    e.preventDefault();
    const string = $('#ff').serialize();
    $.ajax({
        type: "POST",
        url: url,
        data: string,
        success: (result)=>{
            var result = eval('('+result+')');
            if (result.errorMsg){
                Toast.fire({
                type: 'error',
                title: ''+result.errorMsg+'.'
                })
            } else {
                Toast.fire({
                type: 'success',
                title: ''+result.message+'.'
                })
                $('#modal-form').modal('toggle');		// close the dialog
                $('#table').bootstrapTable('refresh');
            }
        },
    })
})