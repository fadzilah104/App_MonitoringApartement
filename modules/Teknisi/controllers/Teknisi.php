<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('form_validation');
        //echo modules::run('Authorization/cek ');
         if($this->session->userdata("hak_akses") == "") {
            $this->session->set_flashdata('login','Anda tidak mempunyai akses');
            redirect("login");
        }elseif($this->session->userdata('hak_akses') !="teknisi"){
            $this->session->set_flashdata('login','Anda tidak mempunyai akses');
            redirect("login");
        }
        // if($this->session->userdata('hak_akses') == "" and $this->session->userdata('hak_akses') != "admin"){
        //     redirect("login");
        // }

      	}

        public function index(){
            echo $this->load->view('vteknisi');
        }

}