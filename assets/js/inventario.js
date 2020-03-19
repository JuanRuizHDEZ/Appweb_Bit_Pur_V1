$(document).ready(function () {    
    
    $('.btneliminar').click(function (evt) {
        evt.preventDefault();
        var id = $(this).val();
        sighMjsConfirm({
                    title:'Eliminar Producto',
                    message:'<div class="col-md-12">'+
                                '<div class="form-group no-margin">'+
                                    '<input hidden type="text" name="id" value="'+id+'" >'+
                                    '<label> DESEA ELIMINAR EL PRODUCTO </label>'+
                                '</div>'+
                            '</div>',
                    size:'small'
                },function (cb) {
                    if(cb==true){
                            sighMsjLoading();
                            sighAjaxPost2({
                                id:$('input[name=id]').val()
                            },base_url()+"inventario/eliminar",function (response) {
                                console.log(response);
                                bootbox.hideAll();
                                location.reload();
                                console.log('Producto eliminado');
                            })
                    }
                });
    });

    $('.btnmodificar').click(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var id = $(this).val();
        bootbox.hideAll();
        location.href = base_url() + 'inventario/registro?id=' + id + '&accion=mod';
    });

    $('.formulario-guardar-inventario').submit(function (evt) {
        evt.preventDefault();
        var datos = $(this).serialize();
        console.log(datos);
        sighAjaxPost2(datos,base_url()+"inventario/guardar_producto",function (response) {
            
            if(response.resultado){
                sighMsj("SUS DATOS SE GUARDARON CORRECTAMENTE");
                setTimeout(() => {
                    location.href=base_url()+'inventario';
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