$(document).ready(function () {
    
    $('.mibtn').click(function (evt){
//        console.log('asd');
    });
    
    $('.form-signin').submit(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        
        var datos = $(this).serialize();
        console.log(datos);

        sighAjaxPost2(datos,base_url()+"Login/verificar_usuario",function (response) {
            
            bootbox.hideAll();
            console.log(response);
            if(response.asd){
               
                location.href=base_url()+'Principal';
                
            }else{
//                alert("el usuario o contraseña es incorrecto");
                sighMsjErrormsj("EL USUARIO O CONTRESEÑA SON INCORRECTOS");

            }
            
        });
    });
    
});


