<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Model_reportes extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function cargar_ventas($f1,$f2){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Ventas');
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }

    function cargar_inventario(){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Inventario');
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    function modificar_objeto($datos,$id){
        return $this->db->update('Bit_Pur_Inventario',$datos,array(
                'id_objeto' => $id
            ));
    }
    
}