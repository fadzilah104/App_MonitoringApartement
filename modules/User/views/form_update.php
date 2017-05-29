<!DOCTYPE html>
<html>
<head>
	<title>	update</title>

	<style type="text/css">
	.body {
		margin: auto 0;
		width: 1300px;
		text-align: center;
	}
	</style>
</head>
<body>
	<div class="body">
	<h1>Form Insert</h1>

		<form method="post" action="<?php echo base_url().'index.php/user/update_aksi'; ?>">

			<?php foreach($hasil as $row) { ?>
			<input type="hidden" name="id" value="<?php echo $row->id; ?>"> <br>
			Nama : <br>	
			<input type="text" name="nama" value="<?php echo $row->nama; ?>">
			<br>
			Username : <br>	
			<input type="text" name="username" value="<?php echo $row->username; ?>">
			<br>
			password : <br>	
			<input type="text" name="password" value="<?php echo $row->password; ?>">
			<br>
			akses : <br>	
			<input type="text" name="akses" value="<?php echo $row->akses; ?>">
			<br>
			status : <br>	
			<input type="text" name="status" value="<?php echo $row->status; ?>">
			<br><br>	
			<a href="<?php echo base_url()."index.php/user/update_aksi".$row->id; ?>"><button>Save</button></a>

			<?php } ?>
		</form>
</div>
</body>


