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
                    AGREGAR PRODUCTO
                </li>
            </ul>
        </div>

        <?php if($_SESSION["tipo"] == '1'){ ?>

        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold">CAPTURAR INFORMACIÓN</h4>
            <div class="row">

                <form class="formulario-guardar-inventario" id="formulario" enctype="multipart/form-data">
                    
                    <div class="col-md-4">
                        <label id="titulo2">Nombre</label>
                        <input value="<?=$dat[0]['nombre_obj']?>" type="text" name="nom" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z,0-9]{1,50}">
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Cantidad</label>
                        <input value="<?=$dat[0]['cantidad']?>" type="number" name="can" autocomplete="off" class="form-control" placeholder="" required pattern="[0-9]{1,50}">
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Precio</label>
                        <input value="<?=$dat[0]['precio']?>" type="text" name="pre" autocomplete="off" class="form-control" placeholder="" required pattern="[0-9]{1,50}\.[0-9]{1,50}">
                    </div>

                    <div class="col-md-12" style="margin-top: 5%; text-align: center;margin-bottom: 2%;">
                        <input value="<?=$dat[0]['id_objeto']?>" name="id" hidden>
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
<script src="<?= base_url()?>assets/js/inventario.js" type="text/javascript"></script>