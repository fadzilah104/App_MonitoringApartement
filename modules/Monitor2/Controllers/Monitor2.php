<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('monitor_model','monitoring');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('customers_view');
	}

	public function ajax_list()
	{
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
		$bulanlalu = $this->Moap->get("select sum(stand) as stand_awal, last_update from histori_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update)");
		$jun = $bulanlalu[0]->stand_awal;
		$jul = $bulanlalu[1]->stand_awal;
		$aug = $bulanlalu[2]->stand_awal;
		$sep = $bulanlalu[3]->stand_awal;
		$okt = $bulanlalu[4]->stand_awal;
		$nov = $bulanlalu[5]->stand_awal;
		$des = $bulanlalu[6]->stand_awal;
		
		//query tanggal 1
		//jully
		$july = $this->Moap->get("select stand, last_update from histori_meter where mid ='$mid' and last_update like '%07-01%'");
		$juli = $july[0]->stand;
		$juli2 = $july[0]->last_update;

		//agustus
		$augus = $this->Moap->get("select stand, last_update from histori_meter where mid ='$mid' and last_update like '%08-01%'");
		$augustus = $augus[0]->stand;

		//september
		$sept = $this->Moap->get("select stand, last_update from histori_meter where mid ='$mid' and last_update like '%09-01%'");
		$september = $sept[0]->stand;

		//oktober
		$okto = $this->Moap->get("select stand, last_update from histori_meter where mid ='$mid' and last_update like '%10-01%'");
		$oktober = $okto[0]->stand;

		// //november
		$nove = $this->Moap->get("select stand, last_update from histori_meter where mid ='$mid' and last_update like '%11-01%'");
		$november = $okto[0]->stand;

		//desember
		$dec = $this->Moap->get("select stand, last_update from histori_meter where mid ='$mid' and last_update like '%12-01%'");
		$desember = $dec[0]->stand;

		// $dece = $this->Moap->get("select stand, last_update from histori_meter where mid ='$mid' and last_update like '%12-31%'");
		// $desember1 = $dece[0]->stand;

		//query tambah stand awal + akhir
		//juli
		$data['juli'] = $jun + $juli;

		//agustus
				$data['agustus'] = $jun + $jul + $augustus;

		//september
		$data['september'] = $jun + $jul + $aug + $september;

		 //oktober
		 $data['oktober'] = $jun + $jul + $aug + $sep + $oktober;

		//november
		$data['november'] = $jun + $jul + $aug + $sep + $okt + $november;

		//desember
		$data['desember'] = $jun + $jul + $aug + $sep + $okt + $nov + $desember;

		$data['akhir'] = $jun + $jul + $aug + $sep + $okt + $nov + $des;

		//Pemakaian 
		//juli
		$query1 = $this->Moap->get("select sum(stand) as stand_awal, last_update from histori_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update)");
		$lastjuni = $query1[0]->stand_awal;
		$lastjuli = $jun + $juli;
		$data['cek1'] = $lastjuli - $lastjuni;

		//agustus
		$lastagustus = $jun + $jul + $augustus;
		$data['cek2'] = $lastagustus - $lastjuli;

		//september
		$lastseptember = $jun + $jul + $aug + $september;
		$data['cek3'] = $lastseptember - $lastagustus;

		//oktober
		$lastoktober = $jun + $jul + $aug + $sep + $oktober;
		$data['cek4'] = $lastoktober - $lastseptember;

		//november
		$lastnovember = $jun + $jul + $aug + $sep + $okt + $november;
		$data['cek5'] = $lastnovember - $lastoktober;

		//desember
		$lastdesember = $jun + $jul + $aug + $sep + $okt + $nov + $desember;
		$data['cek6'] = $lastdesember - $lastnovember;

		//saatini
		$saatini = $jun + $jul + $aug + $sep + $okt + $nov + $des;
		$data['cek7'] = $saatini - $lastdesember;


		$bulanini = $this->Moap->get("select SUM(stand) AS stand, last_update from histori_meter where MONTH(last_update) = MONTH(now()) and mid ='$mid'");
		$data['bulanini'] = $bulanini[0]->stand;
		$bulanskrg = $this->Moap->get("select SUM(stand) AS stand, last_update from histori_meter where MONTH(last_update) = MONTH(now()) and mid ='$mid'");
		$data['bulanskrg'] = $bulanskrg[0]->stand;
		// $data['tglini'] = $bulanini[0]->last_update;
		// $hasil = $coba + $coba2;
		

		$data['data'] = $this->Moap->get("select sum(stand) as stand_awal, last_update from histori_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update)");
		$data['lastdate'] = $this->Moap->get("select last_update from histori_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update) limit 6");
	
		$last = $this->Moap->get("select last_update from histori_meter where mid ='$mid' ORDER BY last_update desc");
		$data['lastnow'] = $last[0]->last_update;

		
		// echo "</br>";
		// foreach ($data as $c) {
		// 	$stand = $c->stand_awal;
		// }
		// $bulanini = $this->Moap->get("select SUM(stand) AS stand, last_update from histori_meter where MONTH(last_update) = MONTH(now()) and mid ='$mid'");
		// $coba = $bulanini[0]->stand;
		// $hasil['data'] = $coba + $stand;
		// $sql = $this->Moap->get("select sum(stand) as stand_awal, last_update from histori_meter where YEAR(last_update) = YEAR(now()) and mid ='$mid' GROUP BY MONTH(last_update)") + $hasil;
		// print_r($sql);
		// echo "Hasil bulan ini : $hasil";
		//$stand = $data

		$tgl = $this->Moap->get("select SUM(stand) AS stand, last_update from histori_meter where MONTH(last_update) = MONTH(now()) and mid ='$mid'");
		foreach ($tgl as $d) {
			$data['stand'] = $d->stand;
			$data['tgl'] = $d->last_update;
		}

		$crd = $this->Moap->get("select * from histori_meter where mid = '$mid'");
		foreach ($crd as $row) {
			$data['crd'] = $row->mid;
		}

		$trx = $this->Moap->get("select * from trx_token where meterid = '$mid'");
		foreach ($trx as $row) {
			$data['sql'] = $row->meterid;
		}

  		$this->load->view('detailKwh', $data);
	}

	public function historiToken($mid) {
		$crd = $this->Moap->get("select * from histori_meter where mid = '$mid'");
		foreach ($crd as $row) {
			$data['crd'] = $row->mid;
		}
		$trx = $this->Moap->get("select * from trx_token where meterid = '$mid'");
		foreach ($trx as $row) {
			$data['sql'] = $row->meterid;
		}
		$data['data'] = $this->Moap->get("select * from trx_token where meterid = '$mid'");

		$this->load->view('historitoken', $data);
		}

		public function historiMonitor($mid) {
		$crd = $this->Moap->get("select * from histori_meter where mid = '$mid'");
		foreach ($crd as $row) {
			$data['crd'] = $row->mid;
		}
		$trx = $this->Moap->get("select * from trx_token where meterid = '$mid'");
		foreach ($trx as $row) {
			$data['trx'] = $row->meterid;
		}
		$data['data'] = $this->Moap->get("select credit,stand,voltage,current, last_update FROM histori_meter WHERE MONTH(last_update) = MONTH(now()) AND mid='$mid' ORDER by last_update");
		// print_r($sql);
		// $ada = $sql[0]->credit;
		// $ada2 = $sql[1]->credit;
		// $hasil = $ada + $ada2;

		// for ($i = $sql[0]->credit; $i < $sql[7]->credit; $i++) {
		// 	$j = ...............
		// }
		// $bulanini = $this->Moap->get("select credit , last_update from histori_meter WHERE MONTH(last_update) = MONTH(now() - INTERVAL 1 second) AND mid='$mid' ORDER BY last_update DESC");
		// print_r($bulanini);
		$this->load->view('historimonitoring', $data);
		}

}



