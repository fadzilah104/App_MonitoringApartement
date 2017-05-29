 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends MX_Controller {

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
            $this->load->view('v_main',$data);
	}

/*    fungsi untuk menampilkan data pelanggan*/
    public function data_pelanggan(){
        // $dat = array();
        $data['murl'] = $this->murl;
        // $data['pelanggan'] = $this->Custom_query->pelanggan('pelanggan','bio_penghuni', 'master_autodebet', 'master_mater');
        $data['kamar'] = $this->Custom_query->master_kamar('master_kamar','monitor_meter');
        $this->load->view('v_pelanggan',$data);
                // $this->load->view('vtest');
        // echo "string";
    }
    /*fungsi untuk menampilkan detail pelanggan*/
    public function detail_pelanggan($id){
        // $id = $this->uri->segment(3).'/';
        $data['data'] = $this->Custom_query->detail_pelanggan('pelanggan','bio_penghuni', 'master_autodebet', 'master_mater', 'pelanggan.ktp', $id);
        // $data['data'] = $this->Moap->select('bio_penghuni','ktp',$id);
        // echo "string";
        // echo $id;
        // $data['data'] = $this->db->query("select * from bio_penghuni where ktp = '$id'")->result();
        // print_r($data)
        $this->load->view('v_detail',$data);
      
    }

    public function master_kamar($table1, $table2){
        $data['kamar'] = $this->Custom_query->master_kamar('master_kamar','monitor_meter');
        // $this->load->views('v_pelanggan', $data);

    }

}