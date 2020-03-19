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
                    REGISTRAR CLIENTES
                </li>
            </ul>
        </div>

        <?php if($_SESSION["tipo"] == '1'){ ?>

        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold">CAPTURAR INFORMACIÓN</h4>
            <div class="row">

                <form class="formulario-guardar-cliente" id="formulario" enctype="multipart/form-data">

                    <div class="col-md-12">
                        <label id="titulo2">Nombre del vendedor</label>
                        <select name="id_ven" class="form-control" required>
                            <option></option>
                            <?php foreach($dat2 as $value){ ?>
                                <option value="<?=$value['id_usuario']?>" <?= $dat[0]['id_vendedor'] == $value['id_usuario'] ? 'selected' : '' ?>> <?=$value['nombre_usu']?> </option> 
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label id="titulo2">Fecha</label>
                        <input value="<?=$dat[0]['fecha_c']?>" type="date" name="fe" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Lugar</label>
                        <input value="<?=$dat[0]['lugar']?>" type="text" name="lu" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z,0-9 ]{1,50}">
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Ruta</label>
                        <input value="<?=$dat[0]['ruta_c']?>" type="text" name="ru" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z,0-9 ]{1,50}">
                    </div>
                
                    <div class="col-md-4">
                        <label id="titulo2">Nombre del establecimiento</label>
                        <input value="<?=$dat[0]['nom_est']?>" type="text" name="ne" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z ]{1,50}">
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Nombre del propietario</label>
                        <input value="<?=$dat[0]['nom_pro']?>" type="text" name="np" autocomplete="off" class="form-control" placeholder="" required pattern="[A-Z,a-z ]{1,50}">
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Giro del cliente</label>
                        <select name="giro" class="form-control" required>
                                <option></option>
                                <option value="Centros deportivos" <?= $dat[0]['giro'] == 'Centros deportivos' ? 'selected' : '' ?> > Centros deportivos </option>
                                <option value="Escuelas" <?= $dat[0]['giro'] == 'Escuelas' ? 'selected' : '' ?> > Escuelas </option>
                                <option value="Oficinas" <?= $dat[0]['giro'] == 'Oficinas' ? 'selected' : '' ?> > Oficinas </option>
                                <option value="Hogares" <?= $dat[0]['giro'] == 'Hogares' ? 'selected' : '' ?> > Hogares </option>
                                <option value="Hoteles" <?= $dat[0]['giro'] == 'Hoteles' ? 'selected' : '' ?> > Hoteles </option>
                                <option value="Abarotes" <?= $dat[0]['giro'] == 'Abarotes' ? 'selected' : '' ?> > Abarotes </option>
                                <option value="Cadenas de minisuper" <?= $dat[0]['giro'] == 'Cadenas de minisuper' ? 'selected' : '' ?> > Cadenas de minisuper </option>
                                <option value="Oxxo" <?= $dat[0]['giro'] == 'Oxxo' ? 'selected' : '' ?> > Oxxo </option>
                                <option value="Otros centros de estudio" <?= $dat[0]['giro'] == 'Otros centros de estudio' ? 'selected' : '' ?> > Otros centros de estudio </option>
                                <option value="Restaurantes" <?= $dat[0]['giro'] == 'Restaurantes' ? 'selected' : '' ?> > Restaurantes </option>
                                <option value="Farmacias" <?= $dat[0]['giro'] == 'Farmacias' ? 'selected' : '' ?> > Farmacias </option>
                                <option value="Alimentos informal" <?= $dat[0]['giro'] == 'Alimentos informal' ? 'selected' : '' ?> > Alimentos informal </option>
                                <option value="Papelerias" <?= $dat[0]['giro'] == 'Papelerias' ? 'selected' : '' ?> > Papelerías </option>
                                <option value="Tiendas de ropa" <?= $dat[0]['giro'] == 'Tiendas de ropa' ? 'selected' : '' ?> > Tiendas de ropa </option>
                                <option value="Otros" <?= $dat[0]['giro'] == 'Otros' ? 'selected' : '' ?> > Otros </option>
                            </select>
                    </div>
                    
                
                    <div class="col-md-12" style="padding-top:2%;">
                        <div class="form-group" style="border-bottom: 2px solid #14322D">
                            <h4 class="m-b-5 m-t-5 semi-bold"> DOMICILIO </h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="">
                            <input type="radio" name="dom" value="Domicilioestablecimiento" <?= $dat[0]['domicilio'] == 'Domicilioestablecimiento' ? 'checked' : '' ?>> Domicilio del establecimiento
                        </label>
                        <label class="" >
                            <input type="radio" name="dom" value="Domicilioparticular" <?= $dat[0]['domicilio'] == 'Domicilioparticular' ? 'checked' : '' ?>> Domicilio particular
                        </label>
                    </div>

                    <div class="col-md-4">
                        <label id="titulo2">Calle y no</label>
                        <input value="<?=$dat[0]['calle1']?>" type="text" name="calle1" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Entre calle</label>
                        <input value="<?=$dat[0]['calle2']?>" type="text" name="calle2" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Y Calle</label>
                        <input value="<?=$dat[0]['calle3']?>" type="text" name="calle3" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Colonia</label>
                        <input value="<?=$dat[0]['colonia']?>" type="text" name="col" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">CP</label>
                        <input value="<?=$dat[0]['cp']?>" type="text" name="cp" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Telefono</label>
                        <input value="<?=$dat[0]['telefono_cli']?>" type="text" name="tel" autocomplete="off" class="form-control" placeholder="" required>
                    </div>


                    <div class="col-md-12" style="padding-top:2%;">
                        <div class="form-group" style="border-bottom: 2px solid #14322D">
                            <h4 class="m-b-5 m-t-5 ">FRECUENCIA DE VISITA</h4>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                            <?php $fre = explode(',',$dat[0]['frecuencia']);?>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Lunes'){echo 'active';}}?>" >
                                    <input type="checkbox" name="fre[]" value="Lunes" <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Lunes'){echo 'checked';}}?>> Lunes
                                </label>
                                <label class="btn btn-primary <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Martes'){echo 'active';}}?>">
                                    <input type="checkbox" name="fre[]" value="Martes" <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Martes'){echo 'checked';}}?>> Martes
                                </label>
                                <label class="btn btn-primary <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Miercoles'){echo 'active';}}?>">
                                    <input type="checkbox" name="fre[]" value="Miercoles" <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Miercoles'){echo 'checked';}}?>> Miercoles
                                </label>
                                <label class="btn btn-primary <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Jueves'){echo 'active';}}?>">
                                    <input type="checkbox" name="fre[]"value="Jueves" <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Jueves'){echo 'checked';}}?>> Jueves
                                </label>
                                <label class="btn btn-primary <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Viernes'){echo 'active';}}?>">
                                    <input type="checkbox" name="fre[]" value="Viernes" <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Viernes'){echo 'checked';}}?>> Viernes
                                </label>
                                <label class="btn btn-primary <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Sabado'){echo 'active';}}?>">
                                    <input type="checkbox" name="fre[]" value="Sabado" <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Sabado'){echo 'checked';}}?>> Sabado
                                </label>
                                <label class="btn btn-primary <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Domingo'){echo 'active';}}?>">
                                    <input type="checkbox" name="fre[]" value="Domingo" <?php for($i=0;$i<sizeof($fre);$i++){if($fre[$i]=='Domingo'){echo 'checked';}}?>> Domingo
                                </label>
                            </div>
                    </div>
                

                    <div class="col-md-12" style="padding-top:2%;">
                        <div class="form-group" style="border-bottom: 2px solid #14322D">
                            <h4 class="m-b-5 m-t-5 ">PEDIDO</h4>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label id="titulo2">Dispensadores</label>
                        <input value="<?=$dat[0]['dispensadores']?>" type="number" name="disp" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Garafones</label>
                        <input value="<?=$dat[0]['garafones']?>" type="number" name="gar" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Exhibidores</label>
                        <input value="<?=$dat[0]['exhibidores']?>" type="number" name="exh" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    
                    <div class="col-md-4">
                        <label id="titulo2">Portagarafones</label>
                        <input value="<?=$dat[0]['portagarafones']?>" type="number" name="port" autocomplete="off" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label id="titulo2">Costo por destrucción</label>
                        <input value="<?=$dat[0]['costo_por_destruccion']?>" type="number" name="cpd" autocomplete="off" class="form-control" placeholder="" required pattern="[0-9]{1,50}">
                    </div>

                    <div class="col-md-12" style="margin-top: 5%; text-align: center;margin-bottom: 2%;">
                        <input value="<?=$dat[0]['id_cliente']?>" name="id" hidden>
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
<script src="<?= base_url()?>assets/js/clientes.js" type="text/javascript"></script>