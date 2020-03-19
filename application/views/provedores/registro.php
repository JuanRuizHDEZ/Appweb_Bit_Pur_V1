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
                    REGISTRO DE PROVEDORES
                </li>
            </ul>
        </div>

        <?php if($_SESSION["tipo"] == '1'){ ?>

        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold width100">CAPTURAR INFORMACIÓN</h4>
            <div>
                <form class="formulario-guardar-provedor" id="formulario" enctype="multipart/form-data">

                <div class="row" style="">
                    <div class="col-md-12">
                        <label id="titulo2">Nombre</label>
                        <input value="<?=$dat[0]['nombre_pro']?>" type="text" name="nombre" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z]{1,50}">
                    </div>
                </div>
                <div class="row" style="margin-top: 2%;">
                    <div class="col-md-4">
                        <label id="titulo2">Telefono</label>
                        <input value="<?=$dat[0]['telefono']?>" type="tel" name="tel" autocomplete="off" class="form-control" placeholder="" required pattern="[0-9]{10}">
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Direccion</label>
                        <input value="<?=$dat[0]['direccion']?>" type="text" name="dir" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">E mail</label>
                        <input value="<?=$dat[0]['e_mail']?>" type="email" name="email" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                </div>

                <div style="margin-top: 15%; text-align: center;margin-bottom: 2%;">
                    <input value="<?=$dat[0]['id_provevedor']?>" name="id" hidden>
                    <input value="<?=$_GET['accion']?>" name="accion" hidden>
                    <button  type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-save"></i> Guardar </button>
                    <button  type="button" class="btn btn-danger btn-lg <?= $_GET['accion']=='add' ? 'btn-cancelar':'btn-cancelar-tabla'?>"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar </button>
                </div>
                </form>
            </div>
        </div>
        
        <?php }else{ ?>
        
        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold width100">CAPTURA DE INFORMACIÓN</h4>
            <div class="row">
                <h1>
                    NO TIENES PERMISO A ESTA PAGINA
                </h1>
            </div>
        </div>

        <?php } ?>

    </div>
<?php $this->load->view('cabeseras/piedepagina'); ?>
<script src="<?= base_url()?>assets/js/provedores.js" type="text/javascript"></script>