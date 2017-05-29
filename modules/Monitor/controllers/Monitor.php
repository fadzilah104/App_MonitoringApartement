<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('monitor_model', 'monitoring');
    }

    public function index() {
        $this->load->helper('url');
        $data['data'] = $this->Moap->get("select m.mid, m.credit as credit, k.no_kamar, b.nama from monitor_meter m, master_kamar k, pelanggan p, bio_penghuni b WHERE m.mid = k.mid and p.id_kamar = k.id_kamar and p.ktp = b.ktp");
        $this->load->view('customers_view', $data);
    }

    public function ajax_list() {
        $list = $this->monitoring->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $monitoring) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $monitoring->mid;
            $row[] = $monitoring->credit;
            $row[] = $monitoring->stand;
            $row[] = $monitoring->voltage;
            $row[] = $monitoring->current;
            $row[] = $monitoring->last_update;
            $row[] = 'default';
            $row[] = "<a href='monitor/detail/$monitoring->mid'>Detail</a>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->monitoring->count_all(),
            "recordsFiltered" => $this->monitoring->count_filtered(),
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    public function detail($mid) {
        // $bulanlalu = $this->Moap->get("select sum(stand) as stand_awal, last_update from history_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update)");
        // $jun = $bulanlalu[0]->stand_awal;
        // $jul = $bulanlalu[1]->stand_awal;
        // $aug = $bulanlalu[2]->stand_awal;
        // $sep = $bulanlalu[3]->stand_awal;
        // $okt = $bulanlalu[4]->stand_awal;
        // $nov = $bulanlalu[5]->stand_awal;
        // $des = $bulanlalu[6]->stand_awal;

        //query tanggal
        //jumy

        //jully
        // $july = $this->Moap->get("select * from history_meter where mid ='$mid' and last_update like '%07-%' ORDER BY last_update asc limit 1");
        // $juli = $july[0]->stand;

        // //agustus
        // $augus = $this->Moap->get("select * from history_meter where mid ='$mid' and last_update like '%08-%' ORDER BY last_update asc limit 1");
        // $augustus = $augus[0]->stand;

        // //september
        // $sept = $this->Moap->get("select * from history_meter where mid ='$mid' and last_update like '%09-%' ORDER BY last_update asc limit 1");
        // $september = $sept[0]->stand;

        // //oktober
        // $okto = $this->Moap->get("select * from history_meter where mid ='$mid' and last_update like '%10-%' ORDER BY last_update asc limit 1");
        // $oktober = $okto[0]->stand;

        // // //november
        // $nove = $this->Moap->get("select * from history_meter where mid ='$mid' and last_update like '%11-%' ORDER BY last_update asc limit 1");
        // $november = $okto[0]->stand;

        // //desember
        // $dec = $this->Moap->get("select * from history_meter where mid ='$mid' and last_update like '%12-%' ORDER BY last_update asc limit 1");
        // $desember = $dec[0]->stand;

        // //tanggalsekarang
        // $now = $this->Moap->get("select * from history_meter where mid ='$mid' and last_update like '%12-%' ORDER BY last_update desc limit 1");
        // $sekarang = $now[0]->stand;
        // print_r($sekarang);

        // // $dece = $this->Moap->get("select stand, last_update from history_meter where mid ='$mid' and last_update like '%12-31%'");
        // // $desember1 = $dece[0]->stand;
        // //query tambah stand awal + akhir
        // //juli
        // $data['juli'] = $juli;

        // //agustus
        // $data['agustus'] = $augustus;

        // //september
        // $data['september'] = $september;

        // //oktober
        // $data['oktober'] = $oktober;

        // //november
        // $data['november'] = $november;

        // //desember
        // $data['desember'] = $desember;

        // $data['akhir'] = $sekarang;

        // $bulanlalu = $this->Moap->get("select sum(stand) as stand_awal, last_update from history_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update)");
        // $jun = $bulanlalu[0]->stand_awal;
        // $jul = $bulanlalu[1]->stand_awal;
        // $aug = $bulanlalu[2]->stand_awal;
        // $sep = $bulanlalu[3]->stand_awal;
        // $okt = $bulanlalu[4]->stand_awal;
        // $nov = $bulanlalu[5]->stand_awal;
        // $des = $bulanlalu[6]->stand_awal;
        
        //query tanggal 1
        //jully
        $july = $this->Moap->get("select stand, last_update from history_meter where mid ='$mid' and last_update like '%07-%' ORDER BY last_update desc limit 1");
        $juli = $july[0]->stand;
        $data['tgljuli'] = $july[0]->last_update;

        //agustus
        $augus = $this->Moap->get("select stand, last_update from history_meter where mid ='$mid' and last_update like '%08-%' ORDER BY last_update desc limit 1");
        $augustus = $augus[0]->stand;
        $data['tglagustus'] = $augus[0]->last_update;

        //september
        $sept = $this->Moap->get("select stand, last_update from history_meter where mid ='$mid' and last_update like '%09-%' ORDER BY last_update desc limit 1");
        $september = $sept[0]->stand;
        $data['tglseptember'] = $sept[0]->last_update;

        //oktober
        $okto = $this->Moap->get("select stand, last_update from history_meter where mid ='$mid' and last_update like '%10-%' ORDER BY last_update asc limit 1");
        $oktober = $okto[0]->stand;
        $data['tgloktober'] = $okto[0]->last_update;

        // //november
        $nove = $this->Moap->get("select stand, last_update from history_meter where mid ='$mid' and last_update like '%11-%' ORDER BY last_update desc limit 1");
        $november = $nove[0]->stand;
        $data['tglnovember'] = $nove[0]->last_update;

        //desember
        $dec = $this->Moap->get("select stand, last_update from history_meter where mid ='$mid' and last_update like '%12-%' ORDER BY last_update asc limit 1");
        $desember = $dec[0]->stand;
        $data['tgldesember'] = $dec[0]->last_update;

        $now = $this->Moap->get("select stand, last_update from history_meter where mid = '$mid' ORDER BY last_update desc limit 1");
        $sekarang = $now[0]->stand;


        $data['juli'] = $juli;

        //agustus
         $data['agustus'] = $augustus;

        //september
        $data['september'] = $september;

         //oktober
         $data['oktober'] = $oktober;

        //november
        $data['november'] =  $november;

        //desember
        $data['desember'] =  $desember;

        $data['akhir'] = $sekarang;

        //Pemakaian 
        //juli
        $query1 = $this->Moap->get("select sum(stand) as stand_awal, last_update from history_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update)");
        $lastjuni = $query1[0]->stand_awal;
        $lastjuli = $juli;
        $data['cek1'] = $lastjuli - $lastjuni;

        //agustus
        $lastagustus =  $augustus;
        $data['cek2'] = $lastagustus - $lastjuli;
        $tot2 = $lastagustus - $lastjuli;

        //september
        $lastseptember = $september;
        $data['cek3'] = $lastseptember - $lastagustus;
        $tot3 = $lastseptember - $lastagustus;

        //oktober
        $lastoktober = $oktober;
        $data['cek4'] = $lastoktober - $lastseptember;
        $tot4 = $lastoktober - $lastseptember;

        //november
        $lastnovember = $november;
        $data['cek5'] = $lastnovember - $lastoktober;
        $tot5 = $lastnovember - $lastoktober;

        //desember
        $lastdesember = $desember;
        $data['cek6'] = $lastdesember - $lastnovember;
        $tot6 = $lastdesember - $lastnovember;

        //saatini
        $saatini = $sekarang;
        $data['cek7'] = $saatini - $lastdesember;
        $tot7 = $saatini - $lastdesember;

        $rata1 = $tot2 + $tot3 + $tot4 + $tot5 + $tot6 + $tot7;
        $data['rata2'] = $rata1 / 6;

        $bulanini = $this->Moap->get("select SUM(stand) AS stand, last_update from history_meter where MONTH(last_update) = MONTH(now()) and mid ='$mid'");
        $data['bulanini'] = $bulanini[0]->stand;
        $bulanskrg = $this->Moap->get("select SUM(stand) AS stand, last_update from history_meter where MONTH(last_update) = MONTH(now()) and mid ='$mid'");
        $data['bulanskrg'] = $bulanskrg[0]->stand;
        // $data['tglini'] = $bulanini[0]->last_update;
        // $hasil = $coba + $coba2;


        $data['data'] = $this->Moap->get("select sum(stand) as stand_awal, last_update from history_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update) limit 7 offset 1");
        // $tglcredit = $this->Moap->get("select Max(iid), credit, stand, voltage, current, last_update as tanggal_update from history_meter where mid ='$mid' ORDER BY last_update desc");
        // print_r($tglcredit);
        $data['lastdate'] = $this->Moap->get("select last_update from history_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update) limit 6");

        $last = $this->Moap->get("select last_update from history_meter where mid ='$mid' ORDER BY last_update desc");
        $data['lastnow'] = $last[0]->last_update;


        // echo "</br>";
        // foreach ($data as $c) {
        // 	$stand = $c->stand_awal;
        // }
        // $bulanini = $this->Moap->get("select SUM(stand) AS stand, last_update from history_meter where MONTH(last_update) = MONTH(now()) and mid ='$mid'");
        // $coba = $bulanini[0]->stand;
        // $hasil['data'] = $coba + $stand;
        // $sql = $this->Moap->get("select sum(stand) as stand_awal, last_update from history_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update)") + $hasil;
        // print_r($sql);
        // echo "Hasil bulan ini : $hasil";
        //$stand = $data

        $data['token'] = $this->Moap->get("select * from trx_token where meterid = '$mid'");
        $data['monitor'] = $this->Moap->get("select credit,stand,voltage,current, last_update FROM history_meter WHERE MONTH(last_update) = MONTH(now()) AND mid='$mid' ORDER by last_update desc");
        $data['credit'] = $this->Moap->get("select credit, last_update FROM history_meter WHERE mid='$mid' and Month(last_update) = Month(now()) group by last_update");
        $data['energy'] = $this->Moap->get("select stand, last_update FROM history_meter WHERE mid='$mid' and Month(last_update) = Month(now()) group by last_update");
        $data['voltage'] = $this->Moap->get("select voltage, last_update FROM history_meter WHERE mid='$mid' and Month(last_update) = Month(now()) group by last_update");
        $data['current'] = $this->Moap->get("select current, last_update FROM history_meter WHERE mid='$mid' and Month(last_update) = Month(now()) group by last_update");

        $anggota = $this->Moap->get("select m.mid, m.credit as credit, k.no_kamar, b.nama, me.tanggal_integrasi from monitor_meter m, master_kamar k, pelanggan p, bio_penghuni b, master_meter me WHERE m.mid = '$mid' and m.mid = k.mid and p.id_kamar = k.id_kamar and p.ktp = b.ktp and me.mid = k.mid");

        // print_r($anggota);
        foreach ($anggota as $row) {
            $data['nokamar'] = $row->no_kamar;
            $data['mid'] = $row->mid;
            $data['namap'] = $row->nama;
            $data['tanggal_integrasi'] = $row->tanggal_integrasi;
        }

        $this->load->view('detail', $data);
    }

}
