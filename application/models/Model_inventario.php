<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_inventario extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerinventario(){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Inventario');
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    function eleminar($id){
        return $this->db->delete('Bit_Pur_Inventario',array(
            'id_objeto'=>$id));
    }

    function obtenerobjeto($id){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Inventario');
        $this->db->where('id_objeto',$id);
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }

    function guardar_objeto($datos){
        return $this->db->insert('Bit_Pur_Inventario',$datos);
    }
    
    function modificar_objeto($datos,$id){
        return $this->db->update('Bit_Pur_Inventario',$datos,array(
                'id_objeto' => $id
            ));
    }
    
}