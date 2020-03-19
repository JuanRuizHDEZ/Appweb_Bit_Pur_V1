<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_usuario');
        $this->load->library('upload');
    }
    
    public function index(){
        session_start();
        $datos['dat'] = $this->model_usuario->obtenerusuarios();
        $this->load->view('usuarios/tabla',$datos);
    }

    public function registrar(){
        session_start();
        $id = $this->input->GET('id');
        $datos['dat'] = $this->model_usuario->obtenerusuario($id);
        $datos['dat2'] = $this->model_usuario->obtenertipos();
        $this->load->view('usuarios/registro',$datos);
    }

    public function guardar_usuario(){
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_MX.UTF-8');
        
        $id = $this->input->POST('id');
        $ale = rand(1,100);
        
        
        $accion = $this->input->POST('accion');

        $config = array(
            'upload_path' => 'imagenes/imgusuarios',
            'file_name' => 'img_'.$ale."_".date('Y-m-d-h-i-s'),
            'allowed_types' => '*'
        );
        $this->upload->initialize($config);

        if ($this->upload->do_upload('imagen')) {
            $data = array('upload_data'=> $this->upload->data());
            $dato =  $data['upload_data']['file_name'];

            if($this->input->POST('imgant')){
                   $ruta = 'imagenes/imgusuarios/'.$this->input->POST('imgant');
                    unlink($ruta); 
                }
        }else{
            if($this->input->POST('imgant')){
                $dato = $this->input->POST('imgant');
            }else{
                $dato = "";
            }
        }


        $datos = array(
            'nombre_usu'=> $this->input->POST('nombre'),
            'usuario'=> $this->input->POST('usuario'),
            'contrasena'=> $this->input->POST('contrasena'),
            'telefono_usu'=> $this->input->POST('tel'),
            'e_mail'=> $this->input->POST('email'),
            'id_tipo' => $this->input->POST('tip'),
            'ruta_u'=> $dato
        );
        
        if($accion=='add'){
            $resp["resultado"] = $this->model_usuario->guardar_usuario($datos);
            $resp["aca"]="add".$id;
        }else if($accion=='mod'){
            $resp["resultado"] = $this->model_usuario->modificar_usuario($datos,$id);
            $resp["aca"]="mod".$id;
        }
        $resp["acc"] = $accion;
        $this->setOutputV2($resp);
    }
    
    public function eliminar(){
        $id = $this->input->POST('id');
        $resp = $this->model_usuario->eleminar($id);
        $this->setOutputV2($resp);
    }

    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}