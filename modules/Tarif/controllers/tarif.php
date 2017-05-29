<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class tarif extends MX_Controller {

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
        // if($this->session->userdata('hak_akses') == "" and $this->session->userdata('hak_akses') != "admin"){
        //     redirect("login");
        // }

      	}

      	public function index(){
            $data['title'] = "Data Tarif";
      		// $data['data'] = $this->Moap->get('Select p.ktp,
        //         p.nama,
        //         p.email,
        //         p.no_telp,
        //         p.jabatan,
        //         IF(p.aktif = 0, "Tidak Aktif", "aktif") as aktif
        //       FROM bio_penghuni p order by p.ktp DESC');
        // $this->load->view('vpelanggan', $data);
            //$data['data'] = $this->Moap->get("SELECT id, (tarif * 0.1) As tarif,tanggal_insert,status from master_tarif");
            $data['data'] = $this->Moap->get('select * from master_tarif');
            $this->load->view('vtarif', $data);
      	}

        public function addTarif() {
        $data['title'] = "Data Tarif";
        $this->load->view('addTarif', $data);
        }

    public function insertTarif() {
        $tarif = $this->input->post('tarif');
        $tglmasuk = $this->input->post('tglmasuk');
        $aktif = $this->input->post('aktif');

        $insert_tarif = array(
            'tarif'=> $tarif,
            'tanggal_insert' => $tglmasuk,
            'status' => $aktif
        );

        $tarif = $this->Moap->insert('master_tarif', $insert_tarif);

        if ($tarif >= 0) {
                echo "<script>
                    alert('Data Berhasil Disimpan');
                    window.location.href='tarif';
                </script>";
            } else {
                echo "<script>
                    alert('Data gagal disimpan');
                    window.location.href='tarif';
                </script>";
            }
        }

    public function editTarif($id) {
        $data['title'] = "Data Tarif";

        $kmr = $this->Moap->get("select * from master_tarif where id = '$id'");


        foreach ($kmr as $row) {
            $data['id'] = $row->id;
            $data['tarif'] = $row->tarif;
            $data['tglmasuk'] = $row->tanggal_insert;
            $data['aktif'] = $row->status;
            //$data['nilai_deposit'] = $row->nilai_deposit;
        }

       $this->load->view('editTarif', $data);
    }

    public function updateTarif() {
        $id = $this->input->post('id');
        $tarif = $this->input->post('tarif');
        $tglmasuk = $this->input->post('tglmasuk');
        $aktif = $this->input->post('aktif');
        
        $update_penghuni = array(
            'tarif' => $tarif,
            'tanggal_insert' => $tglmasuk,
            'status' => $aktif
        );
        
        $pelanggan = $this->Moap->update('master_tarif', $update_penghuni, 'id', $this->input->post('id'));


            if ($pelanggan >= 0) {
                echo "<script>
                    alert('Data Berhasil Diubah');
                    window.location.href='tarif';
                </script>";
            } else {
                echo "<script>
                    alert('Data gagal Diubah');
                    window.location.href='tarif';
                </script>";
            }

        }

    public function deleteTarif($id) {
        $res = $this->Moap->delete('master_tarif', 'id', $id);
        if ($res >= 0) {
            redirect('tarif/index');
        } else {
            echo 'Data gagal dihapus';
        }
    }

    public function show(){
        $this->load->view('vtest');
    }

    public function test(){
        // $data = $this->db->query("SELECT mid FROM master_meter WHERE NOT EXISTS (SELECT * FROM pelanggan WHERE master_meter.mid = pelanggan.mid)")->result();

        $data = $this->db->query("select tipe_kamar from master_kamar")->result();
        print_r($data);
        // print_r($data);

        // $this->form_validation->set_rules('nama', 'nama', 'required');


        // if ($this->form_validation->run() == FALSE)
        //     {
        //         $this->load->view('vtest');
        //         // redirect('pelanggan/show');
        //     }
        // else
        //     {
        //             echo "valid";
        //     }
    } 



    public function check_out($ktp){
        $pelanggan = $this->db->query("select * from pelanggan where ktp = '$ktp'")->result();
        $update = array(
            'tgl_keluar' => date('Y-m-d'),
            'aktif' => 0
        );
        $this->db->update('pelanggan',$update,'ktp',$ktp);


    }


    }


    