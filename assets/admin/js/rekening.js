function nomerFormatter(value, row, i) {
    return i+1;
}
function formatRupiah(val, row){
    let num = 'Rp ' + (row.pagu).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.");
    return num;
}
function statusFormatter(val,r){
    return r.status==1?'<span class="badge badge-pill badge-success">Active</span>':'<span class="badge badge-pill badge-danger">Innactive</span>'
}
function destroy(){
    let row = $("#table").bootstrapTable('getSelections');
    console.log('row', row)
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
                $.post('rekening/delete',{id:data},function(result){
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
    console.log('row', row)
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
                $.post('rekening/aktif',{id:row._id},function(result){
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

    if (row){
        $('#modal-form').modal('toggle');
        $('#kd_program').val(row.id_program).trigger('change.select2');
        fetchKegiatan(row.id_program);
        $('#kd_kegiatan').val(row.id_kegiatan).trigger('change.select2');
        fetchSub(row.id_kegiatan);
        $('#kd_sub').val(row.id_sub).trigger('change.select2');
        $('input[name=pagu]').val(new Intl.NumberFormat('id-ID').format(row.pagu))
        $('input[name=kode_rekening]').val(row.kode_rekening);
        $('textarea[name=nama_rekening]').val(row.nama_rekening);
        url = 'rekening/update?id='+row._id;
    }
}
function newForm(){
    $('#modal-form').modal('toggle');
    $('#ff').trigger("reset");
    url = 'rekening/save';
}
function fetchProgram(){
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
            console.log('res', res);
            $('#kd_kegiatan').select2({
                placeholder: "Pilih Kode Kegiatan",
                allowClear: false,
                data: [{id:'', text:''},...res]
            })
        }
    });
}
function fetchSub(id){
    $.ajax({
        url: `rekening/issub?id=${id}`,
        type: 'get',
        dataType: 'json',
        success: function (data){
            let res = data.map((d)=>{
                return {id:d._id,text:`(${d.kode_sub}) - ${d.nama_sub}`}
            })
            console.log('res', res);
            $('#kd_sub').select2({
                placeholder: "Pilih Kode Sub Kegiatan",
                allowClear: false,
                data: [{id:'', text:''},...res]
            });
            }
        })
}
    
$('#kd_program').on('select2:closing', function (e) {
    $('#kd_kegiatan').empty().trigger("change");
    let id = $('#kd_program').val();
    fetchKegiatan(id);
});
$('#kd_kegiatan').on('select2:closing', function (e) {
    $('#kd_sub').empty().trigger("change");
    let id = $('#kd_kegiatan').val();
    fetchSub(id);
});
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