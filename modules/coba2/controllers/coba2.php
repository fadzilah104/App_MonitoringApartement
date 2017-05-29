<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class coba2 extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        echo Modules::run('Authorization/cek ');

      	}

      	public function index() {
      	$this->load->helper('pdf_helper');
        /*
          ---- ---- ---- ----
          your code here
          ---- ---- ---- ----
         */
        $nokamar = $this->input->get('nokamar');
        $nama = $this->input->get('nama');
        $nama = $this->input->get('mid');
        $data['kredit'] = $this->input->post('kredit');
        $data = $this->Moap->get("Select k.no_kamar as no_kamar, p.nama as nama, m.mid from bio_penghuni p, master_kamar k, pelanggan pe, master_meter m where 
            pe.id_kamar = k.id_kamar AND
            pe.ktp = p.ktp AND
            k.no_kamar");

        foreach ($data as $d) {
          $data['no_kamar'] = $d->no_kamar;
          $data['nama'] = $d->nama;
          $data['mid'] = $d->mid;
        }

        $data['murl'] = $this->murl;
        $this->load->view('vpdf_table', $data);
      	}

      	public function create_pdf2() {
        
        // $this->pdf();
    }

        


       
}
?>