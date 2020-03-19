function base_url() {
//    return 'https://cc3c30.000webhostapp.com/';
    return 'https://localhost/Appweb_Bit_Pur_V1/';
}

var sighMjsConfirm = function (info, result) {
    let box = bootbox.confirm({
        title: '<h5 class="no-margin color-white text-left semi-bold">' + info.title + '</h5>',
        message: '<div class="row" style="margin-top: 0px;">' + info.message + '</div>',
        buttons: {
            cancel: {
                label: info.lb_cancel == undefined ? 'Cancelar' : info.lb_cancel,
                className: 'sigh-background-secundary'
            }, confirm: {
                label: info.lb_accept == undefined ? 'Aceptar' : info.lb_accept,
                className: 'btn bg-primary'
            }
        },
        size: info.size,
        callback: result
    });
    var y = window.top.outerHeight / 6;
    $('.modal-dialog').css({
        'margin-top': y + 'px'
    });
    return box;
};
//ajax para pasar forms con imagenes
var sighAjaxPost = function (Data, Url, Response) {
    $.ajax({
        url: Url,
        dataType: 'json',
        type: 'POST',
        data: Data,
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function (xhr) {},
        success: function (result, textStatus, jqXHR) {
            Response(result);
        }, error: function (e) {
            sighMsjError(e.responseText, 'large');
            console.log(e)
        }

    });
};
//ajax para pasar forms normales
var sighAjaxPost2 = function (Data, Url, Response) {
    $.ajax({
        url: Url,
        dataType: 'json',
        type: 'POST',
        data: Data,
        beforeSend: function (xhr) {},
        success: function (result, textStatus, jqXHR) {
            Response(result);
        }, error: function (e) {
            sighMsjError(e.responseText, 'large');
            console.log(e)
        }

    });
};
//mensaje de carga
var sighMsjLoading = function (msj = 'Esto puede tardar un momento...') {
    let box = bootbox.dialog({
        title: '<h5 class="color-white no-margin text-left">Espere por favor...</h5>',
        message: '<div class="row ">' +
                '<div class="col-sm-12">' +
                '<h6 class="text-center" style="line-height:2"><i class="fa fa-spinner fa-pulse fa-5x sigh-color" ></i></h6>' +
                '<h6 class="text-center no-margin sigh-color" style="line-height:1.4; ">' + msj + '</h6>' +
                '</div>' +
                '</div>',
        size: 'small'
        , onEscape: function () {}
    });
    var y = window.top.outerHeight / 4;
    $('.modal-dialog').css({
        'margin-top': y + 'px'
    });
    return  box;
};
//mensaje de error
var sighMsjError = function (msj = 'LO SENTIMOS A OCURRIDO UN ERROR AL PROCESAR LA PETICIÓN. VUELVA A INTENTARLO') {
    let box = bootbox.dialog({
        title: '<h5 class="color-white no-margin text-left"> ERROR </h5>',
        message: '<div class="row">' +
                '<div class="col-sm-12">' +
                '<h6 class="text-center no-margin" style="line-height:1.4;color:#F44336"> ERROR </h6>' +
                '<h6 class="text-center no-margin" style="line-height:1.4;color:#F44336">' + msj + '</h6>' +
                '</div>' +
                '</div>',
        size: 'small'
        , onEscape: function () {}
    });
    var y = window.top.outerHeight / 8;
    $('.modal-dialog').css({
        'margin-top': y + 'px'
    });
    return box;
};
//mensaje de error con msj desde la petición
var sighMsjErrormsj = function (msj) {
    let box = bootbox.dialog({
        title: '<h5 class="color-white no-margin text-left"> ERROR </h5>',
        message: '<div class="row">' +
                '<div class="col-sm-12">' +
                '<h6 class="text-center no-margin" style="line-height:1.4;color:#F44336"> ERROR EN LA PETICION</h6>' +
                '<h5 class="text-center no-margin" style="line-height:1.4;color:#F44336">' + msj + '</h6>' +
                '</div>' +
                '</div>',
        size: 'small'
        , onEscape: function () {}
    });
    var y = window.top.outerHeight / 8;
    $('.modal-dialog').css({
        'margin-top': y + 'px'
    });
    return box;
};
//mensaje normal de realizacion correcta de la petición
var sighMsj = function (msj) {
    let box = bootbox.dialog({
        title: '<h5 class="color-white no-margin text-left"> Confirmación </h5>',
        message: '<div class="row">' +
                '<div class="col-sm-12">' +
                '<h6 class="text-center no-margin" style="line-height:1.4;"> PETICION REALIZADA CORRECTAMENTE </h6>' +
                '<h5 class="text-center no-margin" style="line-height:1.4;">' + msj + '</h6>' +
                '</div>' +
                '</div>',
        size: 'small'
        , onEscape: function () {}
    });
    var y = window.top.outerHeight / 8;
    $('.modal-dialog').css({
        'margin-top': y + 'px'
    });
    return box;
};
//mensaje para formularios
var sighMsjfrm = function (msj) {
    let box = bootbox.dialog({
        title: '<h5 class="color-white no-margin text-left"> BUSCAR IMAGEN </h5>',
        message: '<div class="row">' +
                '<div class="col-sm-12">' +
                '<h5 class="text-center no-margin" style="line-height:1.4;">' + msj + '</h6>' +
                '</div>' +
                '</div>',
        size: 'md'
        , onEscape: function () {}
    });
    var y = window.top.outerHeight / 8;
    $('.modal-dialog').css({
        'margin-top': y + 'px'
    });
    return box;
};

//acción de cancelar para regresar a la ventana principal
$('.btn-cancelar').click(function (evt){
    evt.preventDefault();
    location.href=base_url()+"Principal";
});
//acción para cerrar cesion
$('.btn-cerrarsesion').click(function (evt) {
    evt.preventDefault();
    var datos = $(this).serialize();
    sighAjaxPost(datos, base_url() + "Login/cerrarsesion", function (response) {

        if (response.resultado) {
            location.href = base_url();
        }

    });
});