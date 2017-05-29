<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {

    public function getMahasiswa($where="") {
        $data=$this->db->query('SELECT * FROM mahasiswa '. $where);
        return $data->result_array();
    }
    
    public function insertData($tabelname, $data) {
        $res = $this->db->insert($tabelname, $data);
       return $res;
    }
    
    public function updateData($tabelname, $data, $where) {
        $res = $this->db->update($tabelname, $data, $where);
       return $res;
    }
    
    public function deleteData($tabelname,$where){
        $res = $this->db->delete($tabelname,$where);
       return $res;
    }
}
?>