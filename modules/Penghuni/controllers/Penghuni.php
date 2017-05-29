<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penghuni extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->database();
        $this->load->helper('url');
        echo Modules::run('Authorization/cek ');

      	}

      	public function index(){
      		echo "Penghuni";
      	}

}