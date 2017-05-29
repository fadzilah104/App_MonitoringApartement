<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->helper('url');
        $this->load->library('session');

    }

    public function index(){

        $this->load->view('vlogin');
    }

    public function login(){
         $this->session->unset_userdata("hak_akses");
         $this->session->unset_userdata("username");

        $dat = $this->Moap->get("select * from master_user where username = '".  $this->input->post('username')."' and password = '".$this->input->post('password')."'");
        foreach ($dat as $row) {
            $this->session->set_userdata("hak_akses", $row->akses);
            $this->session->set_userdata("nama",$row->nama);                
            $this->session->set_userdata("status",$row->aktif);
            $this->session->set_userdata("username",$row->username); 
        }
//            echo "hak_akses = ".$this->session->userdata("hak_akses");
        // $this->nonmember();
        $this->cek();
        if($this->session->userdata("hak_akses") == "superadmin") {
            $this->session->set_userdata("menu","Menu/superadmin");    
            //redirect("crud/kamar");
            redirect("pelanggan");
            //echo "<script>alert('Anda sebagai superadmin')</script>";

            //echo $_SESSION['menu'];
        }if ($this->session->userdata("hak_akses") == "admin"){
            $this->session->set_userdata("menu","Menu/admin");    
            //echo "<script>alert('Anda sebagai admin')</script>";
            redirect("pelanggan");    
                    //echo $_SESSION['menu'];
            
        } if($this->session->userdata("hak_akses") == "teknisi"){
            $this->session->set_userdata("menu","Menu/teknisi");    
            //echo "<script>alert('Anda sebagai teknisi')</script>";
            //redirect("pelanggan");
            //echo $_SESSION['menu'];
            redirect("teknisi");
        } 
        if($this->session->userdata("hak_akses") == "kasir"){
            $this->session->set_userdata("menu","Menu/kasir");    
           // echo "<script>alert('Anda sebagai kasir')</script>";
            //redirect("pelanggan");
            redirect("kasir");
           // redirect("menu/test");
        } 
        

    }

    public function cek(){
        if(empty($this->session->userdata("hak_akses"))) {
            $this->session->set_flashdata('login','Username atau Password Salah');
            redirect("login");
        }
        //echo $this->session->userdata("hak_akses");
        
        //echo $this->session->userdata('hak_akses');
            
    }

    public function logout(){
        
        session_destroy();
        redirect('login');
        
    }

    public function test(){

        echo Modules::run('Authorization/cek');
        //$this->cek();
        // $data['navbar'] = modules::run('Menu/superadmin');
        // $this->load->view('vtest',$data);

        // echo Modules::run('Template/header');
        // echo '<nav class="navbar navbar-default" role="navigation">
        //     <div class="container-fluid">
        //         <!-- Brand and toggle get grouped for better mobile display -->
        //         <div class="navbar-header">
        //             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        //                 <span class="sr-only">Toggle navigation</span>
        //                 <span class="icon-bar"></span>
        //                 <span class="icon-bar"></span>
        //                 <span class="icon-bar"></span>
        //             </button>
        //             <a class="navbar-brand" href="#">Title</a>
        //         </div>
        
        //         <!-- Collect the nav links, forms, and other content for toggling -->
        //         <div class="collapse navbar-collapse navbar-ex1-collapse">
        //             <ul class="nav navbar-nav">
        //                 <li class="active"><a href="#">Link</a></li>
        //                 <li><a href="#">Link</a></li>
        //             </ul>
        //             <form class="navbar-form navbar-left" role="search">
        //                 <div class="form-group">
        //                     <input type="text" class="form-control" placeholder="Search">
        //                 </div>
        //                 <button type="submit" class="btn btn-default">Submit</button>
        //             </form>
        //             <ul class="nav navbar-nav navbar-right">
        //                 <li><a href="#">Link</a></li>
        //                 <li class="dropdown">
        //                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        //                     <ul class="dropdown-menu">
        //                         <li><a href="#">Action</a></li>
        //                         <li><a href="#">Another action</a></li>
        //                         <li><a href="#">Something else here</a></li>
        //                         <li><a href="#">Separated link</a></li>
        //                     </ul>
        //                 </li>
        //             </ul>
        //         </div><!-- /.navbar-collapse -->
        //     </div>
        // </nav>';
        // echo Modules::run('Template/footer');
    }

}
