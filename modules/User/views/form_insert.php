<!DOCTYPE html>
<html>
<head>
	<title>	insert</title>

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
		<form method="post" action="<?php echo base_url().'index.php/user/insert_aksi'; ?>">		
			Nama : <br>	
			<input type="text" name="nama">
			<br>
			Username : <br>	
			<input type="text" name="username">
			<br>
			password : <br>	
			<input type="text" name="password">
			<br>
			akses : <br>	
			<input type="text" name="akses">
			<br>
			status : <br>	
			<input type="text" name="status">
			<br>	
			<a href="<?php echo base_url().'index.php/user/insert_aksi'; ?>"><button>insert</button></a>
		</form>
</div>
</body>
</html>