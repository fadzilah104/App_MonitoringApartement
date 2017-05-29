<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.kotak{
			font-size: 150%;
			margin: auto;
			width: 590px;
			height: 500px;
			background-color: lightgrey;
			padding-top: 20px;
			padding-left: 20px;
		}
		h2 {
			text-align: center;
		}

	</style>
</head>
<body onload = "window.print()">
 <div class="kotak">
 <h2>Struk PT. Pertamina</h2>
 =========================================
 <table width="440" border="0">
  <tr>
    <td width="152">No transaksi</td>
    <td width="10">:</td>
    <td width="313"><?php echo $trx; ?></td>
  </tr>
  <tr>
    <td>No. Kamar</td>
    <td>:</td>
    <td><?php echo $no_kamar; ?> </td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?php echo $nama; ?></td>
  </tr>
  <tr>
    <td>Meter Id</td>
    <td>:</td>
    <td><?php echo $mid; ?></td>
  </tr>
  <tr>
    <td>Nilai</td>
    <td>:</td>
    <td><?php echo $nilai; ?> </td>
  </tr>
  <tr>
    <td>Hasil Token</td>
    <td>:</td>
    <td><?php echo $hasil_token; ?></td>
  </tr>
  <tr>
    <td>Waktu Proses</td>
    <td>:</td>
    <td><?php echo $waktu_proses; ?></td>
  </tr>
</table>
<!--  	No Transaksi :  <br>
 	No Kamar : <br>
 	Nama :  <br>
 	Meter Id :  <br>
 	Nilai : <br>
 	Hasil Token :  <br>
 	Waktu Proses :  -->
 =========================================
 </div>
</body>
</html>