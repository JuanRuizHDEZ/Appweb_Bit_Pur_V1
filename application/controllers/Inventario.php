<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_inventario');
    }
    
    public function index(){
        session_start();
        $datos['dat'] = $this->model_inventario->obtenerinventario();
        $this->load->view('inventario/tabla',$datos);
    }

    public function eliminar(){
        $id = $this->input->POST('id');
        $resp = $this->model_inventario->eleminar($id);
        $this->setOutputV2($resp);
    }

    public function registro(){
        session_start();
        $id = $this->input->GET('id');
        $datos['dat'] = $this->model_inventario->obtenerobjeto($id);
        $this->load->view('inventario/registro',$datos);
    }

    public function guardar_producto(){
        session_start();
        $accion = $this->input->POST('accion');
        $id = $this->input->POST('id');

        $datos = array(
            'nombre_obj' => $this->input->POST('nom'),
            'precio' => $this->input->POST('pre'),
            'cantidad' => $this->input->POST('can')
        );
        
        if($accion=='add'){
            $resp["resultado"] = $this->model_inventario->guardar_objeto($datos);
            
        }else if($accion=='mod'){
            $resp["resultado"] = $this->model_inventario->modificar_objeto($datos,$id);
            
        }

        $resp["acc"] =$accion;
        $this->setOutputV2($resp);
    }
    
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}