<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_servicios extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function obtenerpedidos(){
        $this->db->select('*');
        $this->db->from('Bit_Pur_Clientes_Servicios_Usuario');
        $this->db->join('Bit_Pur_Clientes','Bit_Pur_Clientes.id_cliente = Bit_Pur_Clientes_Servicios_Usuario.id_cliente');
        $this->db->join('Bit_Pur_Usuarios','Bit_Pur_Clientes_Servicios_Usuario.id_usuario = Bit_Pur_Usuarios.id_usuario');
        $this->db->join('Bit_Pur_Tipo_Pedido','Bit_Pur_Tipo_Pedido.id_tipo = Bit_Pur_Clientes_Servicios_Usuario.id_tipo');
        $query = $this->db->get()->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    function eleminar($id){
        return $this->db->delete('Bit_Pur_Clientes_Servicios_Usuario',array(
            'id_servicio'=>$id));
    }
    

    function obtenerusuario($id){
        $query = $this->db->get_where('Bit_Pur_Usuarios',array('id_usuario'=>$id))->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    
    function guardar_usuario($datos){
        return $this->db->insert('Bit_Pur_Usuarios',$datos);
    }
    
    function modificar_usuario($datos,$id){
        return $this->db->update('Bit_Pur_Usuarios',$datos,array(
                'id_usuario' => $id
            ));
    }
    
    function obtenermenus($id) {
        return $this->db->get_where('usermenu',array(
                'iduser' => $id
            ));
    }
    
}