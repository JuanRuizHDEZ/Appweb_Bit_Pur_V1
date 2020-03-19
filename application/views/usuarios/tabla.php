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
                    LISTA DE USUARIOS
                </li>
            </ul>
        </div>
        <?php if($_SESSION["tipo"] == '1'){ ?>
        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold width100">BUSCAR USUARIO</h4>
            <div>
                <table id="example" class="display table" style="width:100%">
                    <thead>
                        <tr class="">
                            <th> ID </th>
                            <th> Nombre </th>
                            <th> Telefono </th>
                            <th style="text-align: center;">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($dat == NULL){

                    } else {
                        foreach ($dat as $dato) {
                     ?>
                        <tr>
                            <td><?= $dato['id_usuario'] ?></td>
                            <td><?= $dato['nombre_usu']?></td>
                            <td><?= $dato['telefono_usu'] ?></td>
                            <td style="text-align: center;">
                                <input hidden value="<?= $dato['nombre_usu']?>" name="nombre_usu">
                                <button class="btn1 btn btn-danger" value="<?=$dato['id_usuario']?>" ><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
                                <button class="btnmodificar btn btn-primary" value="<?=$dato['id_usuario']?>" ><i class="glyphicon glyphicon-edit"></i> Modificar</button>
                            </td>
                        </tr>
                    <?php
                           }
                    }
                    ?>
                    </tbody>
                </table>
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
<script src="<?= base_url()?>assets/js/usuario.js" type="text/javascript"></script>
