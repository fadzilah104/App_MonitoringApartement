<?php


class Custom_query extends CI_Model {

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

    public function detail_pelanggan($table1, $table2, $table3, $table4, $par=null, $var = 0){
    	// $this->db->where($par,$var); 
        // $query = $this->db->query("SELECT * FROM $table1 JOIN $table2 ON $table1.ktp=$table2.ktp WHERE $table1.ktp=$var;
// ");
    	$this->db->where($par, $var);
        $this->db->select('*');
        	$this->db->from('pelanggan');
        	$this->db->join('bio_penghuni', 'pelanggan.ktp=bio_penghuni.ktp');
        	$this->db->join('master_autodebet', 'pelanggan.id_autodebet=master_autodebet.id_autodebet');
        	$this->db->join('master_meter', 'pelanggan.mid=master_meter.mid');
        	$query = $this->db->get();
        return $query->result();

           }

    public function pelanggan($table1, $table2, $table3, $table4){
    	 $this->db->select('*');
        	$this->db->from('pelanggan');
        	$this->db->join('bio_penghuni', 'pelanggan.ktp=bio_penghuni.ktp');
        	$this->db->join('master_autodebet', 'pelanggan.id_autodebet=master_autodebet.id_autodebet');
        	$this->db->join('master_meter', 'pelanggan.mid=master_meter.mid');
        	$query = $this->db->get();
        return $query->result();
    }

    public function master_kamar($table1,$table2){
            $this->db->select('*');
            $this->db->from('master_kamar');
            $this->db->join('monitor_meter','master_kamar.mid=monitor_meter.mid');
            $query = $this->db->get();
            return $query->result();

    }

       }