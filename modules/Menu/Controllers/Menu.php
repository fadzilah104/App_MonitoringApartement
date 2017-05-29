<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->helper('url');
        //$this->load->library('session');
         
    }

    public function index(){
    	
    }

    public function superadmin(){
    	$this->load->view('vsuperadmin');
    	//echo "menu superadmin";
    }

    public function admin(){
    	$this->load->view('vsuperadmin');
    	//echo "menu admin";
    }

    public function teknisi(){
    	$this->load->view('vteknisi');
    	//echo "menu teknisi";
    }

    public function kasir(){
    	$this->load->view('vkasir');
    	//echo "menu kasir";
    }

    public function test(){
    	$this->load->view('vtest');
    }

}