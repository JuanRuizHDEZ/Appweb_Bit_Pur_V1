<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_ventas');
    }
    
    public function index(){
        session_start();
        $datos['dat'] = $this->model_ventas->obtenerventas();
        $this->load->view('ventas/tabla',$datos);
    }

    public function eliminar(){
        $id = $this->input->POST('id');
        $resp = $this->model_ventas->eleminar($id);
        $this->setOutputV2($resp);
    }

    public function registro(){
        session_start();
        $this->load->view('ventas/registro');
    }

    public function guardar_venta(){
        session_start();
        $accion = $this->input->POST('accion');
        $id_venta = "";
        $idg = $this->input->POST('id_objetog');
        $ids = $this->input->POST('id_objetos');
        $idt = $this->input->POST('id_objetot');

        $datos = array(
            'id_usuario' => $_SESSION["id"],
            'total' => $this->input->POST('total')
        );
        
        if($accion=='add'){
            $id_venta = $this->model_ventas->guardar_venta($datos);
            
        }else {
           $id_venta = false;
            
        }

        if($id_venta){
            $datosg = array(
                'id_venta' => $id_venta,
                'id_objeto'=>$this->input->POST('id_objetog'),
                'cantidad'=>$this->input->POST('cantidadg'),
                'subtotal'=>$this->input->POST('subg')
            );
            $datoss = array(
                'id_venta'=>$id_venta,
                'id_objeto'=>$this->input->POST('id_objetos'),
                'cantidad'=>$this->input->POST('catidads'),
                'subtotal'=>$this->input->POST('subs')
            );
            $datost = array(
                'id_venta'=>$id_venta,
                'id_objeto'=>$this->input->POST('id_objetot'),
                'cantidad'=>$this->input->POST('cantidadt'),
                'subtotal'=>$this->input->POST('subt')
            );
            $actg = array(
                'cantidad'=>$this->input->POST('actg')
            );
            $acts = array(
                'cantidad'=>$this->input->POST('acts')
            );
            $actt = array(
                'cantidad'=>$this->input->POST('actt')
            );
            if($accion=='add'){
                $resp["resultado"] = $this->model_ventas->guardar_venta_comp($datosg,$datoss,$datost);
                $resp["resultado2"] = $this->model_ventas->guardar_venta_act($actg,$acts,$actt,$idg,$ids,$idt);
                
            }else {
                $resp["resultado"] = false;
                $resp["resultado2"] = false;
            }
        }

        $resp["acc"] =$accion;
        
        $this->setOutputV2($resp);
    }

    public function obtenerproductos(){
        $resp = $this->model_ventas->obtenerproductos();
        $this->setOutputV2($resp);
    }

    
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}