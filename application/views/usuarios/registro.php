<?php $this->load->view('cabeseras/encabezado'); ?>

</head>
<body>
<?php $this->load->view('menus/menu_superior'); ?>
    
    <div class="row-odd color_fondo" id="divprincipal">
        
        <div class="col-sm-11 color_fondo">
            <ul class="breadcrumb color_fondo">
                <li>
                    <a href="<?= base_url()?>Principal">PRINCIPAL</a>
                </li>
                <li class="active">
                    REGISTRO DE USUARIOS
                </li>
            </ul>
        </div>
        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold width100">CAPTURAR INFORMACIÓN</h4>
            <div>
                <form class="formulario-guardar-usuario" id="formulario" enctype="multipart/form-data">

                    <div class="row" style="margin-top: 1%; margin-left: 71%;width: 21%;height: 285PX;position: absolute;">
                        <div id="div-img">
                            <img class="img-circle img_cambia" src="<?= base_url()?><?= $dat[0]['ruta_u']=='' ? '/assets/imagenes/persona.png':'imagenes/imgusuarios/'.$dat[0]['ruta_u']?>" alt=""/>
                        </div>
                        <div class="div-part-btn">
                            <input value="" name="imagen" id="imagen" accept="image/*" style="width: 100%;" type="file">
                        </div>
                    </div>

                    <div class="row" style="width: 70%;">
                        <div class="col-md-12">
                            <label id="titulo2">Nombre</label>
                            <input value="<?=$dat[0]['nombre_usu']?>" type="text" name="nombre" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z ]{1,50}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%;width: 70%;">
                        <div class="col-md-4">
                            <label id="titulo2">usuario</label>
                            <input value="<?=$dat[0]['usuario']?>" type="text" name="usuario" autocomplete="off" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md-4">
                            <label id="titulo2">Telefono</label>
                            <input value="<?=$dat[0]['telefono_usu']?>" type="tel" name="tel" autocomplete="off" class="form-control" placeholder="" required pattern="[0-9]{10}">
                        </div>
                        <div class="col-md-4">
                            <label id="titulo2">email</label>
                            <input value="<?=$dat[0]['e_mail']?>" type="email" name="email" autocomplete="off" class="form-control" placeholder="" required>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 2%;width: 70%;">

                        <div class="col-md-4">
                            <label id="titulo2">Tipo</label>
                            <select name="tip" class="form-control" required>
                                <option></option>
                                <?php foreach($dat2 as $value){ ?>
                                    <option value="<?=$value['id_tipo']?>" <?= $dat[0]['id_tipo'] == $value['id_tipo'] ? 'selected' : '' ?>> <?=$value['nombre_tipo']?> </option> 
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label id="titulo2">Contraseña</label>
                            <input value="<?=$dat[0]['contrasena']?>" type="password" name="contrasena" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z,0-9]{1,15}">
                        </div>

                        <div class="col-md-4">
                            <label id="titulo2">Confirmar Contraseña</label>
                            <input value="<?=$dat[0]['contrasena']?>" type="password" name="contrasena2" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z,0-9]{1,15}">
                        </div>
                    </div>

                    <div style="margin-top: 15%; text-align: center;margin-bottom: 2%;">
                        <input value="<?=$dat[0]['id_usuario']?>" name="id" hidden>
                        <input id="imgant" value="<?=$dat[0]['ruta_u']?>" name="imgant" hidden>
                        <input value="<?=$_GET['accion']?>" name="accion" hidden>
                        <button  type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-save"></i> Guardar </button>
                        <button  type="button" class="btn btn-danger btn-lg btn-cancelar"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar </button>
                    </div>
                </form>
            </div>
        </div>
        
<?php $this->load->view('cabeseras/piedepagina'); ?>
<script src="<?= base_url()?>assets/js/usuario.js" type="text/javascript"></script>

