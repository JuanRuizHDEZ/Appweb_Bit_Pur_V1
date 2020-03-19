<?php $this->load->view('cabeseras/encabezado'); ?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/estilos/login.css"/>
</head>

<body class="text-center">
    <form class="form-signin">
        <h1 class="h3 font-weight-normal">Iniciar cession</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="Text" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
    </form>

<?php $this->load->view('cabeseras/piedepagina'); ?>
<script src="<?= base_url()?>assets/js/login.js" type="text/javascript"></script>
