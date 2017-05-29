 <?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
		<meta charset="utf-8">
 <title>Welcome to CodeIgniter</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap/css/bootstrap-flex.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap/css/bootstrap-reboot.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap/css/bootstrap-grid.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap/css/bootstrap.css'); ?>">

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

	.container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		padding: 50px;
	}
	</style> -->

</head>
<body>
	<div class="container">
	<div id="chart"></div>
		<div class="row">
			<div class="col-md-6">
				<?php 
				$nama = array();
				$nilai = array();
				$i = 0;
				$j = 0;
				foreach ($data as $row) {  
				$nama[$i] = $row->nama;
				$nilai[$j] = (int) $row->nilai_deposit;
				$i++;
				$j++;
				?> 		
		
				<table >	
					<tr>	
						<td>
							No KTP
						</td>
						<td>	
							<input type="text" class="form-control" value="<?php echo $row->ktp; ?>" disabled>
						</td>	
					</tr>
					<tr>	
						<td>
							Nama
						</td>
						<td>	
							<input type="text" class="form-control"  value="<?php echo $row->nama; ?>" disabled>
						</td>	
					</tr>
					<tr>	
						<td>
							Email
						</td>
						<td>	
							<input type="text" class="form-control"  value="<?php echo $row->email; ?>" disabled>
						</td>	
					</tr>
					<tr>	
						<td>
							No Telepon
						</td>
						<td>	
							<input type="text" class="form-control"  value="<?php echo $row->no_telp; ?>" disabled>
						</td>	
					</tr>
					<tr>	
						<td>
							Jabatan
						</td>
						<td>	
							<input type="text" class="form-control"  value="<?php echo $row->jabatan; ?>" disabled>
						</td>	
					</tr>
					<tr>	
						<td>
							Status
						</td>
						<td>	
							<input type="text" class="form-control"  value="<?php if($row->aktif == 1){
								echo "Aktif" ;
								} else if ($row->aktif == 0){
								echo "Non Aktif"; 
									}
								?>" disabled>
						</td>	
					</tr>
					<tr>	
						<td>
							Nilai Deposit
						</td>
						<td>	
							<input type="text" class="form-control"  value="<?php echo $row->nilai_deposit; ?>" disabled>
						</td>	
					</tr>
					<tr>	
						<td>
							Status Subsidi
						</td>
						<td>	
							<input type="text" class="form-control"  value="<?php echo $row->status_subsidi; ?>" disabled>
						</td>
					<tr>
						<td>
							Mac Address
						</td>
						<td>	
							<input type="text" class="form-control"  value="<?php echo $row->mac_address; ?>" disabled>
						</td>		
					</tr>
				</table>

	<?php } ?>
			</div>

<!-- 			=============================================================== -->
		</div>

	<br>
		<div>
			<a href="<?php echo base_url('index.php/Monitoring/data_pelanggan'); ?>"><button class="btn btn-success">Back</button></a>
		</div>
<!-- ============================================================================ -->
	

</body>
</html>