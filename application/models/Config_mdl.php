<?php
/**
 * Description of Config_mdl
 *
 * @author felipe de jesus
 */

class Config_mdl extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    public function sqlGetDataLike($table,$data,$limit) {
        return $this->db
                ->like($data)
                ->limit(isset($limit) ? $limit : 1000)
                ->get($table)
                ->result_array();
    }
    public function sqlTruncateTable($Table) {
        return $this->db->truncate($Table);
    }
    /*SQL'S*/
    public function sqlInsert($table,$data) {
        return $this->db->insert($table,$data);
    }
    public function sqlUpdate($table,$data,$condicion) {
        return $this->db->update($table,$data,$condicion);
    }
    public function sqlDelete($table,$condicion) {
        return $this->db->delete($table,$condicion);
    } 
    public function sqlQuery($query) {
        return $this->db->query($query)->result_array();
    }
    public function sqlQueryUpdate($query) {
        
        return $this->db->query($query);
    }
    public function sqlQueryProcedure($query) {
        $q=$this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        return $q->result();
    }
    public function sqlGetData($table,$atribute="*") {
        $this->db->select($atribute);
        return $this->db->get($table)->result_array();
    }
    public function sqlGetDataCondition($table,$condicion,$atribute='*') {
        $this->db->select($atribute);
        return $this->db->get_where($table,$condicion)->result_array();
    }
    public function sqlGetLastId($table,$id) {
        $sql= $this->db->select_max($id,'last_id')->get($table)->result_array();
        return $sql[0]['last_id'];
    }
    public function sqlGetDataConditionTables($table,$condicion) {
        return $this->db->get_where($table,$condicion)->result_array();
    }
    public function sqlResetKey($table) {
        return $this->db->query("ALTER TABLE $table AUTO_INCREMENT = 1;");
    }
    
    
    public function sqlInsert2($bdC,$table,$data) {
        $bd= $this->load->database($bdC,TRUE);
        return $bd->insert($table,$data);
    }
    public function sqlUpdate2($bdC,$table,$data,$condicion) {
        $bd= $this->load->database($bdC,TRUE);
        return $bd->update($table,$data,$condicion);
    }
    public function sqlDelete2($bdC,$table,$condicion) {
        $bd= $this->load->database($bdC,TRUE);
        return $bd->delete($table,$condicion);
    } 
    public function sqlQuery2($bdC,$query) {
        $bd= $this->load->database($bdC,TRUE);
        return $bd->query($query)->result_array();
    }
    public function sqlGetData2($bdC,$table,$atribute="*") {
        $bd= $this->load->database($bdC,TRUE);
        $bd->select($atribute);
        return $bd->get($table)->result_array();
    }
    public function sqlGetDataCondition2($bdC,$table,$condicion,$atribute='*') {
        $bd= $this->load->database($bdC,TRUE);
        $bd->select($atribute);
        return $bd->get_where($table,$condicion)->result_array();
    }
}
