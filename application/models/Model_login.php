<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function verificar_usuario($usuario,$pass){
        $query = $this->db->get_where('Bit_Pur_Usuarios',array('usuario'=>$usuario,'contrasena'=>$pass))->result_array();
        
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    function obtener_usuario($usuario,$pass){
        $query = $this->db->get_where('usuarios',array('iduser'=>$usuario,'password'=>$pass))->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query[0];
        }
    }
    
    function obtenerProducto($id){
        $query = $this->db->get_where('productos',array('id'=>$id))->result_array();
        if($query == NULL){
            return false;
        } else {
            return $query;
        }
    }
    
    function eleminar_p($id){
        return $this->db->delete('productos',array(
            'id'=>$id));
    }
    
    function editar_p($datos,$id){
        if($id==""){
            return $this->db->insert('productos',$datos);
            
        }else{
        $sql = $this->db->update('productos',$datos,array(
                'id' => $id
            ));
            return $sql;
        }
    }
    
    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }
    
}

