<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cobranza extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerasesores(){
        $query = $this->db->get('asesor')->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    function obtenerinscri(){
        $query = $this->db->get('pagoinscripcion')->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    function obtenerlegali(){
        $query = $this->db->get('pagofinal')->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    function guardar($datos){
        return $this->db->insert('pagoinscripcion',$datos);
    }
    function guardarlegalizacion($datos){
        return $this->db->insert('pagofinal',$datos);
    }        
    function respaldo(){
        $query = "mysqldump -u [usuario] -p [base de datos] > [archivo de respaldo].sql";
        $this->db->query($query)->result_array();
    }
    function obtenerins($id){
        return $this->db->get_where('pagoinscripcion',array('matricula'=>$id))->result_array();
    }
    function obtenerlega($id) {
        return $this->db->get_where('pagofinal',array('matricula'=>$id))->result_array();
    }
    
    function buscarmat($id) {
        $q = $this->db->get_where('alumnos',array('matricula'=>$id))->result_array();
        if($q){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

