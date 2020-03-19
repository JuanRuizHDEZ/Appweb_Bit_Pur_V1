<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_servicios');
        $this->load->library('upload');
    }
    
    public function index(){
        session_start();
        $datos['dat'] = $this->model_servicios->obtenerpedidos();
        $this->load->view('servicios/tabla',$datos);
    }

    public function registrar(){
        session_start();
        $id = $this->input->GET('id');
        $datos['dat'] = $this->model_usuario->obtenerusuario($id);
        $this->load->view('usuarios/registro',$datos);
    }
    
    public function cambiarcontrasena(){
        $id["as"] = $this->input->GET('id');
//        $dato["id"] = $this->model_usuario->obtenerusuario($id);
        $this->load->view('usuarios/cambiarcontrasena');
    }

    public function guardar_usuario(){
        session_start();
        $config = array(
            'upload_path' => 'imagenes/imgusuarios',
            'allowed_types' => '*'
        );
        $this->upload->initialize($config);
        if ($this->upload->do_upload('imagen')) {
            $data = array('upload_data'=> $this->upload->data());
            $dato =  $data['upload_data']['file_name'];
            $_SESSION["ruta"] = $data['upload_data']['file_name'];

            if($this->input->POST('imgant')){
                   $ruta = 'imagenes/imgusuarios/'.$this->input->POST('imgant');
                    unlink($ruta); 
                }
        }
        
            $id = $this->input->POST('id');
            $accion = $this->input->POST('accion');

            $datos = array(
                'nombre'=> $this->input->POST('nombre'),
                'usuario'=> $this->input->POST('usuario'),
                'contrasena'=> $this->input->POST('contrasena'),
                'telefono'=> $this->input->POST('tel'),
                'e_mail'=> $this->input->POST('email'),
                'ruta'=> $dato
            );
            
            if($accion=='add'){
                $resp["resultado"] = $this->model_usuario->guardar_usuario($datos);
                $resp["aca"]="add".$id;
            }else if($accion=='mod'){
                $resp["resultado"] = $this->model_usuario->modificar_usuario($datos,$id);
                $resp["aca"]="mod".$id;
            }else if($accion=='mod2'){
                unset($datos['contrasena']);
                $resp["resultado"] = $this->model_usuario->modificar_usuario($datos,$id);
                $resp["aca"]="mod2".$id;
            }
            $resp["acc"] = $accion;
            $resp['ruta'] = $ruta;
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
        $usu = $_SESSION["usuario"];
        $datos = array('password'=> $this->input->POST('con3'));
        $_SESSION["pass"] = $this->input->POST('con3');
        $resp["r"] = $this->model_usuario->modificar_usuario($datos,$usu);
        $this->setOutputV2($resp);
    }
    
    public function eliminar(){
        $id = $this->input->POST('id');
        $resp = $this->model_servicios->eleminar($id);
        $this->setOutputV2($resp);
    }
    
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}