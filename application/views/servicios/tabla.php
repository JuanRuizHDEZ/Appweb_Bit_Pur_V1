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
                    LISTA SERVICIOS
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
                            <th> Codigo </th>
                            <th> Cliente </th>
                            <th> pedido </th>
                            <th> Cantidad </th>
                            <th> Hora del pedido </th>
                            <th> Fecha del pedido </th>
                            <th> Hora de entrega </th>
                            <th> Fecha de entrega </th>
                            <th> Vendedor </th>
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
                            <td><?= $dato['id_servicio'] ?></td>
                            <td><?= $dato['nom_pro']?></td>
                            <td><?= $dato['tipo'] ?></td>
                            <td><?= $dato['cantidad'] ?></td>
                            <td><?= $dato['hora_pedido'] ?></td>
                            <td><?= $dato['fecha_pedido'] ?></td>
                            <td><?= $dato['hora_entrega'] ?></td>
                            <td><?= $dato['fecha_entrega']=='0001-01-01' ? 'pendiente':$dato['fecha_entrega']?></td>
                            <td><?= $dato['nombre_usu'] ?></td>
                            <td style="text-align: center;">
                                <button class="btneliminar btn btn-danger" value="<?=$dato['id_servicio']?>" ><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
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
<script src="<?= base_url()?>assets/js/servicios.js" type="text/javascript"></script>