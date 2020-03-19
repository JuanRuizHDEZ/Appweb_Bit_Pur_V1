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

    $('.formulario-guardar-ventas').submit(function (evt) {
        evt.preventDefault();
        var datos = $(this).serialize();
        
        garafones = $('input[name=gar]').val();
        objg = "";
        sellos = $('input[name=sell]').val();
        objs = "";
        tapas = $('input[name=tap]').val();
        objt = "";
        garafonesactualizar = 0;
        pg = true;
        sellosactualizar = 0;
        ps = true;
        tapasactualizar = 0;
        pt = true;

        //obtenemos datos para saber si se puede realizar la venta
        sighAjaxPost2({},base_url()+"ventas/obtenerproductos",function (response){
            if(response){
                for(i=0;i<response.length;i++){
                    if(response[i]['id_objeto']==1){
                        if(garafones>0){
                            garafonesactualizar = response[i]['cantidad'] - garafones;
                            objg = response[i];
                            if(garafonesactualizar<0){
                                sighMsjErrormsj("NO HAY SUFICIENTES GARAFONES");
                                pg = false;
                            }
                        }
                    }
                    if(response[i]['id_objeto']==3){
                        if(sellos>0){
                            sellosactualizar = response[i]['cantidad'] - sellos;
                            objs = response[i];
                            if(sellosactualizar<0){
                                sighMsjErrormsj("NO HAY SUFICIENTES SELLOS");
                                ps = false;
                            }
                        }
                    }
                    if(response[i]['id_objeto']==2){
                        if(tapas>0){
                            tapasactualizar = response[i]['cantidad'] - tapas;
                            objt = response[i];
                            if(tapasactualizar<0){
                                sighMsjErrormsj("NO HAY SUFICIENTES TAPAS");
                                pt = false;
                            }
                        }
                    }
                }

                if(pg && ps && pt ){
                    subtotalg = garafones * objg['precio'];
                    subtotals = sellos * objs['precio'];
                    subtotalt = tapas * objt['precio'];
                    total = subtotalg+subtotals+subtotalt;
                    //console.log(datos);
                    sighAjaxPost2({
                        "total" : total,
                        "accion" : "add",
                        "id_objetog":objg['id_objeto'],
                        "cantidadg":garafones,
                        "subg":subtotalg,
                        "id_objetos":objs['id_objeto'],
                        "catidads":sellos,
                        "subs":subtotals,
                        "id_objetot":objt['id_objeto'],
                        "cantidadt":tapas,
                        "subt":subtotalt,
                        "actg":garafonesactualizar,
                        "acts":sellosactualizar,
                        "actt":tapasactualizar
                    },base_url()+"ventas/guardar_venta",function (response) {
                        if(response.resultado && response.resultado2){
                            sighMsj("SUS DATOS SE GUARDARON CORRECTAMENTE");
                            location.reload();
                            setTimeout(() => {
                            location.reload(); 
                            }, 5000);
                        }else{
                            sighMsjErrormsj("OCURRIO UN ERROR INESPERADO AL GUARDAR SUS DATOS");
                        }
                        
                    });
                    
                }else{
                    
                }
            }
        });
        
    });
    $('.btn-cancelar-tabla').click(function (evt){
        evt.preventDefault();
        location.href=base_url()+"recordatorio";
    });    
});