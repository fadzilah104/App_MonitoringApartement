 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends MX_Controller {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->murl = '/modules/'.$this->uri->segment(1).'/';
                $this->load->model('Moap');
                $this->load->model('Custom_query');
        }

	public function index()
	{
            $data['murl'] = $this->murl;
            $this->load->view('vmain',$data);
	}

    public function latihan1() {
        $data['murl'] = $this->murl;
        $data['data'] = $this->Moap->get("select stand, last_update from histori_meter where mid = '36000582209' and Month(last_update) = Month(now()) group by (last_update)");
        $this->load->view('coba', $data);
    }
      
    public function report_chart(){
        $data['murl'] = $this->murl;
        $data['chart'] =$this->Moap->get('select mid, stand, DISTINCT(last_update) from histori_meter where mid = "36000582209" order by last_update');
        
        // $data = $this->Moap->get('select mid, stand, last_update from histori_meter where mid = "36000582209" order by last_update');
        $this->load->view('vchart',$data);    

        // echo $hasil[0]; 

        //  echo "aad";
        // $data['murl'] = $this->murl;
        // $data = $this->Moap->table('report');
        // if($data->mysql_num_rows() > 0){
        //     foreach($data->result() as $data){
        //         $hasil[] = $data;
        //     }
        // }
        // $hasil = $this->load->view('vchart',$hasil[]); 
        // echo "ok";
    }

 
}
