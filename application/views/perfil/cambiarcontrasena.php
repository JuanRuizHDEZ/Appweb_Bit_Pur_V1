<?php $this->load->view('cabeseras/encabezado'); ?>

</head>
<body>
<?php $this->load->view('menus/menu_superior'); ?>
    
    <div class="row-odd color_fondo" id="divprincipal">
        
        <div class="col-sm-11 color_fondo">
            <ul class="breadcrumb color_fondo">
                <li>
                    <a href="<?= base_url()?>Principal">
                    PRINCIPAL
                    </a>
                </li>
                
                <li>
                    CAMBIO DE CONTRASEÑA
                </li>
            </ul>
        </div>
        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold width100">CAPTURA DE INFORMACIÓN</h4>
            <div class="row">
                <form class="formulario-cambiar-contra" id="formulario">
                    <div class="col-sm-6" style="margin-left: 25%;">
                        <label>CONTRASEÑA ACTUAL</label>
                        <input value="" type="password" name="con1" autocomplete="off" class="form-control c1" placeholder="CONTRASEÑA ACTUAL" required pattern="[A-Z,a-z,0-9]{1,15}">
                        <br>
                        <label>NUEVA CONTRASEÑA</label>
                        <input value="" type="password" name="con2" autocomplete="off" class="form-control c2" placeholder="NUEVA CONTRASEÑA" required pattern="[A-Z,a-z,0-9]{1,15}">
                        <br>
                        <label>CONFIRMAR CONTRASEÑA</label>
                        <input value="" type="password" name="con3" autocomplete="off" class="form-control c3" placeholder="CONFIRMAR CONTRASEÑA" required pattern="[A-Z,a-z,0-9]{1,15}">
                    </div>
                    <div class="col-sm-12 text-center" style="margin-top: 2%;">
                        <input name="id" value="<?=$_SESSION["id"]?>" hidden>
                        <input name="pass" value="<?=$_SESSION["pass"]?>" hidden>
                        <button  type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-save"></i> GUARDAR </button>
                        <button  type="button" class="btn btn-danger btn-lg btn-cancelar"><i class="glyphicon glyphicon-remove-circle"></i> CANCELAR </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->load->view('cabeseras/piedepagina'); ?>
<script src="<?= base_url()?>assets/js/perfil.js" type="text/javascript"></script>
