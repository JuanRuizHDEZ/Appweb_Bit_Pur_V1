<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_recordatorio');
    }
    
    public function index(){
        session_start();
        $id = $_SESSION["id"];
        $datos['dat'] = $this->model_recordatorio->obtenerecordatorios($id);
        $this->load->view('v_principal',$datos);
    }
}

