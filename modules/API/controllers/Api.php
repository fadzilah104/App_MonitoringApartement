<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->murl = '/modules/'.$this->uri->segment(1).'/';
        }

	public function token($meter_id,$val)
	{
            $data['murl'] = $this->murl;
            $notrans = "";
            $dat =  json_decode($this->get_notrans("http://192.168.1.8:3000/api/smc/saldokwh",$meter_id,$val));
            foreach($dat as $key => $value){
                $notrans = $value;
            }
            echo $notrans."<br />";
            sleep(2);
            $message = $this->get_token($notrans);
            
            echo "<br />";
            
            $trx = json_decode($message);
            
            $insert = array();
            foreach ($trx as $key => $value) {
               // array_push($insert,array($key=>$value));
                $insert = array_merge($insert, array($key=>$value));
            }
            $this->Moap->insert('trx_token',$insert);
            echo "<br /><br />";
//            var_dump($message);
            var_dump($insert);
        }
        
        
        /* gets the data from a URL */
        function get_notrans($url, $meter_id, $val) {
                $ch = curl_init();
                $username = "meisys-technology.com";
                $password = "5mc-m3i5y5";
                $timeout = 5;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
                curl_setopt($ch, CURLOPT_POSTFIELDS,"meterid=$meter_id&item=0&jumlah=$val");
                $data = curl_exec($ch);
                curl_close($ch);
                return $data;
        }
        
        
        /* gets the data from a URL */
        function get_token($notrans) {
                $ch = curl_init();
                $url = "http://192.168.1.8:3000/api/smc/gettoken";
                $username = "meisys-technology.com";
                $password = "5mc-m3i5y5";
                $timeout = 5;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
                curl_setopt($ch, CURLOPT_POSTFIELDS,"notrans=$notrans");
                $data = curl_exec($ch);
                curl_close($ch);
                return $data;
        }
        
        public function refresh(){
            $data['time'] = date('Y-m-d H:i:s');
            $this->load->view('vmain',$data);
        }
}
