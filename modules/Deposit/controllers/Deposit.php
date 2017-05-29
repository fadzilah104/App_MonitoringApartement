<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->database();
        $this->load->helper('url');
        if($this->session->userdata("hak_akses") == "") {
            $this->session->set_flashdata('login','Username atau Password Salah');
            redirect("login");
        }

      	}

      	// public function index(){
       //    $data['title'] = "Data Deposit";
       //    $data['data'] = $this->Moap->get('select id_deposit, tipe_kamar, jml_deposit, tgl_create, IF(aktif = 0, "Tidak Aktif", "aktif") as aktif from master_deposit');
      	// 	$this->load->view('vdeposit', $data);
      	// }

        public function addDeposit() {
            $data['title'] = "Data Deposit";
           $this->load->view('addDeposit', $data);
        }

        public function insertDeposit(){
         $tipekamar = $this->input->post('tipekamar');
        $jml_deposit = $this->input->post('jml_deposit');
        $tgl_create = $this->input->post('tgl_create');
        $aktif = $this->input->post('aktif');
        $data_insert = array(
            'tipe_kamar' => $tipekamar,
            'jml_deposit' => $jml_deposit,
            'tgl_create' => $tgl_create,
            'aktif' => $aktif
        );

        $res = $this->Moap->insert('master_deposit', $data_insert);
        if ($res >= 0) {
           echo "<script>
                    alert('Data Berhasil Disimpan');
                    window.location.href='Deposit';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal disimpan');
                    window.location.href='Deposit';
                </script>";
        }

        }

        public function editDeposit($id){
        $data['title'] = "Data Deposit";
        $sub = $this->Moap->get("select * from master_deposit where id_deposit = '$id'");
        foreach ($sub as $row) {
            $data['id_deposit'] = $row->id_deposit;
            $data['tipe_kamar'] = $row->tipe_kamar;
            $data['jml_deposit'] = $row->jml_deposit;
            $data['tgl_create'] = $row->tgl_create;
            $data['aktif'] = $row->aktif;
        }
        $this->load->view('editDeposit', $data);

        }

        public function updateDeposit(){
            $update = array(
            'tipe_kamar' => $this->input->post('tipekamar'),
            'jml_deposit' => $this->input->post('jml_deposit'),
            'tgl_create' => $this->input->post('tgl_create'),
            'aktif' => $this->input->post('aktif')
        );

        $res = $this->Moap->update('master_deposit', $update, 'id_deposit', $this->input->post('id_deposit'));
        if ($res == 0) {
            echo "<script>
                    alert('Data Berhasil Diubah');
                    window.location.href='Deposit';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal Diubah');
                    window.location.href='Deposit';
                </script>";
        }

        }

        public function deleteDeposit($id){
            $res = $this->Moap->delete('master_deposit', 'id_deposit', $id);
        if ($res >= 0) {
            redirect('Deposit');
        } else {
            echo "<script>
                    alert('Data gagal dihapus');
                    window.location.href='Deposit';
                </script>";
        }


        }

}