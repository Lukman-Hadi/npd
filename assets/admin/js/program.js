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
    if(row){
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
                $.post('program/delete',{id:data},function(result){
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
                $.post('program/aktif',{id:row._id},function(result){
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
        $('input[name=kode_program]').val(row.kode_program);
        $('#bidang').val(row.id_bidang).trigger('change.select2');
        $('textarea[name=nama_program]').val(row.nama_program);
        url = 'program/update?id='+row._id;
    }
}
function newForm(){
    $('#modal-form').modal('toggle');
    $('#ff').trigger("reset");
    url = 'program/save';
}
function fetchData(){
    $.ajax({
        url: 'bidang/isbidang',
        type: 'get',
        dataType: 'json',
        success: function (data){
            let res = data.map((d)=>{
                return {id:d._id,text:d.nama_bidang}
            })
            $('#bidang').select2({
                placeholder: "Pilih Bidang",
                allowClear: false,
                data: [{id:'',text:''},...res]
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