$(document).ready(function () {    
    
    $('.btn1').click(function (evt) {
        evt.preventDefault();
        var id = $(this).val();
        var nombre = $('input[name=nombre_usu]').val();
        sighMjsConfirm({
                    title:'Eliminar usuario',
                    message:'<div class="col-md-12">'+
                                '<div class="form-group no-margin">'+
                                    '<input hidden type="text" name="id" value="'+id+'" >'+
                                    '<label> DESEA ELIMINAR EL USUARIO </label>'+
                                '</div>'+
                            '</div>',
                    size:'small'
                },function (cb) {
                    if(cb==true){
                            sighMsjLoading();
                            sighAjaxPost2({
                                id:$('input[name=id]').val()
                            },base_url()+"usuarios/eliminar",function (response) {
                                console.log(response);
                                bootbox.hideAll();
                                location.reload();
                                console.log('usuario eliminado');
                            })
                    }
                });
    });

    $('.btnmodificar').click(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var id = $(this).val();
        bootbox.hideAll();
        location.href = base_url() + 'usuarios/registrar?id=' + id + '&accion=mod';
    });
    
    $('.formulario-guardar-usuario').submit(function (evt) {
        evt.preventDefault();
        var formdata = new FormData($('.formulario-guardar-usuario')[0]);
        con1 = $('input[name=contrasena]').val();
        con2 = $('input[name=contrasena2]').val();

        if(con1==con2){
            alert("asdasd");
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
        }else{
            sighMsjError("LAS CONTRASEÑAS NO COINCIDEN");
        }
        
    });
    
    
    $('.formulario-cambiar-contra').submit(function (evt) {
        evt.preventDefault();
        var datos = $(this).serialize();
        var c2 = $(".c2").val();
        var c3 = $(".c3").val();
        if(c2 == c3){
            sighAjaxPost2(datos,base_url()+"usuarios/confirmar_contrasena",function (response) {
                if(response.r){
                    sighAjaxPost2(datos,base_url()+"usuarios/cambiar_contrasena",function (response2) {
                        if (response2.r) {
                            sighMsj("SUS DATOS SE GUARDARON CORRECTAMENTE");
                            setTimeout(() => {
                                location.href=base_url()+'provedores';
                            }, 600);
                        }else{
                            sighMsjError("OCURIO UN ERROR AL GUARDAR SUS DATOS");
                        }
                    });
                }else{
                    sighMsjErrormsj("LA CONTRASEÑA NO COINCIDE");
                }
            });
        }else{
            sighMsjErrormsj("LAS CONTRASEÑAS NO COINCIDEN");
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