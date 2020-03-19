<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_recordatorio extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerecordatorios($id){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Recordatorios');
        $this->db->where('id_usuario',$id);
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    function eleminar($id){
        return $this->db->delete('Bit_Pur_Recordatorios',array(
            'id_recordatorio'=>$id));
    }

    function obtenerecordatorio($id){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Recordatorios');
        $this->db->where('id_recordatorio',$id);
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }

    function guardar_recordatorio($datos){
        return $this->db->insert('Bit_Pur_Recordatorios',$datos);
    }
    
    function modificar_recordatorio($datos,$id){
        return $this->db->update('Bit_Pur_Recordatorios',$datos,array(
                'id_recordatorio' => $id
            ));
    }
    
}