<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->helper('url');

      	}

      	public function index(){
      		echo "error";
      	}

        public function error_404(){
          $data['heading'] = "Error_404";
          $data['message'] = "Maaf Halaman yang anda cari tidak ditemukan";

          $this->load->view("errors/html/error_404",$data);
        }

}