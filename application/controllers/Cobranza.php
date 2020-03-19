<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cobranza extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_cobranza');
    }
    
    public function index(){
        $this->load->view('');
    }
    
    public function inscripciones() {
        $datos['ase'] = $this->model_cobranza->obtenerasesores();
        $this->load->view('cobranza/incripciones', $datos);
    }
    
    public function legalizacion() {
        $this->load->view('cobranza/legalizacion');
    }
    
    public function historialpagos() {
        $datos['pinsc'] = $this->model_cobranza->obtenerinscri();
        $datos['plega'] = $this->model_cobranza->obtenerlegali();
        $this->load->view('cobranza/historialpagos',$datos);
    }
    
    public function buscaralu() {
        $id = $this->input->POST('id');
        $datos['ins'] = $this->model_cobranza->obtenerins($id);
        $datos['lega'] = $this->model_cobranza->obtenerlega($id);
        $this->setOutputV2($datos);
    }

    public function guardar(){
        $resp;
        date_default_timezone_set('America/Mexico_City');
        $datos = array(
            'fechapago'=> date('y-m-d'),
            'monto'=> $this->input->POST('monto'),
            'pagacon'=> $this->input->POST('pc'),
            'hora'=> date('h:i:s'),
            'matricula'=> $this->input->POST('mat'),
            'idasesor'=> $this->input->POST('ase')
        );
        if($this->model_cobranza->buscarmat($this->input->POST('mat'))){
            $resp['o'] = $this->model_cobranza->guardar($datos);
        }else{
            $resp['msj'] = 'LA MATRICULA NO EXISTE';
            $resp['o'] = FALSE;
        }
        $this->setOutputV2($resp);
    }
    public function guardarlegalizacion(){
        $resp;
        date_default_timezone_set('America/Mexico_City');
        session_start();
        $id = $_SESSION["usuario"];
        $datos = array(
            'fechapago'=> date('y-m-d'),
            'monto'=> $this->input->POST('monto'),
            'pagacon'=> $this->input->POST('pc'),
            'hora'=> date('h:i:s'),
            'matricula'=> $this->input->POST('mat'),
            'iduser'=> $id
        );
        if($this->model_cobranza->buscarmat($this->input->POST('mat'))){
            $resp = $this->model_cobranza->guardarlegalizacion($datos);
        }else{
            $resp['msj'] = 'LA MATRICULA NO EXISTE';
            $resp['o'] = FALSE;
        }
        $this->setOutputV2($resp);
    }
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
}



