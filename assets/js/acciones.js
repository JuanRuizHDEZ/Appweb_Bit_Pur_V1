$(document).ready(function () {
    
    $('.btn-cancelar').click(function (evt){
        evt.preventDefault();
        location.href=base_url()+"Principal";
    });

    $('.formulario-guardar-cortex').submit(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var datos = $(this).serialize();
        sighAjaxPost2(datos, base_url() + "Acciones/guardar", function (response) {
            console.log(response);
            bootbox.hideAll();
            if (response) {
                sighMsj("DATOS GUARDADOS CORRECTAMENTE");
                $('#1').val("");
                $('#2').val("");
                $("#3").val("");
            }else{
                sighMsjErrormsj("LOS DATOS NO GUARDARON");
            }
        });
    });
    $('.formulario-guardar-cortez').submit(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var datos = $(this).serialize();
        sighAjaxPost2(datos, base_url() + "Acciones/guardarz", function (response) {
            console.log(response);
            bootbox.hideAll();
            if (response) {
                sighMsj("DATOS GUARDADOS CORRECTAMENTE");
                $('#1').val("");
                $('#2').val("");
                $("#3").val("");
                $("#4").val("");
            }else{
                sighMsjErrormsj("LOS DATOS NOSE GUARDARON");
            }
        });
    });
    $('.formulario-guardar-respaldo').submit(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var datos = $(this).serialize();
        sighAjaxPost2(datos, base_url() + "Acciones/respaldoDB", function (response) {
            console.log(response);
            bootbox.hideAll();
            if (response) {
                sighMsj("DATOS GUARDADOS CORRECTAMENTE");
            }
        });
    });
});

