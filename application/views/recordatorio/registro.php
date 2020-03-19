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
                    NUEVO RECORDATORIO
                </li>
            </ul>
        </div>

        <?php if($_SESSION["tipo"] == '1'){ ?>

        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold">CAPTURAR INFORMACIÓN</h4>
            <div class="row">

                <form class="formulario-guardar-recordatorio" id="formulario" enctype="multipart/form-data">
                    
                    <div class="col-md-4">
                        <label id="titulo2">Fecha</label>
                        <input value="<?=$dat[0]['fecha']?>" type="date" name="fe" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <?php 
                        $tiempos = "";
                        if($dat[0]['hora']){
                            $tiempos = explode(":", $dat[0]['hora']);
                        }
                        
                    ?>
                    <div class="col-md-2">
                        <label id="titulo2">Hora</label>
                        <input value="<?= $tiempos=='' ? '':$tiempos[0]?>" type="number" name="ho1" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z,0-9 ]{1,50}">
                    </div>
                    <div class="col-md-2">
                        <label id="titulo2">Minutos</label>
                        <input value="<?= $tiempos=='' ? '':$tiempos[1]?>" type="number" name="ho2" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z,0-9 ]{1,50}">
                    </div>
                    <div class="col-md-2">
                        <label id="titulo2">Segundos<?=$_SESSION["usuario"]?></label>
                        <input value="<?= $tiempos=='' ? '':$tiempos[2]?>" type="number" name="ho3" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z,0-9 ]{1,50}">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="comment">Recordatorio</label>
                        <textarea name="re" class="form-control" rows="5" id="comment"><?=$dat[0]['texto']?></textarea>
                    </div>

                    <div class="col-md-12" style="margin-top: 5%; text-align: center;margin-bottom: 2%;">
                        <input value="<?=$dat[0]['id_recordatorio']?>" name="id" hidden>
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
<script src="<?= base_url()?>assets/js/recordatorio.js" type="text/javascript"></script>