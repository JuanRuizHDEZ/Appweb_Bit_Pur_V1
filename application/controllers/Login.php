<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_login');
    }
    
    public function index(){
        $this->load->view('login');
    }
    
    public function verificar_usuario(){
        $usuario = $this->input->POST('usuario');
        $pass = $this->input->POST('pass');
        $a['asd'] = $this->model_login->verificar_usuario($usuario,$pass);
        
        if($a){
            session_start();
            $_SESSION["id"] = $a['asd'][0]['id_usuario'];
            $_SESSION["usuario"] = $a['asd'][0]['usuario'];
            $_SESSION["nombre"] = $a['asd'][0]['nombre_usu'];
            $_SESSION["pass"] = $a['asd'][0]['contrasena'];
            $_SESSION["tipo"] = $a['asd'][0]['id_tipo'];
            $_SESSION["ruta"] = $a['asd'][0]['ruta_u'];
        }
        $this->setOutputV2($a);
    }
    
    public function cerrarsesion(){
        session_start();
        session_destroy();
        $resp["resultado"]="true";
        $this->setOutputV2($resp);
    }
    
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}

