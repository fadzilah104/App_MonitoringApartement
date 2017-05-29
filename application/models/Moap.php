<?php

class Moap extends CI_Model {

    /*
        public $title;
        public $content;
        public $date;
    */
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function test(){
        
            return "MOAP is called";
        }
        
        public function table($table)
        {
                $query = $this->db->get($table);
                return $query->result();
        }
        
        public function table_limit($table,$limit)
        {
                $query = $this->db->get($table,$limit);
                return $query->result();
        }
        
        public function delete($table, $par, $var){
            $this->db->where($par,$var);
            $this->db->delete($table);
        }
        
        public function update($table, $data, $par, $var){
            $this->db->update($table, $data, array($par => $var));
        }
        
        public function insert($table, $data){
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
    
        public function select($table, $par, $var){
        
            $this->db->where($par,$var);
            $query = $this->db->get($table);
            return $query->result();
        }
        
        public function get($q)
        {
                $query = $this->db->query($q);
                return $query->result();
        }
        
        public function getRow($q){
            $query = $this->db->query($q);
            return $query->num_rows();
        }
        
        public function setQuery($q)
        {
                $this->db->query($q);
        }
        
        public function login($table,$username,$password){
            $query = $this->db->get_where($table, array('username' => $username,'password' => $password));
            return $query->row()->nama;
        }
        
        public function whereColumn($table,$search,$kolom){
            $query = $this->db->get_where($table, $search);
            return $query->row($kolom);
        }
        
        
        public function getColumn($q,$row){
            $query = $this->db->query($q);
            return $query->row($row);
        }
        
        public function csv($q){
            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');
            $query = $this->db->query($q);
            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download('CSV_Report.csv', $data);
        }
        
        public function textDownload($name,$data){
            $this->load->helper('file');
            $this->load->helper('download');
            force_download($name, $data);
        }

}
?>
