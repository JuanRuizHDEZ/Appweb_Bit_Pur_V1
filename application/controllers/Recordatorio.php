<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recordatorio extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_recordatorio');
    }
    
    public function index(){
        session_start();
        $id = $_SESSION["id"];
        $datos['dat'] = $this->model_recordatorio->obtenerecordatorios($id);
        $this->load->view('recordatorio/tabla',$datos);
    }

    public function eliminar(){
        $id = $this->input->POST('id');
        $resp = $this->model_recordatorio->eleminar($id);
        $this->setOutputV2($resp);
    }

    public function registro(){
        session_start();
        $id = $this->input->GET('id');
        $datos['dat'] = $this->model_recordatorio->obtenerecordatorio($id);
        $this->load->view('recordatorio/registro',$datos);
    }

    public function guardar_recordatorio(){
        session_start();
        $accion = $this->input->POST('accion');
        $id = $this->input->POST('id');
        
        $id_usu = $_SESSION["id"];
        $hora = $this->input->POST('ho1').':'.$this->input->POST('ho2').':'.$this->input->POST('ho3');

        $datos = array(
            'texto' => $this->input->POST('re'),
            'fecha' => $this->input->POST('fe'),
            'hora'=> $hora,
            'id_usuario'=> $id_usu
        );
        
        if($accion=='add'){
            $resp["resultado"] = $this->model_recordatorio->guardar_recordatorio($datos);
            
        }else if($accion=='mod'){
            $resp["resultado"] = $this->model_recordatorio->modificar_recordatorio($datos,$id);
            
        }

        $resp["acc"] =$accion;
        $this->setOutputV2($resp);
    }
    
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}