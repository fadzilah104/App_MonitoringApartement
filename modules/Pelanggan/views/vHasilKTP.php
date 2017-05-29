<?php if(empty($data)){ 
echo '<script language="javascript">';
echo 'alert("Ktp tidak terdaftar silahkan isi")';
echo '</script>';
$this->session->set_userdata('insert_penghuni_pelanggan',01);
 ?>


<div class="form-group">
<label for="inputname" class="col-sm-4 control-label">Ktp : </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="inputname"  placeholder="Silahkan isi ktp" name="ktp" ">
    </div>
</div>
<div class="form-group">
<label for="inputname" class="col-sm-4 control-label">Nama Penghuni : </label>
    <div class="col-sm-4">
        <input type="text"  class="form-control" id="inputname" placeholder="Silahkan isi nama" name="nama">
    </div>
</div>
<div class="form-group">
    <label for="inputemail" class="col-sm-4 control-label">Email : </label>
    <div class="col-sm-4">
        <input type="email"  class="form-control" id="inputemail" placeholder="Silahkan isi email" name="email">
    </div>
</div>
<div class="form-group">
    <label for="inputtelepon" class="col-sm-4 control-label">Telepon : </label>
    <div class="col-sm-4">
        <input type="number" class="form-control"  id="inputtelepon" placeholder="Silahkan isi Telp" name="telepon">
    </div>
</div>

<?php }else{
$this->session->set_userdata('insert_penghuni_pelanggan',11);
?>



<?php foreach ($data as $row) {
    # code...
    $ktp = $row->ktp;
    $nama = $row->nama;
    $email = $row->email;
    $no_telp = $row->no_telp;
} ?>


<div class="form-group">
<label for="inputname" class="col-sm-4 control-label">Ktp : </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="ktp" readonly id="inputname" placeholder="" value="<?php echo $ktp; ?>">
    </div>
</div>
<div class="form-group">
<label for="inputname" class="col-sm-4 control-label">Nama Penghuni : </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="nama" readonly id="inputname" placeholder=""  value="<?php echo $nama; ?>">
    </div>
</div>
<div class="form-group">
    <label for="inputemail" class="col-sm-4 control-label">Email : </label>
    <div class="col-sm-4">
        <input type="email" class="form-control" readonly name="email" id="inputemail" placeholder="" value="<?php echo $email; ?>" >
    </div>
</div>
<div class="form-group">
    <label for="inputtelepon" class="col-sm-4 control-label">Telepon : </label>
    <div class="col-sm-4">
        <input type="number" class="form-control" readonly id="inputtelepon" name="telepon" placeholder=""  value="<?php echo $no_telp; ?>">
    </div>
</div>

<?php } ?>