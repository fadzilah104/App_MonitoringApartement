<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends MX_Controller {

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
    $data['title'] = "Data Kamar";
  	$data['data'] = $this->Moap->get('select mid,id_kamar, no_kamar, lantai, tipe_kamar, IF(aktif = 0, "Tidak Aktif", "aktif") as aktif from master_kamar order by id_kamar ASC');
    $this->load->view('vKelolaKamar', $data);
  	}

    public function addKamar() {
    $data['title'] = "Data Kamar";
    $data['tipe_kamar'] = $this->db->query("select DISTINCT tipe_kamar from master_kamar")->result();
    $this->load->view('addKamar', $data);
    }

    public function insertkamar() {
        //$data['data'] = $this->Moap->get('select * from master_kamar');
        $nokamar = $this->input->post('nokamar');
        $lantai = $this->input->post('lantai');
        $tipekamar = $this->input->post('tipekamar');
        $mid = $this->input->post('mid');
        $status = $this->input->post('status');

         //$this->form_validation->set_rules('mid', 'Meter', 'required|numeric|is_unique[master_kamar.mid]|min_length[3]|max_length[4]');
        $this->form_validation->set_rules('lantai','Lantai', 'required|numeric|max_length[2]');
        $this->form_validation->set_rules('nokamar','No Kamar', 'required|numeric|max_length[4]|min_length[3]');
        $this->form_validation->set_rules('mid','Meter', 'required|numeric|exact_length[11]');


        $data_insert = array(
            'no_kamar' => $nokamar,
            'lantai' => $lantai,
            'tipe_kamar' => $tipekamar,
            'mid' =>$mid,
            'aktif' => 0
        );


        if ($this->form_validation->run() == FALSE)
            {
                    $data['title'] = "Perhatian Kamar";
                    $this->load->view('addKamar',$data);
            }
        else
            {

                // $cek = $this->db->query("select no_kamar,lantai,mid from master_kamar where lantai = $lantai and no_kamar = $no_kamar and mid = $mid")->num_rows();

                $cek = substr($nokamar,0,1);
                $cek1 = substr($nokamar,0,2);

                if ($cek1 != $lantai){
                       if($cek != $lantai){
                            echo "<script>
                            alert('format salah');
                            window.location.href='tambah_kamar';
                            </script>";                      
                       }
                       
                }
                

                    $res = $this->Moap->insert('master_kamar', $data_insert);
                    if ($res >= 0) {
                        echo "<script>
                                alert('Data Berhasil Disimpan');
                                window.location.href='kamar';
                            </script>";
                    } else {
                        echo "<script>
                                alert('Data Gagal Disimpan');
                                window.location.href='kamar';
                            </script>";
                    }//end else res

            }//end form validation



        
    }//function

    public function editKamar($id) {
        $data['title'] = "Data Kamar";

        $this->session->set_userdata('t_idkamar',$id);

        $kmr = $this->Moap->get("select * from master_kamar where id_kamar = '$id'");
        foreach ($kmr as $row) {
            $data['id_kamar'] = $row->id_kamar;
            $data['nokamar'] = $row->no_kamar;
            $data['lantai'] = $row->lantai;
            $data['mid'] = $row->mid;
            $data['tipekamar'] = $row->tipe_kamar;
            $data['aktif'] = $row->aktif;
        }
        $this->load->view('editKamar', $data);
    }

    public function updateKamar() {
        $nokamar = $this->input->post('nokamar');
        $lantai = $this->input->post('lantai');
        $update = array(
            'no_kamar' => $this->input->post('nokamar'),
            'lantai' => $this->input->post('lantai'),
            'tipe_kamar' => $this->input->post('tipekamar'),
            'aktif' => $this->input->post('aktif')
        );

        // is_unique[master_kamar.no_kamar]|
        // $this->form_validation->set_rules('mid', 'Meter ID', 'is_unique[master_kamar.mid]|numeric|min_length[3]|max_length[4]');
        $this->form_validation->set_rules('lantai','Lantai', 'required|numeric');

        //checking validation
        if ($this->form_validation->run() == FALSE)
            {
                    $data['title'] = "Perhatian Kamar";
                    $id = $this->session->userdata('t_idkamar');
                    $kmr = $this->Moap->get("select * from master_kamar where id_kamar = '$id'");
                    foreach ($kmr as $row) {
                        $data['id_kamar'] = $row->id_kamar;
                        $data['nokamar'] = $row->no_kamar;
                        $data['lantai'] = $row->lantai;
                        $data['mid'] = $row->mid;
                        $data['tipekamar'] = $row->tipe_kamar;
                        $data['aktif'] = $row->aktif;
                    }
                    $this->load->view('editKamar',$data);
            }else{
                    //echo "valid";
                $cek = substr($nokamar,0,1);
                $cek1 = substr($nokamar,0,2);

                if ($cek1 != $lantai){
                       if($cek != $lantai){
                            echo "<script>
                            alert('format salah');
                            window.location.href='edit_kamar/".$this->session->userdata('t_idkamar')."'
                            </script>";                      
                       }
                       
                }$res = $this->Moap->update('master_kamar', $update,'id_kamar', $this->session->userdata('t_idkamar'));
                    if ($res >= 0) {
                        echo "<script>
                                alert('Data Berhasil Disimpan');
                                window.location.href='kamar';
                            </script>";
                    } else {
                        echo "<script>
                                alert('Data Gagal Disimpan');
                                window.location.href='kamar';
                            </script>";
                    }//end else res   
                    
            }//end else validation

    }

    public function deleteKamar($id_kamar) {
        $update = array('aktif' => 0);
        $res = $this->Moap->update('master_kamar',$update, 'id_kamar', $id_kamar);
        if ($res == 0) {
                redirect('kamar');
        } else {
            echo "Data gagal dihapus";
        }
    }

    public function test(){
        $data = $this->db->query("SELECT COLUMN_TYPE as kolom
        FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA='ibms_sistem' 
            AND TABLE_NAME='master_kamar'
            AND COLUMN_NAME='tipe_kamar'")->result_array();
        print_r($data);

        print_r(explode('',$data));
        



        //$test = json_encode($data);

     // $enum_list = explode(",", str_replace("'", "", substr($data['kolom'], 5, (strlen($data['kolom'])-6))));

     // print_r($enum_list);


        //echo $data[0]['kolom'];



        //echo $data[0]['SUBSTRING(COLUMN_TYPE,5)'];

        
        //$data = $this->Moap->getColumn("master_kamar","tipe_kamar");
        //print_r($data);
    }


    public function testtoken(){
        $mid = ''.$mid.'';
        $jumlah = 200;
        echo "helo";
        echo modules::run('Api/token',$mid,$jumlah);

        // $meter_id = '36002941619';
        //     $val = 200;
        //     echo modules::run('Api/token',$meter_id,$val);
    }

}