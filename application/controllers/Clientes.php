<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_clientes');
    }
    
    public function index(){
        session_start();
        $datos['dat'] = $this->model_clientes->obtenerclientes();
        $this->load->view('clientes/tabla',$datos);
    }

    public function eliminar(){
        $id = $this->input->POST('id');
        $resp = $this->model_clientes->eleminar($id);
        $this->setOutputV2($resp);
    }

    public function registro(){
        session_start();
        $id = $this->input->GET('id');
        $datos['dat'] = $this->model_clientes->obtenercliente($id);
        $datos['dat2'] = $this->model_clientes->obtenerusuarios();
        $this->load->view('clientes/registro',$datos);
    }

    public function guardar_cliente(){
        
        $accion = $this->input->POST('accion');
        $id = $this->input->POST('id');
        $fre = $this->input->POST('fre');
        $fre2='';
        if($fre){
            foreach ($fre as $value) {
                if($fre2==''){
                    $fre2 = $value;
                }else{
                    $fre2 = $fre2.','.$value;
                }
            
        }
        }


        $datos = array(
            'id_vendedor'=> $this->input->POST('id_ven'),
            'giro'=> $this->input->POST('giro'),
            'frecuencia'=> $fre2,
            'dispensadores'=> $this->input->POST('disp'),
            'lugar'=> $this->input->POST('lu'),
            'fecha_c'=> $this->input->POST('fe'),
            'nom_est'=> $this->input->POST('ne'),
            'nom_pro'=> $this->input->POST('np'),
            'ruta_c'=> $this->input->POST('ru'),
            'garafones'=> $this->input->POST('gar'),
            'exhibidores'=> $this->input->POST('exh'),
            'portagarafones'=> $this->input->POST('port'),
            'costo_por_destruccion'=>$this->input->POST('cpd'),
            'domicilio'=>$this->input->POST('dom'),
            'calle1'=>$this->input->POST('calle1'),
            'calle2'=>$this->input->POST('calle2'),
            'calle3'=>$this->input->POST('calle3'),
            'colonia'=>$this->input->POST('col'),
            'cp'=>$this->input->POST('cp'),
            'telefono_cli'=>$this->input->POST('tel'),
        );
        
        if($accion=='add'){
            $resp["resultado"] = $this->model_clientes->guardar_cliente($datos);
            
        }else if($accion=='mod'){
            $resp["resultado"] = $this->model_clientes->modificar_cliente($datos,$id);
            
        }

        $resp["acc"] =$accion;
        $this->setOutputV2($resp);
    }
    
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}