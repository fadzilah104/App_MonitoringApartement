<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kasir extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        // $this->load->database();
        // $this->load->helper('url');
        // $this->load->library('session');
        // echo Modules::run('Authorization/cek ');

        if($this->session->userdata("hak_akses") == "") {
            $this->session->set_flashdata('login','Anda tidak mempunyai akses');
            redirect("login");
        }elseif($this->session->userdata('hak_akses') !="kasir") {
            $this->session->set_flashdata('login','Anda tidak mempunyai akses');
            redirect("login");
        }

      	}

      	public function index(){
        $data['title'] = "Cek No. Kamar";
        $this->load->view('vKasir', $data);
      	}

        public function cekData() {
          $nokamar = $this->input->post('nokamar');

          $nokamar = $this->input->post('nokamar');
          if ($nokamar == null) {
            echo "<script>
                    alert('No kamar tidak boleh kosong');
                    window.location.href='kasir';
                </script>";
          }

          $this->session->set_userdata('nokamar',$nokamar);

          $data = $this->Moap->get("Select k.no_kamar as no_kamar, p.nama as nama, k.mid from bio_penghuni p, master_kamar k, pelanggan c, master_meter m where 
            c.id_kamar = k.id_kamar AND
            c.ktp = p.ktp AND
            k.no_kamar ='$nokamar'");

          //print_r($data);
          //$test = $this->db->query("select * from ");

           if( $data == true ) { 
              foreach ($data as $d) {
              $data['no_kamar'] = $d->no_kamar;
              $data['nama'] = $d->nama;
              $data['mid'] = $d->mid;
            
            }
            $this->load->view('vCekData', $data);
            } else {
              echo "<script>
                    alert('No. Kamar Tidak Ditemukan');
                    window.location.href='kasir';
                </script>";
            }
            }
            

          public function printData() {
        $nokamar = $this->session->userdata('nokamar');
        $nama = $this->input->post('nama');
        $mid = $this->input->post('mid');

        $data = $this->Moap->get("Select t.no_transaksi, k.no_kamar as no_kamar, p.nama as nama, k.mid from bio_penghuni p,     master_kamar k, pelanggan c, master_meter m, trx_token t where 
            c.id_kamar = k.id_kamar AND
            c.ktp = p.ktp AND
            k.no_kamar ='$nokamar'");

       // print_r($data);

        foreach ($data as $d) {
        $data['no_kamar'] = $d->no_kamar;
        $data['nama'] = $d->nama;
        $data['mid'] = $d->mid;
       }



        $mid = $mid;
        $jumlah = $this->input->post('nilai');
        if($jumlah == '100.000')  {
        	$jumlah == '100';
          $hasil = $jumlah * 0.05;
          $hitung = $jumlah - $hasil;
        	modules::run('Api/token',$mid,$hitung);
        } elseif ($jumlah == '200.000') {
        	$jumlah == '200';
        	modules::run('Api/token',$mid,$jumlah);
        } elseif ($jumlah == '300.000') {
        	$jumlah == '300';
        	modules::run('Api/token',$mid,$jumlah);
        } elseif ($jumlah == '400.000') {
        	$jumlah == '400';
        	modules::run('Api/token',$mid,$jumlah);
        } elseif ($jumlah == '500.000') {
        	$jumlah == '500';
        	modules::run('Api/token',$mid,$jumlah);
        } elseif ($jumlah == '600.000') {
        	$jumlah == '600';
        	modules::run('Api/token',$mid,$jumlah);
        } elseif ($jumlah == '700.000') {
        	$jumlah == '700';
        	modules::run('Api/token',$mid,$jumlah);
        } elseif ($jumlah == '800.000') {
        	$jumlah == '800';
        	modules::run('Api/token',$mid,$jumlah);
        } elseif ($jumlah == '900.000') {
        	$jumlah == '900';
        	modules::run('Api/token',$mid,$jumlah);
        } else {
            $jumlah == '1000';
             modules::run('Api/token',$mid,$jumlah);
        }
        //   $jumlah == '900';
        //   modules::run('Api/token',$mid,$jumlah);
        // }
        
       	$sql = $this->Moap->get('select * from trx_token');

       	foreach ($sql as $row) {
       		$data['trx']= $row->no_transaksi;
       		$data['nilai'] = $row->nilai;
       		$data['hasil_token'] = $row->hasil_token;
       		$data['waktu_proses'] = $row->waktu_proses;
       	}

        $this->load->view('printData',$data);
      }
      public function test(){
        // $meter = 36003205907;
        // $jumlah = 200;
        // echo Modules::run('Api/token/'.$meter.'/'.$jumlah.');

      }

}
?>