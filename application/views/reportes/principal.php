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
                    REPORTE <?=strtoupper($tipo)?>
                </li>
            </ul>
        </div>

        <?php if($_SESSION["tipo"] == '1'){ ?>
        
        
        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold width100">Definir parametros</h4>

            <div>
            
                <form action="<?=base_url()?>reportes/pdff" method="post" target="_blank" class="formulario-generar-pdf" id="formulario" enctype="multipart/form-data">
                   
                    <div class="row" style="margin-top: 2%;">
                        <?php if($tipo=="ventas"){?>
                            <div class="col-md-6">
                                <label>Fecha de inicio</label>
                                <input value="" type="date" name="fecha1" autocomplete="off" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label>Fecha de fin</label>
                                <input value="" type="date" name="fecha2" autocomplete="off" class="form-control" placeholder="" required>
                            </div>
                        <?php } ?>

                        <?php if($tipo=="inventario"){?>
                            <div class="col-md-4">
                                <label>nose</label>
                                <input value="" type="text" name="fil" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z,0-9]{1,15}">
                            </div>
                        <?php } ?>

                    </div>

                    <div style="margin-top: 5%; text-align: center;margin-bottom: 2%;">
                        <input name="tipo" value="<?=$tipo?>" hidden>
                        <button  type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-save"></i> Generar </button>
                        <button  type="button" class="btn btn-danger btn-lg btn-cancelar"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar </button>
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
<script src="<?= base_url()?>assets/js/reportes.js" type="text/javascript"></script>