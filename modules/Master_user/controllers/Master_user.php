 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user extends MX_Controller {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->murl = '/modules/'.$this->uri->segment(1).'/';
                $this->load->model('Moap');
        }

	public function index()
	{
            $data['murl'] = $this->murl;
            $id = $this->uri->segment(3);
            $data['user'] = $this->Moap->table('master_user');
            $this->load->view('vmain',$data);
	}

    public function get_data(){
        $data['murl'] = $this->murl;
        $data['user'] = $this->Moap->table('master_user');
        $this->load->view('vmain',$data); 
    }

    public function form_insert(){
        $this->load->view('form_insert');
    }

    function insert_aksi(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $akses = $this->input->post('akses');
        $status = $this->input->post('status');

        $data = array(
            'nama'=>$nama,
            'username'=>$username,
            'password'=>$password,
            'akses'=>$akses,
            'status'=>$status    
            );

        $this->Moap->insert('master_user',$data);         
        redirect('user/index');
} 

    // Function to Fetch selected record from database.
//     function show_user_id() {
//         $id = $this->uri->segment(3);
//         $data['user'] = $this->Moap->table('master_user');
//         $data['singgle_user'] = $this->Moap->show_user_id($id);
//         $this->load->view('vmain', $data);
// }

//     public function delete_user_id(){
//         $id = $this->uri->segment(3);
//         // $table = $this->Moap->table('master_user');
//         $this->Moap->delete_user_id($id);
//         $this->show_user_id();
//         redirect('user/index');
//     }

    public function delete(){
        $data['murl'] = $this->murl;
        // $table = $this->Moap->table('master_user');
        // $id = (int)$this->uri->segment(3).'/';
        $par = 'id'; 
        $var = $this->uri->segment(3).'/';
        $this->Moap->delete('master_user',$par,$var);
        // $this->load->view('vmain',$data);
        redirect('user/index');
    }

    public function update(){
        $id = $this->uri->segment(3).'/';
        $data['hasil'] = $this->Moap->select('master_user','id',$id);
        $this->load->view('form_update', $data);
    }

    public function update_aksi(){
        // $data['murl'] = $this->murl;
        $id = $this->input->post('id');
        // $id = $this->uri->segment(3).'/';
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $akses = $this->input->post('akses');
        $status = $this->input->post('status');
        $data = array(
            'id'=>$id,
            'nama'=>$nama,
            'username'=>$username,
            'password'=>$password,
            'akses'=>$akses,
            'status'=>$status
            );
        echo 'dsfss';
        echo $id;   
        $this->Moap->update('master_user',$data,'id',$id);
        redirect('user/index');
    }
}