<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends MX_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->murl = '/modules/' . $this->uri->segment(1) . '/';
        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
        //$this->load->library('session');       
        echo modules::run('Authorization/cek');
    }

    public function index() {
        $data['data'] = $this->Moap->get("select * from bio_penghuni");
        $this->load->view('vpelanggan', $data);
    }

    public function main() {
        $this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function _example_output($output = null) {
        $this->load->view('example.php', $output);
    }

    public function test1() {
        // echo "HANDOKO";
        $data['data'] = $this->Moap->get("select * from mahasiswa");
        $this->load->view('vtest1', $data);
    }

    public function addData() {
        $this->load->view('form_add');
    }

//        
//        public function doInsert() {
//            $nim = $this->input->post('nim');
//            $nama = $this->input->post('nama');
//            $alamat = $this->input->post('alamat');
//            $data_insert = array(
//              'nim' => $nim,
//              'nama' => $nama,
//               'alamat' => $alamat
//            );
//            
//            $res = $this->Moap->insert('mahasiswa', $data_insert);
//            echo "res =".$res;
//            if ($res == 0) {
//                redirect('crud/index');
//            } else {
//                echo 'data gagal disimpan';
//            }
//        }
//        
//        public function editData($nim) {
//            $mhs = $this->Moap->get("select * from mahasiswa where nim = '$nim'");
//            foreach ($mhs as $row) {
//                $data['nim'] = $row->nim;
//                $data['nama'] = $row->nama;
//                $data['alamat'] = $row->alamat;
//            }
//            $this->load->view('form_edit', $data);
//        }
//        
//        
//        public function doUpdate() {
//            $update = array(
//                'nama' => $this->input->post('nama'),
//               'alamat' => $this->input->post('alamat')
//            );
//            $this->Moap->update('mahasiswa',$update,'nim',  $this->input->post('nim'));
//            if ($res == 0) {
//                redirect('crud/index');
//            } else {
//                echo 'data gagal diubah';
//            }
//        }
//
//        public function doDelete($nim) {
//            $res = $this->Moap->delete('mahasiswa', 'nim',$nim);
//            if($res == 0) {
//                redirect('crud/index');
//            } else {
//                echo 'Data gagal dihapus';
//            }
//        }

    public function csv() {
        $query = $this->Moap->csv('Select * From mahasiswa');
    }

    public function create_pdf2() {
        $this->load->helper('pdf_helper');
        /*
          ---- ---- ---- ----
          your code here
          ---- ---- ---- ----
         */
        $data['data_mahasiswa'] = $this->Moap->get("select * from mahasiswa");
        $data['murl'] = $this->murl;
        $this->load->view('vpdf_table', $data);
        // $this->pdf();
    }

    public function pdf() {
        $as['sal'] = $this->Moap->get("select * from mahasiswa");
        $this->load->view('coba', $as);
    }

    public function offices_management() {
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('mahasiswa');
            $crud->set_subject('mahasiswa');
            $crud->required_fields('nim');
            $crud->columns('nim', 'nama', 'alamat', 'jurusan', 'tgl_lahir');

            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function customers_management() {
        $crud = new grocery_CRUD();

        $crud->set_table('mahasiswa');
        $crud->columns('nim', 'nama', 'alamat', 'jurusan');
//			$crud->display_as('salesRepEmployeeNumber','from Employeer')
//				 ->display_as('customerName','Name')
//				 ->display_as('contactLastName','Last Name');
        $crud->set_subject('mahasiswa');
        //$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function chart() {
        $data['pie_data'] = $this->Moap->get("select * from penjualan");
        $this->load->view('chart', $data);
    }

    public function excel1() {
        //membuat objek PHPExcel
        $objPHPExcel = new PHPExcel();

        //set Sheet yang akan diolah 
        $objPHPExcel->setActiveSheetIndex(0)
                //mengisikan value pada tiap-tiap cell, A1 itu alamat cellnya 
                //Hello merupakan isinya
                ->setCellValue('A1', 'Hello')
                ->setCellValue('B1', 'Ini')
                ->setCellValue('C1', 'Excel')
                ->setCellValue('D1', 'Pertamaku');

        //set title pada sheet (me rename nama sheet)
        $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');

        //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//            
        //sesuaikan headernya 
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //ubah nama file saat diunduh
        header('Content-Disposition: attachment;filename="hasilExcel.xlsx"');
        //unduh file
        //   $objWriter->save();
// 
//            //Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
//            // Folder Documentation dan Example
//            // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu
    }

    public function coba1() {
        $data['data'] = $this->Moap->get('Select * From mahasiswa');
        $this->load->view('excel_ex', $data);
    }

    public function sidebar() {
        $this->load->view('sidebar');
    }

    public function pelanggan() {
        $data['data'] = $this->Moap->get('Select p.id_penghuni,
                p.nama,
                p.email,
                p.no_telp,
                k.no_kamar as no_kamar,
                p.status,
                p.kelola
              FROM bio_penghuni p, master_kamar k
              WHERE 
                p.id_kamar = k.id_kamar');
        $this->load->view('vpelanggan', $data);
    }

    public function addPelanggan() {

        $data['kamar'] = $this->Moap->get('select * from master_kamar');
        $this->load->view('addPelanggan', $data);
    }

    public function insertPelanggan() {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $nokamar = $this->input->post('nokamar');
        $subsidi = $this->input->post('subsidi');
        $deposit = $this->input->post('deposit');
        $tglmasuk = $this->input->post('tglmasuk');
        $tglkeluar = $this->input->post('tglkeluar');
        $insert_penghuni = array(
            'nama' => $nama,
            'email' => $email,
            'no_telp' => $telepon,
            'id_kamar' => $nokamar
        );

        $insert_pelanggan = array(
            'nilai_deposit' => $deposit,
            'tgl_masuk' => $tglmasuk,
            'tgl_keluar' => $tglkeluar
        );

        $penghuni = $this->Moap->insert('bio_penghuni', $insert_penghuni);
        $pelanggan = $this->Moap->insert('pelanggan', $insert_pelanggan);

     
//            echo "res =".$res;
            if ($penghuni && $pelanggan >= 0) {
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

    public function editPelanggan($id) {
        $data['kamar'] = $this->Moap->get('select * from master_kamar');
        $kmr = $this->Moap->get("select * from bio_penghuni where id_penghuni = '$id'");
        // print_r($kmr);
        foreach ($kmr as $row) {
            $data['id_penghuni'] = $row->id_penghuni;
            $data['nama'] = $row->nama;
            $data['email'] = $row->email;
            $data['no_telp'] = $row->no_telp;
            $data['id_kamar'] = $row->id_kamar;
            $data['status'] = $row->status;
            $data['kelola'] = $row->kelola;
        }
        $this->load->view('editPelanggan', $data);
    }

    public function updatePelanggan() {
        $update = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'id_kamar' => $this->input->post('nokamar'),
            'status' => $this->input->post('status'),
            'kelola' => $this->input->post('kelola')
        );
        //print_r($update);
//            $where = array('');
//            $this->db->update();

        $res = $this->Moap->update('bio_penghuni', $update, 'id_penghuni', $this->input->post('id_penghuni'));
        if ($res >= 0) {
            echo "<script>
                    alert('Data Berhasil Diubah');
                    window.location.href='pelanggan';
                </script>";
        } else {
            echo "<script>
                    alert('Data Berhasil Diubah');
                    window.location.href='pelanggan';
                </script>";
        }
    }
    
    public function deletePelanggan($id_penghuni) {
        $res = $this->Moap->delete('bio_penghuni', 'id_penghuni', $id_penghuni);
        if ($res == 0) {
            redirect('crud/pelanggan');
        } else {
            echo "Data gagal dihapus";
        }
    }

    public function kamar() {
        $data['data'] = $this->Moap->get('select * from master_kamar');
        $this->load->view('vKelolaKamar', $data);
    }

    public function addKamar() {
        $this->load->view('addKamar');
    }

    public function insertkamar() {
        $data['data'] = $this->Moap->get('select * from master_kamar');
        $nokamar = $this->input->post('nokamar');
        $lantai = $this->input->post('lantai');
        $tipekamar = $this->input->post('tipekamar');
        $status = $this->input->post('status');
        $data_insert = array(
            'no_kamar' => $nokamar,
            'lantai' => $lantai,
            'tipe_kamar' => $tipekamar,
            'status' => $status
        );

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
        }
    }

    public function editKamar($id) {
        $kmr = $this->Moap->get("select * from master_kamar where id_kamar = '$id'");
        foreach ($kmr as $row) {
            $data['id_kamar'] = $row->id_kamar;
            $data['nokamar'] = $row->no_kamar;
            $data['lantai'] = $row->lantai;
            $data['tipekamar'] = $row->tipe_kamar;
            $data['status'] = $row->status;
        }
        $this->load->view('editKamar', $data);
    }

    public function updateKamar() {
        $update = array(
            'no_kamar' => $this->input->post('nokamar'),
            'lantai' => $this->input->post('lantai'),
            'tipe_kamar' => $this->input->post('tipekamar'),
            'status' => $this->input->post('status')
        );
        //print_r($update);
//            $where = array('');
//            $this->db->update();

        $res = $this->Moap->update('master_kamar', $update, 'id_kamar', $this->input->post('id_kamar'));
        if ($res >= 0) {
            echo "<script>
                    alert('Data Berhasil Diubah');
                    window.location.href='kamar';
                </script>";
        } else {
            echo "<script>
                    alert('Data Gagal Disimpan');
                    window.location.href='kamar';
                </script>";
        }
    }

    public function deleteKamar($id_kamar) {
        $res = $this->Moap->delete('master_kamar', 'id_kamar', $id_kamar);
        if ($res == 0) {
            redirect('crud/kamar');
        } else {
            echo "Data gagal dihapus";
        }
    }

    public function meter() {
        $data['data'] = $this->Moap->get('select * From master_meter');
        $this->load->view('vMeter', $data);
    }

    public function addMeter() {
        $data['data'] = $this->Moap->get('Select * from pelanggan p ,master_meter m where p.mid = m.mid');
        $this->load->view('addMeter', $data);
    }

    public function insertMeter() {
        $nometer = $this->input->post('nometer');
        $idpel = $this->input->post('idpel');
        $ip = $this->input->post('ip');
        $phase = $this->input->post('phase');
        $status = $this->input->post('status');
        $data_insert = array(
            'mid' => $nometer,
            'idpel' => $idpel,
            'ip' => $ip,
            'phase' => $phase,
            'status' => $status
        );

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

    public function deleteMater($mid) {
        $res = $this->Moap->delete('master_meter', 'mid', $mid);
        if ($res >= 0) {
            redirect('Crud/kamar');
        } else {
            echo "<script>
                    alert('Data gagal dihapus');
                    window.location.href='meter';
                </script>";
        }
    }

    public function editMeter($id) {
        $mtr = $this->Moap->get("select * from master_meter where mid = '$id'");
        foreach ($mtr as $row) {
            $data['nometer'] = $row->mid;
            $data['idpel'] = $row->idpel;
            $data['ip'] = $row->ip;
            $data['phase'] = $row->phase;
            $data['status'] = $row->status;
        }
        $this->load->view('editMeter', $data);
    }

    public function updateMeter() {
        $update = array(
            'mid' => $this->input->post('nometer'),
            'idpel' => $this->input->post('idpel'),
            'ip' => $this->input->post('ip'),
            'phase' => $this->input->post('phase'),
            'status' => $this->input->post('status')
        );

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
