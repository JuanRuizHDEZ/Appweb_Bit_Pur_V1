$(document).ready(function () {
    $('.btn-cancelar').click(function (evt){
        evt.preventDefault();
        location.href=base_url()+"Principal";
    });
    
    $('.formulario-guardar-inscripcion').submit(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var datos = $(this).serialize();
        sighAjaxPost2(datos, base_url() + "Cobranza/guardar", function (response) {
            console.log(response);
            bootbox.hideAll();
            if (response.o) {
                sighMsj('Datos guardados correctamente');
                $('#1').val("");
                $('#2').val("");
                $("#3").val("");
                var el = document.getElementById('4');
                el.selectedIndex = "0";
            }else{
                sighMsjErrormsj(response.msj);
            }
        });
    });
    $('.formulario-guardar-legalizacion').submit(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var datos = $(this).serialize();
        sighAjaxPost2(datos, base_url() + "Cobranza/guardarlegalizacion", function (response) {
            console.log(response);
            bootbox.hideAll();
            if (response.o) {
                sighMsj('Datos guardados correctamente');
                $('#1').val("");
                $('#2').val("");
                $("#3").val("");
            }else{
                sighMsjErrormsj(response.msj);
            }
        });
    });
    
    $('#input-buscar').keyup(function (evt) {
        evt.preventDefault();
        var e = evt['keyCode'];
        var id = $(this).val();

        if (e == 13) {
            $('#t_per').html("");
            $('#t_aca').html("");
            console.log(id);
            sighAjaxPost2({"id": id}, base_url() + "Cobranza/buscaralu", function (response) {
                console.log(response);
                var prueba = response.ins[0];
                var prueba2 = response.lega[0];
                if (prueba && prueba2) {
                    alert(prueba);
                    var tabla_per =
                            "<tr>" +
                            "<td>" + prueba['matricula'] + "</td>" +
                            "<td>" + prueba['monto'] + "</td>" +
                            "<td>" + prueba['pagacon'] + "</td>" +
                            "<td>" + prueba['fechapago'] + "</td>" +
                            "<td>" + prueba['hora'] + "</td>" +
                            "</tr>";
                    $('#t_per').html(tabla_per);
                    
                    var tabla_aca = 
                            "<tr>" +
                            "<td>" + prueba2['matricula'] + "</td>" +
                            "<td>" + prueba2['monto'] + "</td>" +
                            "<td>" + prueba2['pagacon'] + "</td>" +
                            "<td>" + prueba2['fechapago'] + "</td>" +
                            "<td>" + prueba2['hora'] + "</td>" +
                            "</tr>";
                    $('#t_aca').html(tabla_aca);
                } else {
                    sighMsjErrormsj("NO SE ENCONTRO NINGUN ALUMNO");
                }
            });
        }
    });
    
});