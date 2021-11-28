function nomerFormatter(value, row, i) {
    return i+1;
}
function formatRupiah(val, row){
    console.log('row', row)
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
                console.log('data', data)
                $.post('kegiatan/delete',{id:data},function(result){
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
                $.post('kegiatan/aktif',{id:row._id},function(result){
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
    console.log('row', row);
    fetchData();
    if (row){
        $('#modal-form').modal('toggle');
        $('input[name=kode_kegiatan]').val(row.kode_kegiatan);
        $('#kd_program').val(row.id_program).trigger('change.select2');
        $('textarea[name=nama_kegiatan]').val(row.nama_kegiatan);
        url = 'kegiatan/update?id='+row._id;
    }
}
function newForm(){
    $('#modal-form').modal('toggle');
    $('#ff').trigger("reset");
    url = 'kegiatan/save';
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
$('#ff').on('submit', function (e) {
e.preventDefault();
const string = $('#ff').serialize();
    $.ajax({
        type: "POST",
        url: url,
        data: string,
        success: (result)=>{
            console.log('result', result)
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