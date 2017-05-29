<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
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

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="">
	<h1>Master User</h1>

		<table border="2" class="table-default"	>

			<tr>
				<th>id</th>
				<th>nama</th>
				<th>username</th>
				<th>password</th>
				<th>akses</th>
				<th>status</th>
				<th>aksi</th>
			</tr>
			<tr>
			<?php 
			$i = 1;
			foreach($user as $row) {  ?>
				<td>
					<?php echo $i; $i++ ?> 
				</td>
				<td>
					<?php echo $row->nama ?>
				</td>
				<td>
					<?php echo $row->username ?>
				</td>
				<td>
					<?php echo $row->password ?>
				</td>
				<td>
					<?php echo $row->akses ?>
				</td>
				<td>
					<?php if($row->aktif == 1){
						echo "Aktif" ;
						} else if ($row->aktif == 0){
						echo "Non Aktif"; 
							}
						?>
				</td>
				<td><a href="<?php echo base_url()."index.php/user/delete/".$row->id; ?>"><button class="btn-success">Delete</button></a> 
					<a href="<?php echo base_url()."index.php/user/update/".$row->id; ?>"><button>Update</button></a>
				</td>
			</tr>
			<?php 	} ?>
		</table>
		<br>
		<a href="<?php echo base_url('index.php/user/form_insert'); ?>"><button>Insert</button></a>
		<!-- <a href="form_insert.php"><button>Insert</button></a>	 -->

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>