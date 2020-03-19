$(document).ready(function () {    
    
    $('.btneliminar').click(function (evt) {
        evt.preventDefault();
        var id = $(this).val();
        sighMjsConfirm({
                    title:'Eliminar recordatorio',
                    message:'<div class="col-md-12">'+
                                '<div class="form-group no-margin">'+
                                    '<input hidden type="text" name="id" value="'+id+'" >'+
                                    '<label> DESEA ELIMINAR EL RECORDATORIO </label>'+
                                '</div>'+
                            '</div>',
                    size:'small'
                },function (cb) {
                    if(cb==true){
                            sighMsjLoading();
                            sighAjaxPost2({
                                id:$('input[name=id]').val()
                            },base_url()+"recordatorio/eliminar",function (response) {
                                console.log(response);
                                bootbox.hideAll();
                                location.reload();
                                console.log('cliente eliminado');
                            })
                    }
                });
    });

    $('.btnmodificar').click(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var id = $(this).val();
        bootbox.hideAll();
        location.href = base_url() + 'recordatorio/registro?id=' + id + '&accion=mod';
    });

    $('.formulario-guardar-recordatorio').submit(function (evt) {
        evt.preventDefault();
        var datos = $(this).serialize();
        console.log(datos);
        sighAjaxPost2(datos,base_url()+"recordatorio/guardar_recordatorio",function (response) {
            
            if(response.resultado){
                sighMsj("SUS DATOS SE GUARDARON CORRECTAMENTE");
                setTimeout(() => {
                    location.href=base_url()+'recordatorio';
                }, 600);
            }else{
                sighMsjErrormsj("OCURRIO UN ERROR INESPERADO AL GUARDAR SUS DATOS");
            }
            
        });
    });
    $('.btn-cancelar-tabla').click(function (evt){
        evt.preventDefault();
        location.href=base_url()+"recordatorio";
    });    
});