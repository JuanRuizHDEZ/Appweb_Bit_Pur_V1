
<?php
if($_SESSION["usuario"]==""){
    header ("Location: https://localhost/Appweb_Bit_Pur_V1/");
}
?>

<div class="nav-superior">
    <nav class="navbar navbar-fixed-top" style="background: url(https://localhost/Appweb_Bit_Pur_V1/assets/imagenes/fondo.jpg) no-repeat fixed; background-size: cover;">
        <ul class="nav navbar-nav navbar-right" style="margin-right: 1%;">
            <li ><a href="<?= base_url()?>Principal" class="glyphicon glyphicon-home" > Inicio </a></li>
            <li ><a href="" class="glyphicon glyphicon-log-out btn-cerrarsesion" > Cerrar sesión </a></li>
        </ul>
    </nav>
</div>

<div class="nav-side-menu navbar-fixed-top" style="margin-top: 0%;" >
    <div class="brand" style="margin-top: 30%;">
    
        <img class="img-circle" src="<?= base_url()?><?= $_SESSION['ruta']=='' ? '/assets/imagenes/persona.png':'imagenes/imgusuarios/'.$_SESSION['ruta']?>" width="40%" height="40%" alt="logo"/>
    </div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
            
            <ul id="menu-content" class="menu-content collapse out">
                <li  data-toggle="collapse" data-target="#perfil" class="collapsed">
                    <a>Perfil <span class="glyphicon glyphicon-user"></span></a>
                </li>
                <ul class="sub-menu collapse active" id="perfil">
                    <li><a href="<?= base_url()?>perfil"><span class="glyphicon glyphicon-user"></span> Perfil </a></li>
                    <li><a href="<?= base_url()?>perfil/cambiarcontrasena"><span class="glyphicon glyphicon-retweet"></span> Cambio de contraseña</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#usu" class="collapsed" <?= $_SESSION["tipo"] == '1' ? '' : 'hidden' ?>>
                  <a> Usuarios <span class="glyphicon glyphicon-user"></span></a>
                </li>
                <ul class="sub-menu collapse" id="usu">
                    <li><a href="<?= base_url()?>usuarios"><span class="glyphicon glyphicon-list"></span> Lista de usuarios </a></li>
                    <li><a href="<?= base_url()?>usuarios/registrar?accion=add"><span class="glyphicon glyphicon-user"></span> Registrar usuarios </a></li>
                </ul>

                <li data-toggle="collapse" data-target="#ser" class="collapsed">
                  <a> SERVICIOS /- <span class="glyphicon glyphicon-user"></span></a>
                </li>
                <ul class="sub-menu collapse" id="ser">
                    <li><a href="<?= base_url()?>servicios"><span class="glyphicon glyphicon-list"></span> Lista servicios </a></li>
                </ul>

                <li data-toggle="collapse" data-target="#pro" class="collapsed">
                  <a> PROVEDORES //- <span class="glyphicon glyphicon-user"></span></a>
                </li>
                <ul class="sub-menu collapse" id="pro">
                    <li><a href="<?= base_url()?>provedores"><span class="glyphicon glyphicon-list"></span> Lista provedores </a></li>
                    <li><a href="<?= base_url()?>provedores/registro?accion=add"><span class="glyphicon glyphicon-list"></span><span class="glyphicon glyphicon-pencil"></span> Registro de provedores </a></li>
                </ul>

                <li data-toggle="collapse" data-target="#rut" class="collapsed">
                  <a> RUTAS <span class="glyphicon glyphicon-user"></span></a>
                </li>
                <ul class="sub-menu collapse" id="rut">
                    <li><a href="<?= base_url()?>rutas"><span class="glyphicon glyphicon-list"></span> Ruta de vendores </a></li>
                </ul>

                <li  data-toggle="collapse" data-target="#cli" class="collapsed">
                  <a> CLIENTES /- <span class="glyphicon glyphicon-education"></span></a>
                </li>
                <ul class="sub-menu collapse" id="cli">
                    <li><a href="<?= base_url()?>clientes"><span class="glyphicon glyphicon-list"></span> Lista clientes </a></li>
                    <li><a href="<?= base_url()?>clientes/registro?accion=add"><span class="glyphicon glyphicon-list"></span><span class="glyphicon glyphicon-pencil"></span> Registrar clientes </a></li>
                </ul>


                <li data-toggle="collapse" data-target="#vent" class="collapsed">
                  <a> VENTAS <span class=" glyphicon glyphicon-usd"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="vent">
                  <li><a href="<?= base_url()?>ventas/registro?accion=add"><span class="glyphicon glyphicon-list"></span><span class="glyphicon glyphicon-pencil"></span> Registrar </a></li>
                </ul>                
                
                <li data-toggle="collapse" data-target="#inv" class="collapsed">
                  <a> INVENTARIO <span class="glyphicon glyphicon-list-alt"></span></a>
                </li>
                <ul class="sub-menu collapse" id="inv">
                    <li><a href="<?= base_url()?>inventario"><span class="glyphicon glyphicon-list"></span>Lista del inventario</a></li>
                    <li><a href="<?= base_url()?>inventario/registro?accion=add"><span class="glyphicon glyphicon-list"></span><span class="glyphicon glyphicon-pencil"></span> Agregar producto </a></li>
                </ul>

                <li data-toggle="collapse" data-target="#rep" class="collapsed">
                  <a> REPORTES <span class="glyphicon glyphicon-list-alt"></span></a>
                </li>
                <ul class="sub-menu collapse" id="rep">
                    <li><a href="<?= base_url()?>reportes/ventas"><span class="glyphicon glyphicon-file"></span><span class="glyphicon glyphicon-pencil"></span>Ventas</a></li>
                    <li><a href="<?= base_url()?>reportes/inventario"><span class="glyphicon glyphicon-file"></span><span class="glyphicon glyphicon-pencil"></span>Inventario</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#rec" class="collapsed">
                  <a> RECORDATORIOS <span class="glyphicon glyphicon-calendar"></span></a>
                </li>
                <ul class="sub-menu collapse" id="rec">
                  <li><a href="<?= base_url()?>recordatorio"><span class="glyphicon glyphicon-list"></span> Lista de recordatorios</a></li>
                  <li><a href="<?= base_url()?>recordatorio/registro?accion=add"><span class="glyphicon glyphicon-list"></span><span class="glyphicon glyphicon-pencil"></span> Nuevo recordatorio </a></li>
                </ul>
            </ul>
        </div>
</div>