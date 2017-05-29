<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Meter extends MX_Controller {

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
        $data['title'] = "Data KWH Meter";
      	$data['data'] = $this->Moap->get('select mid, idpel, ip, phase,  IF(aktif = 0, "Tidak Aktif", "aktif") as aktif, IF(hapus = 0, "Tidak Aktif", "aktif") as hapus From master_meter');
        $this->load->view('vMeter', $data);
      	}

        public function addMeter() {
        $data['title'] = "Data KWH Meter";
        //$data['data'] = $this->Moap->get('Select * from pelanggan p ,master_meter m where p.mid = m.mid');
        $this->load->view('addMeter', $data);
    }

    public function insertMeter() {
        $nometer = $this->input->post('nometer');
        $idpel = $this->input->post('idpel');
        $ip = $this->input->post('ip');
        $phase = $this->input->post('phase');
        $aktif = $this->input->post('aktif');
        $macaddress = $this->input->post('macaddress');
        $ssid = $this->input->post('ssid');

        $this->form_validation->set_rules('nometer', 'No Meter', 'required|numeric|exact_length[11]|is_unique[master_meter.mid]');
        $this->form_validation->set_rules('idpel', 'Id Pelanggan', 'required|numeric|exact_length[12]');
        $this->form_validation->set_rules('ip', 'Ip Address', 'required|valid_ip');
        $this->form_validation->set_rules('macaddress', 'Mac Address', 'required');
        $this->form_validation->set_rules('ssid', 'SSID', 'required|alpha_numeric');

        $data_insert = array(
            'mid' => $nometer,
            'idpel' => $idpel,
            'ip' => $ip,
            'mac_address' => $macaddress,
            'phase' => $phase,
            'aktif' => $aktif
        );


        if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = "Warning Meter";
                $this->load->view('addMeter',$data);
                // redirect('pelanggan/show');
            }
        else
            {
                $res = $this->Moap->insert('master_meter', $data_insert);
                if ($res == 0) {
                   echo "<script>
                            alert('Data Berhasil Disimpan');
                            window.location.href='meter';
                        </script>";
                } else {
                    echo "<script>
                            alert('Data gagal disimpan');
                            window.location.href='meter';
                        </script>";
                }
            }

       
    }

    public function deleteMater($mid) {
        //$res = $this->Moap->delete('master_meter', 'mid', $mid);
        $res = $this->Moap->update('master_meter',array('hapus' => 0),'mid',$mid);
        redirect('meter');

        // if ($res >= 0) {
        //     redirect('meter');
        // } else {
        //     echo "<script>
        //             alert('Data gagal dihapus');
        //             window.location.href='meter';
        //         </script>";
        // }
    }

    public function editMeter($id) {
        $data['title'] = "Data KWH Meter";
        $this->session->set_userdata('id_meter',$id);
        $mtr = $this->Moap->get("select * from master_meter where mid = '$id'");
        foreach ($mtr as $row) {
            $data['nometer'] = $row->mid;
            $data['idpel'] = $row->idpel;
            $data['ip'] = $row->ip;
            $data['mac_address'] = $row->mac_address;
            $data['ssid'] = $row->ssid;
            $data['phase'] = $row->phase;
            $data['aktif'] = $row->aktif;
        }
        $this->load->view('editMeter', $data);
    }

    public function updateMeter() {
        $this->form_validation->set_rules('nometer', 'No Meter', 'required|numeric|exact_length[11]');
        $this->form_validation->set_rules('idpel', 'Id Pelanggan', 'required|numeric|exact_length[12]');
        $this->form_validation->set_rules('ip', 'Ip Address', 'required|valid_ip');
        $this->form_validation->set_rules('macaddress', 'Mac Address', 'required');
        $this->form_validation->set_rules('ssid', 'SSID', 'required|alpha_numeric');
        $update = array(
            'mid' => $this->input->post('nometer'),
            'idpel' => $this->input->post('idpel'),
            'ip' => $this->input->post('ip'),
            'mac_address' => $this->input->post('macaddress'),
            'phase' => $this->input->post('phase'),
            'ssid' => $this->input->post('ssid'),
            'aktif' => $this->input->post('aktif')
        );

        if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = "Warning Meter";
                $id = $this->session->userdata('id_meter');
                $mtr = $this->Moap->get("select * from master_meter where mid = '$id'");
                foreach ($mtr as $row) {
                    $data['nometer'] = $row->mid;
                    $data['idpel'] = $row->idpel;
                    $data['ip'] = $row->ip;
                    $data['mac_address'] = $row->mac_address;
                    $data['ssid'] = $row->ssid;
                    $data['phase'] = $row->phase;
                    $data['aktif'] = $row->aktif;
                }
                $this->load->view('editMeter',$data);
                // redirect('pelanggan/show');
            }
        else
            {
                //print_r($update);

                $res = $this->Moap->update('master_meter', $update, 'mid', $this->input->post('nometer'));
                if ($res == 0) {
                    echo "<script>
                            alert('Data Berhasil Diubah');
                            window.location.href='meter';
                        </script>";
                } else {
                    echo "<script>
                            alert('Data gagal Diubah');
                            window.location.href='meter';
                        </script>";
                }
            }

        
    }

}