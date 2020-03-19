$(document).ready(function () {
    $('.btn-cancelar').click(function (evt){
        evt.preventDefault();
        location.href=base_url()+"Principal";
    });

    $('.btn2').click(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var id = $(this).val();
        bootbox.hideAll();
        location.href = base_url() + 'alumnos/registrar?id=' + id + '&accion=mod';
    });

//    $('#example').DataTable();

    $('.formulario-guardar-alumno').submit(function (evt) {
        evt.preventDefault();
        sighMsjLoading();
        var datos = $(this).serialize();
        var formdata = new FormData($('.formulario-guardar-alumno')[0]);
        var action = $(this).val();
        sighAjaxPost(formdata, base_url() + "alumnos/guardar?action=" + action, function (response) {
            console.log(response);
            if (response.per) { 
                sighAjaxPost(formdata, base_url() + "alumnos/guardar2?action=" + action, function (response) {
                    console.log(response);
                    bootbox.hideAll();
                    if(response){
                        location.href = base_url() + 'alumnos';
                    }
                });
                
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
            sighAjaxPost2({"id": id}, base_url() + "Alumnos/buscar", function (response) {
                console.log(response.per);
                var prueba = response.per[0];
                var prueba2 = response.aca[0];
                if (prueba && prueba2) {
                    alert(prueba);
                    var tabla_per =
                            "<tr>" +
                            "<td>" + response.per[0]['matricula'] + "</td>" +
                            "<td>" + response.per[0]['nombre'] + " " + response.per[0]['app'] + " " + response.per[0]['apm'] + "</td>" +
                            "<td>" + response.per[0]['sexo'] + "</td>" +
                            "<td>" + response.per[0]['curp'] + "</td>" +
                            "<td>" + response.per[0]['f_nac'] + "</td>" +
                            "<td>" + response.per[0]['tutor'] + "</td>" +
                            "<td>" + response.per[0]['direccion'] + "</td>" +
                            "</tr>";
                    $('#t_per').html(tabla_per);
                    
                    var tabla_aca = "<tr id='1'></tr>";
                    $('#t_aca').html(tabla_aca);
                    $('#1').append("<td>" + response.aca[0]['finicio'] + "</td>");
                    sighAjaxPost2({"id": response.aca[0]['idasesor']}, base_url() + "Alumnos/buscarase", function (response) {
                        $('#1').append("<td>" + response.ase[0]['nombre'] + "</td>");
                        sighAjaxPost2({"id": prueba2['idcar']}, base_url() + "Alumnos/buscarcar", function (response) {
                            $('#1').append("<td>" + response.ase[0]['carrera'] + "</td>");
                            sighAjaxPost2({"id": response.ase[0]['clave']}, base_url() + "Alumnos/buscarescu", function (response) {
                                $('#1').append("<td>" + response.ase[0]['nombre'] + "</td>");
                                sighAjaxPost2({"id": prueba2['idturno']}, base_url() + "Alumnos/buscareturn", function (response) {
                                    $('#1').append("<td>" + response.ase[0]['turno'] + "</td>");
                                    sighAjaxPost2({"id": prueba2['idhorario']}, base_url() + "Alumnos/obtenerhor", function (response) {
                                        $('#1').append("<td>" + response.hor[0]['horario'] + "</td>");
                                    });
                                });
                            });
                        });
                    });
                    
                } else {
                    sighMsjErrormsj("NO SE ENCONTRO NINGUN ALUMNO");
                }

//            bootbox.hideAll();
            });
        }
//        console.log(evt['key']);
//        var dato = $(this).val();
//        alert(dato);
    });

//    $('#esc').change(function (evt) {
//        evt.preventDefault();
//        var esc = $(this).val();
//        alert("asdasd");
//    });

    $('select[name=esc]').change(function (e) {
        var id = $(this).val();
        sighAjaxPost2({"id": id}, base_url() + "Alumnos/obtenercareras", function (response) {
            console.log(response);
            var prueba = response.car;
            if (prueba.length) {
                var select = "<option></option>";
                for (var i = 0; i < prueba.length; i++) {
                    if (prueba[i] !== "") {
                        select = select + "<option value='"+ prueba[i]['idcar'] +"'>" + prueba[i]['carrera'] + "</option>";
                        alert(prueba[i]['carrera']);
                    }
                }
                console.log(select);
                $('#car').html(select);
            } else {
                sighMsjErrormsj("NO SE ENCONTRARON DATOS");
            }
        });
    });
    
    $('select[name=tur]').change(function (e) {
        var id = $(this).val();
        sighAjaxPost2({"id": id}, base_url() + "Alumnos/obtenerhorarios", function (response) {
            console.log(response.hor);
            var prueba = response.hor;
            if (prueba.length) {
                var select = "<option></option>";
                for (var i = 0; i < prueba.length; i++) {
                    if (prueba[i] !== "") {
                        select = select + "<option value='"+ prueba[i]['idhorario'] +"'>" + prueba[i]['horario'] + "</option>";
                        alert(prueba[i]['carrera']);
                    }
                }
                console.log(select);
                $('#hor').html(select);
            } else {
                sighMsjErrormsj("NO SE ENCONTRARON DATOS");
            }
        });
    });

    function preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#div-img").html("<img src='" + e.target.result + "' class='img-circle img_cambia'>");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#imgselec').change(function (evt) {
        evt.preventDefault();
        preview(this);
    });

});