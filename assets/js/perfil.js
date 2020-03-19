$(document).ready(function () {

    $('.formulario-guardar-perfil').submit(function (evt) {
        evt.preventDefault();
        var formdata = new FormData($('.formulario-guardar-perfil')[0]);
        
        sighAjaxPost(formdata,base_url()+"perfil/guardar_perfil",function (response) {
            console.log(response);
            if(response.resultado){
                sighMsj("SUS DATOS SE GUARDARON CORRECTAMENTE");
                
                setTimeout(() => {
                    location.reload(); 
                }, 5000);
            }else{
                sighMsjErrormsj("OCURRIÓ UN ERROR AL GUARDAR SUS DATOS");
            }
            
        });
    });
    
    
    $('.formulario-cambiar-contra').submit(function (evt) {
        evt.preventDefault();
        var datos = $(this).serialize();
        var c2 = $(".c2").val();
        var c3 = $(".c3").val();
        if(c2 == c3){
            sighAjaxPost2(datos,base_url()+"perfil/confirmar_contrasena",function (response) {
                if(response.r){
                    sighAjaxPost2(datos,base_url()+"perfil/cambiar_contrasena",function (response2) {
                        if (response2.r) {
                            sighMsj("SUS DATOS SE GUARDARON CORRECTAMENTE");
                            setTimeout(() => {
                                location.reload();
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