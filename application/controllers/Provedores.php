<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provedores extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_provedores');
    }
    
    public function index(){
        session_start();
        $datos['dat'] = $this->model_provedores->obtenerprovedores();
        $this->load->view('provedores/tabla',$datos);
    }

    public function eliminar(){
        $id = $this->input->POST('id');
        $resp = $this->model_provedores->eleminar($id);
        $this->setOutputV2($resp);
    }

    public function registro(){
        session_start();
        $id = $this->input->GET('id');
        $datos['dat'] = $this->model_provedores->obtenerprovedor($id);
        $this->load->view('provedores/registro',$datos);
    }

    public function guardar_provedor(){
        
        $accion = $this->input->POST('accion');
        $id = $this->input->POST('id');

        $datos = array(
            'nombre_pro'=> $this->input->POST('nombre'),
            'direccion'=> $this->input->POST('dir'),
            'telefono'=> $this->input->POST('tel'),
            'e_mail'=> $this->input->POST('email')
        );
        
        if($accion=='add'){
            $resp["resultado"] = $this->model_provedores->guardar_provedor($datos);
            
        }else if($accion=='mod'){
            $resp["resultado"] = $this->model_provedores->modificar_provedor($datos,$id);
            
        }

        $resp["acc"] =$accion;
        $this->setOutputV2($resp);
    }
    
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}