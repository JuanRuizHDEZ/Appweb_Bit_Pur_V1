$(document).ready(function () {    
    
    $('.btneliminar').click(function (evt) {
        evt.preventDefault();
        var id = $(this).val();
        sighMjsConfirm({
                    title:'Eliminar pedido',
                    message:'<div class="col-md-12">'+
                                '<div class="form-group no-margin">'+
                                    '<input hidden type="text" name="id" value="'+id+'" >'+
                                    '<label> DESEA ELIMINAR EL PEDIDO </label>'+
                                '</div>'+
                            '</div>',
                    size:'small'
                },function (cb) {
                    if(cb==true){
                            sighMsjLoading();
                            sighAjaxPost2({
                                id:$('input[name=id]').val()
                            },base_url()+"servicios/eliminar",function (response) {
                                console.log(response);
                                bootbox.hideAll();
                                location.reload();
                                console.log('usuario eliminado');
                            })
                    }
                });
    });
    
    $('.formulario-guardar-usuario').submit(function (evt) {
        evt.preventDefault();
        var formdata = new FormData($('.formulario-guardar-usuario')[0]);
        
        sighAjaxPost(formdata,base_url()+"usuarios/guardar_usuario",function (response) {
            console.log(response);
            if(response.resultado){
                
                if(response.acc == "mod2"){
                    //$('#imgant').val(response.img);
                    sighMsj("SUS DATOS SE GUARDARON CORRECTAMENTE");
                    location.reload();
                    setTimeout(() => {
                       location.reload(); 
                    }, 5000);
                }else{
                    location.href=base_url()+'usuarios';
                    
                }
            }
            
        });
    });
    
    
    $('.formulario-cambiar-contra').submit(function (evt) {
        evt.preventDefault();
        var datos = $(this).serialize();
        var c1 = $(".c1").val();
        var c2 = $(".c2").val();
        if(c1 == c2){
            sighAjaxPost2(datos,base_url()+"usuarios/confirmar_contrasena",function (response) {
                if(response.r){
                    sighAjaxPost2(datos,base_url()+"usuarios/cambiar_contrasena",function (response2) {
                        if (response2.r) {
                            sighMsj("SUS DATOS SE GUARDARON CORRECTAMENTE");
                        }else{
                            sighMsjError();
                        }
                    });
                }else{
                    sighMsjErrormsj("LAS CONTRASEÑAS NO COINCIDEN");
                }
            });
        }else{
            sighMsjErrormsj("LA CONTRASEÑA NO COINCIDE");
        }
        
    });





    //para cambiar la imagen en el apartado de perfil
    function preview(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#div-img").html("<img src='"+e.target.result+"' class='img-circle img_cambia'>");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#imagen').change(function (evt) {
        evt.preventDefault();
        preview(this);
    });
});