<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->helper('url');
        //$this->load->library('session');
    }

    public function header(){
    	$this->load->view('vheader');

    }

    public function navbar(){

    	
    }

    public function sidebar(){
        if($this->session->userdata('hak_akses') == "admin"){
            $this->load->view('vsidebar');
        }elseif($this->session->userdata('hak_akses') == "kasir"){
            $this->load->view('vsidebar_kasir');
        }
        
    }

    public function content(){

    	
    }

    public function footer(){
    	$this->load->view('vfooter');
    }


}