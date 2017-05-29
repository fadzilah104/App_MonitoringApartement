<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MX_Controller {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->murl = '/modules/'.$this->uri->segment(1).'/';
        }

	public function index()
	{
            //$data['murl'] = $this->murl;
            //$this->load->view('vmain',$data);
            //$meter_id = '36003205907';
            $meter_id = '36002941619';
            $val = 200;
            echo modules::run('Api/token',$meter_id,$val);
	}
        
        public function testdata(){
            $this->load->view('vmain');
        }
        
        public function modeltest(){
            echo $this->Moap->test();
        }
        
        public function remap($method){
            $rem = FALSE;
            if($method == "right") {$this->right ();$rem=TRUE;}
            if(!$rem)echo "Method unknown"; 
        }
        
        public function right(){
            echo "Welcome to the right place"."<br />";
        }
}
