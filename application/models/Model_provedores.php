<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_provedores extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerprovedores(){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Provedores');
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    function eleminar($id){
        return $this->db->delete('Bit_Pur_Provedores',array(
            'id_provevedor'=>$id));
    }

    function obtenerprovedor($id){
        $query = $this->db->get_where('Bit_Pur_Provedores',array('id_provevedor'=>$id))->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }

    function guardar_provedor($datos){
        return $this->db->insert('Bit_Pur_Provedores',$datos);
    }
    
    function modificar_provedor($datos,$id){
        return $this->db->update('Bit_Pur_Provedores',$datos,array(
                'id_provevedor' => $id
            ));
    }
    
}