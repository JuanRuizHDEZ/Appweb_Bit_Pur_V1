$(document).ready(function () {    
    
    $('.btneliminar').click(function (evt) {
        evt.preventDefault();
        var id = $(this).val();
        sighMjsConfirm({
                    title:'Eliminar cliente',
                    message:'<div class="col-md-12">'+
                                '<div class="form-group no-margin">'+
                                    '<input hidden type="text" name="id" value="'+id+'" >'+
                                    '<label> DESEA ELIMINAR EL CLIENTE </label>'+
                                '</div>'+
                            '</div>',
                    size:'small'
                },function (cb) {
                    if(cb==true){
                            sighMsjLoading();
                            sighAjaxPost2({
                                id:$('input[name=id]').val()
                            },base_url()+"clientes/eliminar",function (response) {
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
        location.href = base_url() + 'clientes/registro?id=' + id + '&accion=mod';
    });

    $('.formulario-guardar-cliente').submit(function (evt) {
        evt.preventDefault();
        var datos = $(this).serialize();
        console.log(datos);
        sighAjaxPost2(datos,base_url()+"clientes/guardar_cliente",function (response) {
            
            if(response.resultado){
                sighMsj("SUS DATOS SE GUARDARON CORRECTAMENTE");
                setTimeout(() => {
                    location.href=base_url()+'clientes';
                }, 600);
            }else{
                sighMsjErrormsj("OCURRIO UN ERROR INESPERADO AL GUARDAR SUS DATOS");
            }
            
        });
    });
    $('.btn-cancelar-tabla').click(function (evt){
        evt.preventDefault();
        location.href=base_url()+"clientes";
    });    
});