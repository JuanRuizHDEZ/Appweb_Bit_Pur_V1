<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perfil extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function obtenerusuario($id){
        $query = $this->db->get_where('Bit_Pur_Usuarios',array('id_usuario'=>$id))->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    function modificar_usuario($datos,$id){
        return $this->db->update('Bit_Pur_Usuarios',$datos,array(
                'id_usuario' => $id
            ));
    }
    
    function obtenertipos() {
        $query = $this->db->get('Bit_Pur_Tipo_Usuario')->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
}