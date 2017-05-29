<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('form_validation');
        //echo modules::run('Authorization/cek ');
         if($this->session->userdata("hak_akses") == "") {
            $this->session->set_flashdata('login','Anda tidak mempunyai akses');
            redirect("login");
        }elseif($this->session->userdata('hak_akses') !="admin" && $this->session->userdata('hak_akses') !="superadmin"){
            $this->session->set_flashdata('login','Anda tidak mempunyai akses');
            redirect("login");
        }
     
      	}

      	public function index(){
            $data['title'] = "Data Pelanggan";
      		// $data['data'] = $this->Moap->get('Select p.ktp,
        //         p.nama,
        //         p.email,
        //         p.no_telp,
        //         p.jabatan,
        //         IF(p.aktif = 0, "Tidak Aktif", "aktif") as aktif
        //       FROM bio_penghuni p order by p.ktp DESC');
        // $this->load->view('vpelanggan', $data);
            $data['data'] = $this->db->query("select b.aktif as aktif, b.jabatan as jabatan,b.ktp as ktp,c.id as id,c.aktif as aktif, d.mid as mid, d.no_kamar as no_kamar, b.nama as nama, b.no_telp as no_telp from bio_penghuni b, pelanggan c, master_kamar d where b.ktp = c.ktp and d.id_kamar = c.id_kamar")->result();
             $this->load->view('vpelanggan', $data);
      	}

        public function addPelanggan() {
        $data['title'] = "Data Pelanggan";
        $data['kamar'] = $this->db->query('SELECT id_kamar,no_kamar FROM master_kamar WHERE NOT EXISTS (SELECT * FROM pelanggan WHERE master_kamar.id_kamar = pelanggan.id_kamar) order by no_kamar ASC')->result();
        $data['debet'] = $this->Moap->get('select * from master_autodebet order by nilai_autodebet ASC');
        // $data['mid'] = $this->db->query('SELECT mid FROM master_meter WHERE NOT EXISTS (SELECT * FROM pelanggan WHERE master_meter.mid = pelanggan.mid)')->result();
        // print_r($data['mid']);

        $data['tanggal'] = date("m.d.y");
        $this->load->view('addPelanggan', $data);
        }


        public function cekKtp(){
        $ktp = $this->input->get('ktp');
        //$data = $this->db->query("select * from bio_penghuni where ktp = '$ktp'")->result();    
        $data['data'] = $this->db->query("select * from bio_penghuni where ktp = '$ktp'")->result();    
        
        $this->load->view("vHasilKTP",$data);
           // $data = $this->db->query("select * from bio_penghuni where ktp = '$ktp'")->result();
            //print_r($data);
        }


    public function insertPelanggan() {
        $ktp = $this->input->post('ktp');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $nokamar = $this->input->post('nokamar');
        $autodebet = $this->input->post('autodebet');
        $meter = $this->input->post('meter');
        $deposit = $this->input->post('deposit');
        $tglmasuk = $this->input->post('tglmasuk');
        $tglkeluar = $this->input->post('tglkeluar');
        $aktif = $this->input->post('aktif');

        //validation
        $this->form_validation->set_rules('ktp', 'Ktp', 'required|numeric');
        $this->form_validation->set_rules('nokamar', 'No kamar', 'required|numeric');
        $this->form_validation->set_rules('autodebet', 'Autodebet', 'required');
        // $this->form_validation->set_rules('meter', 'Meter', 'required|exact_length[11]');
        $this->form_validation->set_rules('deposit', 'Deposit', 'required|numeric');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|min_length[11]|max_length[13]');

        $insert_penghuni = array(
            'ktp'=> $ktp,
            'nama' => $nama,
            'email' => $email,
            'no_telp' => $telepon,
            'jabatan' => 'default',
            'aktif' => $aktif
        );
        
        //$insert_bio = $this->db->insert_id();
        

        $insert_pelanggan = array(
            'id_kamar' => $nokamar,
            'ktp' => $ktp,
            'nilai_autodebet' => $autodebet,
            // 'mid' => $meter,
            'nilai_deposit' => $deposit,
            // 'tgl_masuk' => date('Y-m-d', strtotime(str_replace('-','/', $tglmasuk))),
            // 'tgl_keluar' => date('Y-m-d', strtotime(str_replace('-','/', $tglkeluar))),
            'tgl_masuk' => $tglmasuk,
            'status_subsidi' => '',
            'aktif' => $aktif
        );


        if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = "Warning Pelanggan";
                $data['title'] = "Data Pelanggan";
		        $data['kamar'] = $this->db->query('SELECT id_kamar,no_kamar FROM master_kamar WHERE NOT EXISTS (SELECT * FROM pelanggan WHERE master_kamar.id_kamar = pelanggan.id_kamar)')->result();
		        $data['debet'] = $this->Moap->get('select * from master_autodebet');
		        // $data['mid'] = $this->db->query('SELECT mid FROM master_meter WHERE NOT EXISTS (SELECT * FROM pelanggan WHERE master_meter.mid = pelanggan.mid)')->result();
		        // print_r($data['mid']);

		        $data['tanggal'] = date("m.d.y");
                $this->load->view('addPelanggan',$data);
                // redirect('pelanggan/show');
            }
        else
            {
                    //echo "valid";
                //print_r($insert_pelanggan);
                //echo "<br>";
                //print_r($insert_penghuni);
                if($this->session->userdata('insert_penghuni_pelanggan') == 01){
                    //jika belum terdaftar no ktp
                    $check = $this->db->query("select ktp from bio_penghuni where ktp = '$ktp'")->num_rows();
                    if($check == 1){
                        $this->session->set_flashdata('pesan','No KTP sudah terdaftar');
                        redirect('tambah_pelanggan');
                    }else{
                    // print_r($insert_pelanggan);
                    // echo "<br>";
                    // print_r($insert_penghuni);

                    $this->Moap->insert('bio_penghuni', $insert_penghuni);
        			$pelanggan = $this->Moap->insert('pelanggan', $insert_pelanggan);
	    			    if ($pelanggan >= 0) {
			                echo "<script>
			                    alert('Data Berhasil Disimpan');
			                    window.location.href='pelanggan';
			                </script>";
			            } else {
			                echo "<script>
			                    alert('Data gagal disimpan');
			                    window.location.href='pelanggan';
			                </script>";
			            }


                    }
                }elseif($this->session->userdata('insert_penghuni_pelanggan') == 11){
                    //jika sudah terdaftar no ktp
                    //print_r($insert_pelanggan);
                    $pelanggan = $this->Moap->insert('pelanggan', $insert_pelanggan);
                    if ($pelanggan >= 0) {
		                echo "<script>
		                    alert('Data Berhasil Disimpan');
		                    window.location.href='pelanggan';
		                </script>";
		            } else {
		                echo "<script>
		                    alert('Data gagal disimpan');
		                    window.location.href='pelanggan';
		                </script>";
		            }


                }else{
                    echo "tidak ada";
                }
            }

    }

    public function editPelanggan($id) {
        $data['title'] = "Data Pelanggan";
        $this->session->set_userdata('id_pelanggan',$id);
        $data['kamar'] = $this->db->query('SELECT id_kamar,no_kamar FROM master_kamar WHERE NOT EXISTS (SELECT * FROM pelanggan WHERE master_kamar.id_kamar = pelanggan.id_kamar) order by no_kamar ASC')->result();
        $data['debet'] = $this->Moap->get('select * from master_autodebet order by nilai_autodebet ASC');
        
        $kmr = $this->Moap->get("select * from bio_penghuni where ktp = '$id'");
        $pel = $this->Moap->get("select a.id as id_pel,a.aktif as aktif,a.nilai_deposit as nilai_deposit, a.tgl_masuk as tgl_masuk, a.tgl_keluar as tgl_keluar,  b.no_kamar as no_kamar,b.id_kamar as id_kamar, c.id_autodebet as id_autodebet, c.nilai_autodebet as nilai_autodebet from pelanggan a, master_kamar b, master_autodebet c where a.ktp = '$id' and a.id_kamar = b.id_kamar");
        // print_r($kmr);
        foreach ($kmr as $row) {
            $data['ktp'] = $row->ktp;
            $data['nama'] = $row->nama;
            $data['email'] = $row->email;
            $data['no_telp'] = $row->no_telp;
            //$data['nilai_deposit'] = $row->nilai_deposit;
        }

        foreach ($pel as $key) {
            $data['id_pel'] = $key->id_pel;
            $data['id_kamar'] = $key->id_kamar;
            $data['no_kamar'] = $key->no_kamar;
            $data['id_autodebet'] = $key->id_autodebet;
            $data['nilai_autodebet'] = $key->nilai_autodebet;
            //$data['mid_ref'] = $key->mid;
            $data['nilai_deposit'] = $key->nilai_deposit;
            $data['tgl_masuk'] = $key->tgl_masuk;
            $data['tgl_keluar'] = $key->tgl_keluar;
            $data['aktif'] = $key->aktif;
        }

       $this->load->view('editPelanggan', $data);
    }

    public function updatePelanggan() {
        $ktp = $this->input->post('ktp');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $nokamar = $this->input->post('nokamar');
        $autodebet = $this->input->post('autodebet');
        $meter = $this->input->post('meter');
        $deposit = $this->input->post('nilai_deposit');
        $tglmasuk = $this->input->post('tglmasuk');
        $tglkeluar = $this->input->post('tglkeluar');
        $aktif = $this->input->post('aktif');

        //validation
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('nilai_deposit', 'Deposit', 'required|numeric');
        
        
        $update_penghuni = array(
            'nama' => $nama,
            'email' => $email,
            'no_telp' => $telepon,
            'jabatan' => 'default',
            'aktif' => $aktif
        );
        
        //$insert_bio = $this->db->insert_id();
        

        $update_pelanggan = array(
            'id_kamar' => $nokamar,            
            // 'id_autodebet   ' => $autodebet,
            'nilai_deposit' => $deposit,
            // 'tgl_masuk' => date('Y-m-d', strtotime(str_replace('-','/', $tglmasuk))),
            // 'tgl_keluar' => date('Y-m-d', strtotime(str_replace('-','/', $tglkeluar))),
            'tgl_masuk' => $tglmasuk,
            'tgl_keluar' => $tglkeluar,
            'status_subsidi' => '',
            'aktif' => $aktif
        );

        if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = "Warning Pelanggan";
                $id = $this->session->userdata('id_pelanggan');

                $data['kamar'] = $this->db->query('SELECT id_kamar,no_kamar FROM master_kamar WHERE NOT EXISTS (SELECT * FROM pelanggan WHERE master_kamar.id_kamar = pelanggan.id_kamar) order by no_kamar ASC')->result();
                $data['debet'] = $this->Moap->get('select * from master_autodebet order by nilai_autodebet ASC');
                
                $kmr = $this->Moap->get("select * from bio_penghuni where ktp = '$id'");
                $pel = $this->Moap->get("select a.id as id_pel,a.nilai_deposit as nilai_deposit, a.tgl_masuk as tgl_masuk, a.tgl_keluar as tgl_keluar,  b.no_kamar as no_kamar,b.id_kamar as id_kamar, c.id_autodebet as id_autodebet, c.nilai_autodebet as nilai_autodebet from pelanggan a, master_kamar b, master_autodebet c where a.ktp = '$id' and a.id_kamar = b.id_kamar");
                // print_r($kmr);
                foreach ($kmr as $row) {
                    $data['ktp'] = $row->ktp;
                    $data['nama'] = $row->nama;
                    $data['email'] = $row->email;
                    $data['no_telp'] = $row->no_telp;
                    //$data['nilai_deposit'] = $row->nilai_deposit;
                }

                foreach ($pel as $key) {
                    $data['id_pel'] = $key->id_pel;
                    $data['id_kamar'] = $key->id_kamar;
                    $data['no_kamar'] = $key->no_kamar;
                    $data['id_autodebet'] = $key->id_autodebet;
                    $data['nilai_autodebet'] = $key->nilai_autodebet;
                    //$data['mid_ref'] = $key->mid;
                    $data['nilai_deposit'] = $key->nilai_deposit;
                    $data['tgl_masuk'] = $key->tgl_masuk;
                    $data['tgl_keluar'] = $key->tgl_keluar;
                }

               $this->load->view('editPelanggan', $data);
            }
        else{

        $this->Moap->update('bio_penghuni', $update_penghuni, 'ktp', $this->input->post('ktp'));

        
        $pelanggan = $this->Moap->update('pelanggan', $update_pelanggan, 'id', $this->input->post('id_pel'));


            if ($pelanggan >= 0) {
                echo "<script>
                    alert('Data Berhasil Diubah');
                    window.location.href='pelanggan';
                </script>";
            } else {
                echo "<script>
                    alert('Data gagal Diubah');
                    window.location.href='pelanggan';
                </script>";
            }

        }



       
    }

    public function deletePelanggan() {
        if($this->input->post('hapus')){

            $pilih = $this->input->post('pilih');
            for ($a = 0; $a < count($pilih); $a++){
            $res = $this->Moap->update('pelanggan',array('aktif' => 0), 'id', $pilih[$a]);
            }
            if ($res == 0) {
                redirect('pelanggan');
            } else {
                redirect('pelanggan');
            }

        }else{

              
            $pilih1 = $this->input->post('pilih');
            for ($a = 0; $a < count($pilih1); $a++){
                $update = array(
            'tgl_keluar' => date('Y-m-d'),
            'aktif' => 0   );
                $this->db->where('id', $pilih1[$a]);
                $update = $this->db->update('pelanggan', $update); 
            }

            if($update){
                //echo "succes";
                redirect('pelanggan');
            }else{
                redirect('pelanggan');
            }

        }


       


    }

   

    public function check_out($id){
        //$pelanggan = $this->db->query("select * from pelanggan where ktp = '$ktp'")->result();
        $update = array(
            'tgl_keluar' => date('Y-m-d'),
            'aktif' => 0
        );
        $this->db->where('id', $id);
		$update = $this->db->update('pelanggan', $update); 
        //$this->db->update('pelanggan',$update,'ktp',$ktp);

        	
			if($update){
				//echo "succes";
				redirect('pelanggan');
			}else{
				echo "gagal";
			}



    }



    }


    