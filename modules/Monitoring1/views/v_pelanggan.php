 <?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('template/vbootstrap_table') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pelanggan</title>
		<meta charset="utf-8">

	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url($murl.'/views/bootstrap/css/dataTables.bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url($murl.'/views/bootstrap/css/bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url($murl.'/views/bootstrap/css/bootstrap.min.css'); ?>">
	
	

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#	container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

</head>
<body>

	<div class="container">

	<div>
		<h3>Data Pelanggan</h3>
	</div>

	<br>
	<div class="row">
	<!-- <div class="col-md-4" id="chart"></div> -->
		
			<div class="col-md-12">
				
				<table class="table table-striped table-bordered" id="example" >
					<thead>
						<tr>
							<th>Meter ID</th>
							<th>Credit(kWh)P</th>
							<th>Stand(kWh)</th>
							<th>Voltage</th>
							<th>Current</th>
							<th>Last Update</th>
							<th>No Kamar</th>
							<th>Action</th>
							<th>Condition</th>
						</tr>
					</thead>

					<tbody>
					<tr>
					<?php 
						// $nama = array();
						// $nilai = array();
						// $i = 0;
						// $j = 0;
					foreach($kamar as $row){ 
						// $nama[$i] = $row->nama;
						// $nilai[$j] = (int) $row->nilai_deposit;
						// $i++;
						// $j++;
						// // echo json_encode($nama);
						// echo json_encode($nilai);
													?>

						<td>
							<?php echo $row->mid; ?>
						</td>
						<td>
							<?php echo $row->credit; ?>
						</td>
						<td>
							<?php echo $row->stand; ?>
						</td>
						<td>
							<?php echo $row->voltage; ?>
						</td>
						<td>
							<?php echo $row->current; ?>
						</td>
						<td>
							<?php echo $row->last_update; ?>
						</td>
						<td>
							<?php echo $row->no_kamar; ?>
						</td>
						<td>
							<?php echo $row->lantai; ?>
						</td>
						<td>
							<?php echo $row->tipe_kamar; ?>
						</td>				
					</tr>
					</tbody>
					
					<?php } ?>
				</table>
				<br>
					<div>
						<a href="<?php echo base_url('index.php/Monitoring'); ?>"><button class="btn btn-success">Back</button></a>

					</div>
			
		</div>

	</div>

	<script type="text/javascript" src="<?php echo base_url($murl.'views/bootstrap/js/jquery-1.12.3.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url($murl.'views/bootstrap/js/jquery.dataTables.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url($murl.'views/bootstrap/js/bootstrap.min.js'); ?>"></script>

	<script type="text/javascript">
	        $(document).ready(function() {
			    $('#example').DataTable();
			} );
        </script>
	</script>
</body>
</html>