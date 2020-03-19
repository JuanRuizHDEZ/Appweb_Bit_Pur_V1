<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Inicio de Sesión</title>
        <!--<link rel="stylesheet" type="text/css" href="assets//font-awesome//css//font-awesome.css"/>-->
        <link rel="stylesheet" type="text/css" href="assets//stilos//welcome.css"/>
        <link rel="stylesheet" type="text/css" href="assets//bootstrapv3//css//bootstrap.min.css"/>
</head>
<body id="cuerpo">
    <img id="imagen_l" src="assets//imagenes//persona.png"/>
    <div id="container">
            <div id="body">
                <form class="formulario-inicio-secion">
                    <div class="form-group">
                        <!--<span class="glyphicon glyphicon-user" aria-hidden="true"></span>-->
                        <!--<img id="icono" src="assets//imagenes//iconos//persona.png"/>-->
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="password" name="usuario" autocomplete="off" class="form-control" placeholder=" INGRESAR EL USUARIO">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="contra" autocomplete="off" class="form-control" placeholder="INGRESAR LA CONTRASEÑA">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primaryk btn-dark btn-lg"><i class="glyphicon glyphicon-share"></i> Accesar</button>
                    
                </form>
            </div>
    </div>
    
    <script src="assets//js//jquery-1.9.1.js" type="text/javascript"></script>
    <script src="assets//js//popper.min.js" type="text/javascript"></script>
    <script src="assets//bootstrapv3//js//bootstrap.min.js" type="text/javascript"></script>
    <script src="assets//js//bootbox.min.js" type="text/javascript"></script>
    <script src="assets//js//componentes.js" type="text/javascript"></script>
</body>
</html>
<script src="assets//js//welcome.js" type="text/javascript"></script>