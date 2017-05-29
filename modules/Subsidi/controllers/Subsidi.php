<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subsidi extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('form_validation');
         if($this->session->userdata("hak_akses") == "") {
            $this->session->set_flashdata('login','Username atau Password Salah');
            redirect("login");
        }elseif($this->session->userdata('hak_akses') !="admin" && $this->session->userdata('hak_akses') !="superadmin"){
            $this->session->set_flashdata('login','Username atau Password Salah');
            redirect("login");
        }

      	}

      	public function index(){
          $data['title'] = "Data Subsidi";
          $data['data'] = $this->Moap->get('Select id_subsidi, tipe_kamar, jml_subsidi, tgl_create, IF(aktif = 0, "Tidak Aktif", "aktif") as aktif From master_subsidi');
      		$this->load->view('vsubsidi', $data);
      	}

        public function addSubsidi() {
            $data['title'] = "Data Subsidi";
            $this->load->view('addSubsidi', $data);
        }

        public function insertSubsidi() {
        $tipekamar = $this->input->post('tipekamar');
        $jml_subsidi = $this->input->post('jml_subsidi');
        $tgl_create = $this->input->post('tgl_create');
        $aktif = $this->input->post('aktif');

        $this->form_validation->set_rules('jml_subsidi', 'Jumlah Subsidi', 'required|numeric');

        $data_insert = array(
            'tipe_kamar' => $tipekamar,
            'jml_subsidi' => $jml_subsidi,
            'tgl_create' => $tgl_create,
            'aktif' => $aktif
        );

         if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = "Warning Subsidi";
                $this->load->view('addSubsidi',$data);
                // redirect('pelanggan/show');
            }
        else
            {
                    echo "valid";
            }


        // $res = $this->Moap->insert('master_subsidi', $data_insert);
        // if ($res >= 0) {
        //    echo "<script>
        //             alert('Data Berhasil Disimpan');
        //             window.location.href='Subsidi';
        //         </script>";
        // } else {
        //     echo "<script>
        //             alert('Data gagal disimpan');
        //             window.location.href='Subsidi';
        //         </script>";
        // }
      }

      public function deleteSubsidi($id) {
        $res = $this->Moap->delete('master_subsidi', 'id_subsidi', $id);
        if ($res >= 0) {
            redirect('Subsidi');
        } else {
            echo "<script>
                    alert('Data gagal dihapus');
                    window.location.href='Subsidi';
                </script>";
        }
    }

    public function editSubsidi($id) {
        $data['title'] = "Data Subsidi";
        $this->session->set_userdata('id_subsidi',$id);
        $sub = $this->Moap->get("select * from master_subsidi where id_subsidi = '$id'");
        foreach ($sub as $row) {
            $data['id_subsidi'] = $row->id_subsidi;
            $data['tipe_kamar'] = $row->tipe_kamar;
            $data['jml_subsidi'] = $row->jml_subsidi;
            $data['tgl_create'] = $row->tgl_create;
            $data['aktif'] = $row->aktif;
        }
        $this->load->view('editSubsidi', $data);
    }

    public function updateSubsidi() {
        $update = array(
            'tipe_kamar' => $this->input->post('tipekamar'),
            'jml_subsidi' => $this->input->post('jml_subsidi'),
            'tgl_create' => $this->input->post('tgl_create'),
            'aktif' => $this->input->post('aktif')
        );

        $this->form_validation->set_rules('jml_subsidi', 'Jumlah Subsidi', 'required|numeric');

         if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = "Warning Subsidi";
                $id = $this->session->userdata('id_subsidi');
                $sub = $this->Moap->get("select * from master_subsidi where id_subsidi = '$id'");
                foreach ($sub as $row) {
                    $data['id_subsidi'] = $row->id_subsidi;
                    $data['tipe_kamar'] = $row->tipe_kamar;
                    $data['jml_subsidi'] = $row->jml_subsidi;
                    $data['tgl_create'] = $row->tgl_create;
                    $data['aktif'] = $row->aktif;
                }
                $this->load->view('editSubsidi',$data);
                // redirect('pelanggan/show');
            }
        else
            {
                    echo "valid";
            }


        // $res = $this->Moap->update('master_subsidi', $update, 'id_subsidi', $this->input->post('id_subsidi'));
        // if ($res == 0) {
        //     echo "<script>
        //             alert('Data Berhasil Diubah');
        //             window.location.href='Subsidi';
        //         </script>";
        // } else {
        //     echo "<script>
        //             alert('Data gagal Diubah');
        //             window.location.href='Subsidi';
        //         </script>";
        // }
    }

}