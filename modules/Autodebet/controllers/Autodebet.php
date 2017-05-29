<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autodebet extends MX_Controller {

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
        $data['title'] = 'Data Autodebet';
          $data['data'] = $this->Moap->get('select id_autodebet, nilai_autodebet, tgl_create, IF(aktif = 0, "Tidak Aktif", "aktif") as aktif from master_autodebet');
        $this->load->view('vdebet', $data);
        }

        public function addDebet() {
        $data['title'] = 'Data Autodebet';
        $this->load->view('addDebet', $data);
    }

    public function insertdebet() {
        $nilai_autodebet = $this->input->post('nilai_autodebet');
        $tgl_create = $this->input->post('tgl_create');
        $aktif = $this->input->post('aktif');

        $this->form_validation->set_rules('nilai_autodebet', 'Nilai Autodebet', 'required|numeric');
        $this->form_validation->set_rules('tgl_create', 'Tanggal Create', 'required');

            $insert_penghuni = array(
            'nilai_autodebet' => $nilai_autodebet,
            'tgl_create' => $tgl_create,
            'aktif' => $aktif
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Warning Autodebet";
            $this->load->view('addDebet',$data);
            // redirect('pelanggan/show');
        }
        else
        {
                echo "valid";
        }

//         $debet = $this->Moap->insert('master_autodebet', $insert_penghuni);
        
//         //$insert_bio = $this->db->insert_id();
        
// //            echo "res =".$res;
//             if ($debet >= 0) {
//                 echo "<script>
//                     alert('Data Berhasil Disimpan');
//                     window.location.href='Autodebet';
//                 </script>";
//             } else {
//                 echo "<script>
//                     alert('Data gagal disimpan');
//                     window.location.href='Autodebet';
//                 </script>";
//             }
    }

    public function editDebet($id) {
        $data['title'] = 'Data Autodebet';
        $this->session->set_userdata('id_autodebet',$id);
        $dbt = $this->Moap->get("select * from master_autodebet where id_autodebet = '$id'");
        // print_r($kmr);
        foreach ($dbt as $row) {
            $data['id_autodebet'] = $row->id_autodebet;
            $data['nilai_autodebet'] = $row->nilai_autodebet;
            $data['tgl_create'] = $row->tgl_create;
            $data['aktif'] = $row->aktif;
        }
        $this->load->view('editDebet', $data);
    }

    public function updateDebet() {
        $this->form_validation->set_rules('nilai_autodebet', 'Nilai Autodebet', 'required|numeric');
        //$this->form_validation->set_rules('tgl_create', 'Tanggal Create', 'required');

        $update = array(
            'nilai_autodebet' => $this->input->post('nilai_autodebet'),
            'tgl_create' => $this->input->post('tgl_create'),
            'aktif' => $this->input->post('aktif')
        );


        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Warning Autodebet";
            $id = $this->session->userdata('id_autodebet');
            $dbt = $this->Moap->get("select * from master_autodebet where id_autodebet = '$id'");
            // print_r($kmr);
            foreach ($dbt as $row) {
                $data['id_autodebet'] = $row->id_autodebet;
                $data['nilai_autodebet'] = $row->nilai_autodebet;
                $data['tgl_create'] = $row->tgl_create;
                $data['aktif'] = $row->aktif;
            }
            $this->load->view('addDebet',$data);
            // redirect('pelanggan/show');
        }
        else
        {
                echo "valid";
        }

        // $res = $this->Moap->update('master_autodebet', $update, 'id_autodebet', $this->input->post('id_autodebet'));
        // if ($res >= 0) {
        //     echo "<script>
        //             alert('Data Berhasil Diubah');
        //             window.location.href='Autodebet';
        //         </script>";
        // } else {
        //     echo "<script>
        //             alert('Data Berhasil Diubah');
        //             window.location.href='Autodebet';
        //         </script>";
        // }
    }

    public function deleteDebet($id_autodebet) {
        $res = $this->Moap->delete('master_autodebet', 'id_autodebet', $id_autodebet);
        if ($res == 0) {
            redirect('Autodebet');
        } else {
            echo "Data gagal dihapus";
        }
    }

}