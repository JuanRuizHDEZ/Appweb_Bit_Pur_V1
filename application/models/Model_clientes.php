<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_clientes extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerclientes(){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Clientes');
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    function eleminar($id){
        return $this->db->delete('Bit_Pur_Clientes',array(
            'id_cliente'=>$id));
    }

    function obtenercliente($id){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Clientes');
        $this->db->join('Bit_Pur_Usuarios','Bit_Pur_Usuarios.id_usuario = Bit_Pur_Clientes.id_vendedor');
        $this->db->where('id_cliente',$id);
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }

    function obtenerusuarios(){
        $this->db->select('id_usuario,nombre_usu');
        $this->db->from('Bit_Pur_Usuarios');
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }

    function guardar_cliente($datos){
        return $this->db->insert('Bit_Pur_Clientes',$datos);
    }
    
    function modificar_cliente($datos,$id){
        return $this->db->update('Bit_Pur_Clientes',$datos,array(
                'id_cliente' => $id
            ));
    }
    
}