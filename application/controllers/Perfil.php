<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_perfil');
        $this->load->library('upload');
    }
    
    public function index(){
        session_start();
        $id = $_SESSION["id"];
        $datos['dat'] = $this->model_perfil->obtenerusuario($id);
        $datos['dat2'] = $this->model_perfil->obtenertipos();
        $this->load->view('perfil/perfil',$datos);
    }

    public function cambiarcontrasena(){
        session_start();
        $this->load->view('perfil/cambiarcontrasena');
    }

    public function guardar_perfil(){
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_MX.UTF-8');
        session_start();
        $id = $_SESSION["id"];

        $config = array(
            'upload_path' => 'imagenes/imgusuarios',
            'file_name' => 'img_'.$id."_".date('Y-m-d'),
            'allowed_types' => '*'
        );
        $this->upload->initialize($config);

        
        if ($this->upload->do_upload('imagen')) {
            $data = array('upload_data'=> $this->upload->data());
            $dato =  $data['upload_data']['file_name'];
            $_SESSION["ruta"] = $data['upload_data']['file_name'];
            $_SESSION["usuario"] = $this->input->POST('usuario');
            $_SESSION["nombre"] = $this->input->POST('nombre');

            if($this->input->POST('imgant')){
                   $ruta = 'imagenes/imgusuarios/'.$this->input->POST('imgant');
                    unlink($ruta); 
                }
        }else{
            $dato = $this->input->POST('imgant');
        }
        
        //$id = $this->input->POST('id');

        $datos = array(
            'nombre_usu'=> $this->input->POST('nombre'),
            'usuario'=> $this->input->POST('usuario'),
            'telefono_usu'=> $this->input->POST('tel'),
            'e_mail'=> $this->input->POST('email'),
            'ruta_u'=> $dato
        );
        
        $resp["resultado"] = $this->model_perfil->modificar_usuario($datos,$id);
        
        $this->setOutputV2($resp);
    }
    
    public function confirmar_contrasena() {
        session_start();
        $pass = $_SESSION["pass"];
        $con1 = $this->input->POST('con1');
        if($pass==$con1){
            $resp["r"] = TRUE;
            $this->setOutputV2($resp);
        } else {
            $resp["r"] = FALSE;
            $this->setOutputV2($resp);
        }
    }
    
    public function cambiar_contrasena(){
        session_start();
        $id = $_SESSION["id"];
        $datos = array('contrasena'=> $this->input->POST('con3'));
        $_SESSION["pass"] = $this->input->POST('con3');
        $resp["r"] = $this->model_perfil->modificar_usuario($datos,$id);
        $this->setOutputV2($resp);
    }
    
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}