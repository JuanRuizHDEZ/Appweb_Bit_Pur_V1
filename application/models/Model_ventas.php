<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ventas extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerventas(){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Inventario');
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }

    function obtenerproductos(){
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

    function obtenerventa($id){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Ventas');
        $this->db->where('id_venta',$id);
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }

    function guardar_venta($datos){
        $R = $this->db->insert('Bit_Pur_Ventas',$datos);
        if($R){
            return $this->db->insert_id();
        }
    }

    function guardar_venta_comp($datosg,$datoss,$datost){
        $R1 = $this->db->insert('Bit_Pur_Ventas_inventario',$datosg);
        $R2 = $this->db->insert('Bit_Pur_Ventas_inventario',$datoss);
        $R3 = $this->db->insert('Bit_Pur_Ventas_inventario',$datost);
        if($R1 && $R2 && $R3){
            return true;
        } else{
            return false;
        }
    }

    function guardar_venta_act($actg,$acts,$actt,$idg,$ids,$idt){
            $R1 = $this->db->update('Bit_Pur_Inventario',$actg,array(
                'id_objeto' => $idg
            ));
            $R2 = $this->db->update('Bit_Pur_Inventario',$acts,array(
                'id_objeto' => $ids
            ));
            $R3 = $this->db->update('Bit_Pur_Inventario',$actt,array(
                'id_objeto' => $idt
            ));
            if($R1 && $R2 && $R3){
                return true;
            } else{
                return false;
            }    
    }
}