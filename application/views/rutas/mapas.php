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
                    RUTAS DE VENDEDORES
                </li>
            </ul>
        </div>
        <?php if($_SESSION["tipo"] == '1'){ ?>
        <div class="col-sm-11 color_fondo">
            <h4 class="no-margin text-uppercase semi-bold width100">RUTAS</h4>
            <div id="mapa" style="width:500px;height:300px">
                
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
    

    <script>
    function iniciarMap(){
        var coord = {lat:-34.5956145 ,lng: -58.4431949};
        var map = new google.maps.Map(document.getElementById('mapa'),{
        zoom: 10,
        center: coord
        });
        var marker = new google.maps.Marker({
        position: coord,
        map: map
        });
    }
    </script>
<?php $this->load->view('cabeseras/piedepagina'); ?>
<script src="<?= base_url()?>assets/js/rutas.js" type="text/javascript"></script>