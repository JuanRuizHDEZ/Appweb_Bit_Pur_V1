<?php $this->load->view('cabeseras/encabezado'); ?>

</head>
<body>
    <?php $this->load->view('menus/menu_superior'); ?>

    <div class="row-odd color_fondo" id="divprincipal">
        
        <div class="col-sm-11 color_fondo">
            <ul class="breadcrumb color_fondo">
            <li>
                PRINCIPAL
            </li>
        </ul>
        </div>
        
        <div class="col-sm-11 color_fondo">
            <h2 class="no-margin text-uppercase semi-bold width100">BIENVENIDO AL SISTEMA DE CONTROL AQUA</h2>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Recordatorios del dia</div>
                <div class="panel-body">
                    <ul class="list-group">
                    
                    <?php
                    $num = 0;
                    if($dat == NULL){
                    
                    } else {
                        //obtener el año,mes y dia actual
                        $date = date('Y-m-d');
                        foreach ($dat as $dato) {
                            if($dato['fecha'] == $date){
                                $tiempos = "";
                                $seg = "";
                                if($dato['hora']){
                                    $tiempos = explode(":", $dato['hora']);
                                }
                                if($tiempos[2]){
                                    $seg = explode(".",$tiempos[2]);
                                }
                                ?>
                                <li class="list-group-item">
                                    <?= $date." = ".$dato['fecha']." ".$tiempos[0].":".$tiempos[1].":".$seg[0]." ".$dato['texto'] ?>
                                </li>
                            
                                <div hidden>
                                <input value="<?=$tiempos[0]?>" id="ho<?=$num?>" required>
                                <input value="<?=$tiempos[1]?>" id="mis<?=$num?>" required>
                                <input value="<?=$seg[0]?>" id="seg<?=$num?>" required>
                                <input value="<?=$dato['fecha']?>" id="fe<?=$num?>" required>
                                </div>
                                <br>
                                <?php
                                $num = $num + 1;
                            }
                        
                        }
                    }
                    ?>
                    </ul>
                </div>
            </div>
            <input value="<?=$num?>" name="num" hidden>
        </div>
    </div>
<?php $this->load->view('cabeseras/piedepagina'); ?>
<script src="assets//js//principal.js" type="text/javascript"></script>