function nomerFormatter(value, row, i) {
    return i+1;
}
function statusFormatter(val,r){
    return r.status==1?'<span class="badge badge-pill badge-success">Active</span>':'<span class="badge badge-pill badge-danger">Innactive</span>'
}
function imageFormatter(val,r){
    if (r.foto == '' || r.foto == null){
    return '<img class="rounded-circle" src="<?= base_url() ?>/assets/avatars/profil.png" width="25">';		
}else{
    return '<img class="rounded-circle" src="<?= base_url() ?>/assets/avatars/'+r.foto+'" width="25">';
}
}
function destroy(){
    let row = $("#table").bootstrapTable('getSelections')[0];
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
                let data = row._id;
                console.log('data', data)
                $.post('user/delete',{id:data},function(result){
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
                $.post('user/aktif',{id:row._id},function(result){
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
    console.log('row', row)
    if (row){
        $('#modal-form').modal('toggle');
        $('input[name=nama_user]').val(row.nama_user);
        $('input[name=username]').val(row.uname);
        $('input[name=email]').val(row.email);
        $('input[name=no_hp]').val(row.no_hp);
        $('textarea[name=alamat]').val(row.alamat);
        $('input[name=id_bidang]').val(row.id_bidang);
        url = 'user/update?id='+row._id;
    }
}
function newForm(){
    $('#modal-form').modal('toggle');
    $('#ff').trigger("reset");
    url = 'user/save';
}
$('form#ff').on('submit', function (e) {
    e.preventDefault();
    let data = new FormData(this);
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        cache: false,
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
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