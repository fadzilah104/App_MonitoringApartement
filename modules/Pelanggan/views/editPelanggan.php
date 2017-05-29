<?php $this->load->view('template/vbootstrap_table') ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body>
        <div id="wrapper">

           <?php echo modules::run("template/sidebar"); ?>

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="header">Kelola Pelanggan</h4>
                            
                             <?php 
                                   if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Perhatian!</strong> <?php echo validation_errors(); } ?>
                            </div>

                            <form class="form-horizontal" action="<?php echo base_url('update_pelanggan'); ?>" method="POST">
                            <input type="text" class="form-control" id="inputname" placeholder="" name="id_pel" readonly value="<?php echo $id_pel; ?>">
                               <div class="form-group">
                                    <label for="inputname" class="col-sm-4 control-label">No KTP : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="ktp" readonly value="<?php echo $ktp; ?>">
                                    </div>
                                </div>
                                      
                                <div class="form-group">
                                    <label for="inputname" class="col-sm-4 control-label">Nama Penghuni : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="nama" value="<?php echo $nama; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputemail" class="col-sm-4 control-label">Email : </label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="inputemail" placeholder="" name="email" value="<?php echo $email;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputtelepon" class="col-sm-4 control-label">Telepon : </label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="inputtelepon" placeholder="" name="telepon" value="<?php echo $no_telp; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-4 control-label">No. Kamar : </label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="nokamar" required>
                                            <option value="<?php echo $id_kamar; ?>" selected>No kamar sebelumnya <?php echo $no_kamar; ?> </option>
                                            <?php foreach ($kamar as $row) { ?>
                                                <option value="<?php echo $row->id_kamar; ?>"><?php echo $row->no_kamar; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-4 control-label">Nilai Autodebet : </label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="autodebet" required>
                                            <option value="<?php echo $id_autodebet; ?>" selected>Nilai Sebelumnya <?php echo $nilai_autodebet; ?></option>
                                            <?php foreach ($debet as $row) { ?>
                                                <option value="<?php echo $row->id_autodebet; ?>"><?php echo $row->nilai_autodebet; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                               <!--  <div class="form-group">
                                    <label for="nokamar" class="col-sm-4 control-label">Meter Id : </label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="meter" required>
                                            <option value="<?php echo $mid_ref; ?>" selected>Meter Id Sebelumnya <?php echo $mid_ref; ?></option>

                                            <?php foreach ($mid as $row) { ?>
                                                <option value="<?php echo $row->mid; ?>"><?php echo $row->mid; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> -->
                                
                                <div class="form-group">
                                    <label for="deposit" class="col-sm-4 control-label">Deposit : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="deposit" placeholder="" name="nilai_deposit" value="<?php echo $nilai_deposit; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-sm-4 control-label">Tgl Masuk : </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tglmasuk"  placeholder="" name="tglmasuk" value="<?php echo $tgl_masuk; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-sm-4 control-label">Tgl Keluar : </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tglkeluar" placeholder="" name="tglkeluar" value="<?php echo $tgl_keluar; ?>">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="nokamar" class="col-sm-4 control-label">Status Pelanggan : </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="aktif" id="optionsRadios1" value="1" 
                                            <?php if($aktif == 1){
                                                echo "checked";
                                            }else{
                                                echo "";
                                            } ?>>
                                            AKtif <?php echo $aktif; ?>
                                        </label>
                                        &nbsp;
                                        <label>
                                            <input type="radio" name="aktif" id="optionsRadios2" value="0" <?php if($aktif == 0){
                                                echo "checked";
                                            }else{
                                                echo "";
                                            } ?>>
                                            Tidak Aktif
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-10">
                                        <button type="submit" class="btn btn-default">Ubah</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /#page-content-wrapper -->

            </div>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script type="text/javascript">
                
                $( function() {
                    $( '#datepicker').datepicker();
                    $( '#datepicker1').datepicker();
                });
            </script>
    </body>
</html>
