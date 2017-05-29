<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootstrap extends CI_Controller {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->murl = '/modules/'.$this->uri->segment(1).'/';
        }

	public function index()
	{
			
            $data['data'] = $this->Moap->get("select * from mahasiswa");
            $this->load->view('vmain', $data);
	}
        
        public function Form(){
            $data['murl'] = $this->murl;
            $this->load->view('vform',$data);
        }
        
        public function Login(){
            $data['murl'] = $this->murl;
            $this->load->view('vlogin',$data);
        }
        
        public function Login2(){
            $data['murl'] = $this->murl;
            $this->load->view('vlogin2',$data);
        }
        
        public function Table(){
            $data['murl'] = $this->murl;
            $this->load->view('vtable',$data);
//            $db['data']= $this->Moap->get("select * from mahasiswa");
//            $this->load->view('vtable',$db);
        }
        
        public function Table2(){
            $data['murl'] = $this->murl;
            $this->load->view('vtable2',$data);
        }
        
        public function Table3(){
            $data['murl'] = $this->murl;
            $this->load->view('vtable3',$data);
        }
        
        public function TemplateWeb(){
            $data['murl'] = $this->murl;
            $this->load->view('vtemplate_web',$data);
        }
}
